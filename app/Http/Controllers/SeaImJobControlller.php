<?php

namespace App\Http\Controllers;

use App\Models\Company;
use CodeNumbering;
use App\Models\History;
use App\Models\JobType;
use App\Models\SeaImJob;
use App\Models\JobMaster;
use App\Models\SeaImJobD1;
use App\Models\SeaImJobD2;
use App\Models\SeaImJobD3;
use App\Models\SeaImJobD4;
use App\Models\SeaImJobD5;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CompanyDetailSatu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class SeaImJobControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-sea_im_job')) {
            if ($request->ajax()) {
                if (!empty(auth()->user()->salesman_code)) {
                    $sea_im_job = SeaImJob::with(['jm', 'sd2', 'sd4'])->whereHas('jm', function ($query) {
                        $query->where('salesman_code', explode(",", auth()->user()->salesman_code));
                    })->orderBy('id', 'DESC')->select('*');
                } else {
                    $sea_im_job = SeaImJob::with(['jm', 'sd2', 'sd4'])->orderBy('id', 'DESC')->select('*');
                }
                return DataTables::of($sea_im_job)
                    ->addColumn('action', function ($sea_im_job) {
                        return view('datatable-modal._action_pdf_si', [
                            'row_id' => $sea_im_job->id,
                            'edit_url' => route('sea_im_job.edit', $sea_im_job->id),
                            'delete_url' => route('sea_im_job.destroy', $sea_im_job->id),
                            'job_no'    => $sea_im_job->jm->job_no,
                            'can_edit' => 'edit-sea_im_job',
                            'can_delete' => 'delete-sea_im_job'
                        ]);
                    })
                    ->editColumn('updated_at', function ($sea_im_job) {
                        return !empty($sea_im_job->updated_at) ? date("d-m-Y H:i", strtotime($sea_im_job->updated_at)) : "-";
                    })
                    ->editColumn('total_gross', function ($sea_im_job) {
                        return !empty($sea_im_job->total_gross) ? number_format($sea_im_job->total_gross, 4, '.', ',') : "-";
                    })
                    ->editColumn('total_volume', function ($sea_im_job) {
                        return !empty($sea_im_job->total_volume) ? number_format($sea_im_job->total_volume, 4, '.', ',') : "-";
                    })
                    ->editColumn('container_no', function ($sea_im_job) {
                        if (is_array($sea_im_job->sd4) || is_object($sea_im_job->sd4)) {
                            $val = [];
                            foreach ($sea_im_job->sd4 as $attribute => $value) {
                                $val[] = $value->container_no . "/" . $value->seal_no;
                            }
                        }
                        return implode(", ", $val);
                    })
                    ->rawColumns(['updated_at', 'action', 'total_gross', 'total_volume', 'container_no'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Sea Import Job')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Sea Import Job')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Import Job',
                    'url_menu'  => route('sea_im_job.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Import Job',
                    'url_menu'  => route('sea_im_job.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('trx.sea_im_job.index');
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasPermission('create-sea_im_job')) {
            $job_type = JobType::where('description', 'like', '%IMPORT%')->get();

            return view('trx.sea_im_job.create', compact('job_type'));
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasPermission('create-sea_im_job')) {
            $request->validate(
                [
                    'job_no'    => 'required|max:20|unique:job_masters,job_no',
                    'bl_no'  => 'required|unique:job_masters,bl_no',
                    'shipment_type'  => 'required',
                    'cargo_type'  => 'required',
                    'job_type'  => 'required',
                    'customer_code'  => 'required',
                    'origin_code'  => 'required',
                    'eta'  => 'required',
                    'port_loading_code'  => 'required',
                    'port_discharge_code'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $sj = new SeaImJob();
                $job_no = CodeNumbering::custom_code('37', $sj, 'job_no');

                $jm = new JobMaster();
                $jm->job_no = $job_no;
                $jm->job_date = date('Y-m-d');
                $jm->job_type = !empty($request->job_type) ? $request->job_type : null;
                $jm->cargo_type = !empty($request->cargo_type) ? $request->cargo_type : null;
                $jm->master_job_no = $job_no;
                $jm->bl_no = !empty($request->bl_no) ? $request->bl_no : null;
                $jm->hbl_no = !empty($request->hbl_no) ? $request->hbl_no : null;
                $jm->obl_no = !empty($request->obl_no) ? $request->obl_no : null;
                $jm->shipment_type = !empty($request->shipment_type) ? $request->shipment_type : null;
                $jm->customer_code = !empty($request->customer_code) ? $request->customer_code : null;
                $jm->customer = !empty($request->customer) ? $request->customer : null;
                $jm->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $jm->salesman_code = !empty($request->salesman_code) ? $request->salesman_code : null;
                $jm->salesman = !empty($request->salesman) ? $request->salesman : null;
                $jm->shipper_code = !empty($request->shipper_code) ? $request->shipper_code : null;
                $jm->shipper_name = !empty($request->shipper_name) ? $request->shipper_name : null;
                $jm->shipper_address_1 = !empty($request->shipper_address_1) ? $request->shipper_address_1 : null;
                $jm->shipper_address_2 = !empty($request->shipper_address_2) ? $request->shipper_address_2 : null;
                $jm->shipper_address_3 = !empty($request->shipper_address_3) ? $request->shipper_address_3 : null;
                $jm->shipper_address_4 = !empty($request->shipper_address_4) ? $request->shipper_address_4 : null;
                $jm->consignee_code = !empty($request->consignee_code) ? $request->consignee_code : null;
                $jm->consignee_name = !empty($request->consignee_name) ? $request->consignee_name : null;
                $jm->consignee_address_1 = !empty($request->consignee_address_1) ? $request->consignee_address_1 : null;
                $jm->consignee_address_2 = !empty($request->consignee_address_2) ? $request->consignee_address_2 : null;
                $jm->consignee_address_3 = !empty($request->consignee_address_3) ? $request->consignee_address_3 : null;
                $jm->consignee_address_4 = !empty($request->consignee_address_4) ? $request->consignee_address_4 : null;
                $jm->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $jm->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $jm->delivery_agent_code = !empty($request->delivery_agent_code) ? $request->delivery_agent_code : null;
                $jm->delivery_agent_name = !empty($request->delivery_agent_name) ? $request->delivery_agent_name : null;
                $jm->delivery_agent_address_1 = !empty($request->delivery_agent_address_1) ? $request->delivery_agent_address_1 : null;
                $jm->delivery_agent_address_2 = !empty($request->delivery_agent_address_2) ? $request->delivery_agent_address_2 : null;
                $jm->delivery_agent_address_3 = !empty($request->delivery_agent_address_3) ? $request->delivery_agent_address_3 : null;
                $jm->delivery_agent_address_4 = !empty($request->delivery_agent_address_4) ? $request->delivery_agent_address_4 : null;
                $jm->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $jm->save();

                $sj->job_master_id = $jm->id;
                $sj->job_no = $job_no;
                $sj->do_ready = $request->do_ready == "yes" ? true : false;
                $sj->do_ready_remark = !empty($request->do_ready_remark) ? $request->do_ready_remark : null;
                $sj->nomination_cargo = $request->nomination_cargo == "yes" ? true : false;
                $sj->telex_release = $request->telex_release == "yes" ? true : false;
                $sj->transhipment = $request->transhipment == "yes" ? true : false;
                $sj->frt_pp_cc = !empty($request->frt_pp_cc) ? $request->frt_pp_cc : null;
                $sj->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $sj->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $sj->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $sj->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $sj->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $sj->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $sj->customer_contact = !empty($request->customer_contact) ? $request->customer_contact : null;
                $sj->consignee_contact = !empty($request->consignee_contact) ? $request->consignee_contact : null;
                $sj->consignee_telp = !empty($request->consignee_telp) ? $request->consignee_telp : null;
                $sj->consignee_postal_code = !empty($request->consignee_postal_code) ? $request->consignee_postal_code : null;
                $sj->footer_1 = !empty($request->footer_1) ? $request->footer_1 : null;
                $sj->footer_2 = !empty($request->footer_2) ? $request->footer_2 : null;
                $sj->footer_3 = !empty($request->footer_3) ? $request->footer_3 : null;
                $sj->footer_4 = !empty($request->footer_4) ? $request->footer_4 : null;
                $sj->footer_5 = !empty($request->footer_5) ? $request->footer_5 : null;
                $sj->total_pcs = !empty($request->total_pcs) ? str_replace(",", "", $request->total_pcs) : (!empty($request->pcs[0]) ? array_sum($request->pcs) : null);
                $sj->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $sj->total_gross = !empty($request->total_gross) ? str_replace(",", "", $request->total_gross) : (!empty($request->gross_weight[0]) ? array_sum(str_replace(",", "", $request->gross_weight)) : null);
                $sj->total_volume = !empty($request->total_volume) ? str_replace(",", "", $request->total_volume) : (!empty($request->cargo_volume[0]) ? array_sum(str_replace(",", "", $request->cargo_volume)) : null);
                $sj->billing_instruction = !empty($request->billing_instruction) ? $request->billing_instruction : null;
                $sj->job_costing_remark = !empty($request->job_costing_remark) ? $request->job_costing_remark : null;
                $sj->total_sales = !empty($request->total_sales) ? str_replace(",", "", $request->total_sales) : null;
                $sj->total_cost = !empty($request->total_cost) ? str_replace(",", "", $request->total_cost) : null;
                $sj->profit_loss = !empty($request->profit_loss) ? str_replace(",", "", $request->profit_loss) : null;
                $sj->margin = !empty($request->margin) ? $request->margin : null;
                $sj->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sj->save();

                $sd1 = new SeaImJobD1();
                $sd1->sea_im_job_id = $sj->id;
                $sd1->collect_from_code = !empty($request->collect_from_code) ? $request->collect_from_code : null;
                $sd1->collect_from_name = !empty($request->collect_from_name) ? $request->collect_from_name : null;
                $sd1->collect_from_address_1 = !empty($request->collect_from_address_1) ? $request->collect_from_address_1 : null;
                $sd1->collect_from_address_2 = !empty($request->collect_from_address_2) ? $request->collect_from_address_2 : null;
                $sd1->collect_from_address_3 = !empty($request->collect_from_address_3) ? $request->collect_from_address_3 : null;
                $sd1->collect_from_address_4 = !empty($request->collect_from_address_4) ? $request->collect_from_address_4 : null;
                $sd1->delivery_to_code = !empty($request->delivery_to_code) ? $request->delivery_to_code : null;
                $sd1->delivery_to_name = !empty($request->delivery_to_name) ? $request->delivery_to_name : null;
                $sd1->delivery_to_address_1 = !empty($request->delivery_to_address_1) ? $request->delivery_to_address_1 : null;
                $sd1->delivery_to_address_2 = !empty($request->delivery_to_address_2) ? $request->delivery_to_address_2 : null;
                $sd1->delivery_to_address_3 = !empty($request->delivery_to_address_3) ? $request->delivery_to_address_3 : null;
                $sd1->delivery_to_address_4 = !empty($request->delivery_to_address_4) ? $request->delivery_to_address_4 : null;
                $sd1->transport_company_code = !empty($request->transport_company_code) ? $request->transport_company_code : null;
                $sd1->transport_company_name = !empty($request->transport_company_name) ? $request->transport_company_name : null;
                $sd1->transport_company_address_1 = !empty($request->transport_company_address_1) ? $request->transport_company_address_1 : null;
                $sd1->transport_company_address_2 = !empty($request->transport_company_address_2) ? $request->transport_company_address_2 : null;
                $sd1->transport_company_address_3 = !empty($request->transport_company_address_3) ? $request->transport_company_address_3 : null;
                $sd1->transport_company_address_4 = !empty($request->transport_company_address_4) ? $request->transport_company_address_4 : null;
                $sd1->transport_company_contact_name = !empty($request->transport_company_contact_name) ? $request->transport_company_contact_name : null;
                $sd1->transport_company_telp = !empty($request->transport_company_telp) ? $request->transport_company_telp : null;
                $sd1->transport_company_fax = !empty($request->transport_company_fax) ? $request->transport_company_fax : null;
                $sd1->cr_no = !empty($request->cr_no) ? $request->cr_no : null;
                $sd1->vehicle_no = !empty($request->vehicle_no) ? $request->vehicle_no : null;
                $sd1->delivery_date = !empty($request->delivery_date) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->delivery_date))) : null;
                $sd1->driver_name = !empty($request->driver_name) ? $request->driver_name : null;
                $sd1->driver_contact_1 = !empty($request->driver_contact_1) ? $request->driver_contact_1 : null;
                $sd1->driver_contact_2 = !empty($request->driver_contact_2) ? $request->driver_contact_2 : null;
                $sd1->delivery_instruction_1 = !empty($request->delivery_instruction_1) ? $request->delivery_instruction_1 : null;
                $sd1->delivery_instruction_2 = !empty($request->delivery_instruction_2) ? $request->delivery_instruction_2 : null;
                $sd1->delivery_instruction_3 = !empty($request->delivery_instruction_3) ? $request->delivery_instruction_3 : null;
                $sd1->delivery_instruction_4 = !empty($request->delivery_instruction_4) ? $request->delivery_instruction_4 : null;
                $sd1->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sd1->save();

                $sd2 = new SeaImJobD2();
                $sd2->sea_im_job_id = $sj->id;
                $sd2->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $sd2->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $sd2->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $sd2->commodity = !empty($request->commodity) ? $request->commodity : null;
                $sd2->cargo_class = !empty($request->cargo_class) ? $request->cargo_class : null;
                $sd2->dg_cargo = $request->dg_cargo == "yes" ? true : false;
                $sd2->origin_code = !empty($request->origin_code) ? $request->origin_code : null;
                $sd2->origin_name = !empty($request->origin_name) ? $request->origin_name : null;
                $sd2->dest_code = !empty($request->dest_code) ? $request->dest_code : null;
                $sd2->dest_name = !empty($request->dest_name) ? $request->dest_name : null;
                $sd2->place_of_receipt = !empty($request->place_of_receipt) ? $request->place_of_receipt : null;
                $sd2->port_loading_code = !empty($request->port_loading_code) ? $request->port_loading_code : null;
                $sd2->port_loading_name = !empty($request->port_loading_name) ? $request->port_loading_name : null;
                $sd2->port_discharge_code = !empty($request->port_discharge_code) ? $request->port_discharge_code : null;
                $sd2->port_discharge_name = !empty($request->port_discharge_name) ? $request->port_discharge_name : null;
                $sd2->via_port_code = !empty($request->via_port_code) ? $request->via_port_code : null;
                $sd2->via_port_name = !empty($request->via_port_name) ? $request->via_port_name : null;
                $sd2->place_of_delivery = !empty($request->place_of_delivery) ? $request->place_of_delivery : null;
                $sd2->vessel_code = !empty($request->vessel_code) ? $request->vessel_code : null;
                $sd2->vessel_name = !empty($request->vessel_name) ? $request->vessel_name : null;
                $sd2->voyage_no = !empty($request->voyage_no) ? $request->voyage_no : null;
                $sd2->mother_vessel_name = !empty($request->mother_vessel_name) ? $request->mother_vessel_name : null;
                $sd2->shippline_code = !empty($request->shippline_code) ? $request->shippline_code : null;
                $sd2->shippline_name = !empty($request->shippline_name) ? $request->shippline_name : null;
                $sd2->shippline_ref_no = !empty($request->shippline_ref_no) ? $request->shippline_ref_no : null;
                $sd2->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $sd2->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $sd2->coloader_ref_no = !empty($request->coloader_ref_no) ? $request->coloader_ref_no : null;
                $sd2->detention_free_day = !empty($request->detention_free_day) ? $request->detention_free_day : null;
                $sd2->demurage_free_day = !empty($request->demurage_free_day) ? $request->demurage_free_day : null;
                $sd2->permit_no = !empty($request->permit_no) ? $request->permit_no : null;
                $sd2->letter_of_credit_no = !empty($request->letter_of_credit_no) ? $request->letter_of_credit_no : null;
                $sd2->etd = !empty($request->etd) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->etd))) : null;
                $sd2->first_via_eta = !empty($request->first_via_eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_eta))) : null;
                $sd2->eta = !empty($request->eta) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta))) : null;
                $sd2->dest_eta = !empty($request->dest_eta) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->dest_eta))) : null;
                $sd2->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $sd2->service_level = !empty($request->service_level) ? $request->service_level : null;
                $sd2->mother_voyage = !empty($request->mother_voyage) ? $request->mother_voyage : null;
                $sd2->create_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sd2->save();

                $sd3 = new SeaImJobD3();
                $sd3->sea_im_job_id = $sj->id;
                $sd3->principle_agent_code = !empty($request->principle_agent_code) ? $request->principle_agent_code : null;
                $sd3->shippagent_code = !empty($request->shippagent_code) ? $request->shippagent_code : null;
                $sd3->scn_code = !empty($request->scn_code) ? $request->scn_code : null;
                $sd3->smk_code = !empty($request->smk_code) ? $request->smk_code : null;
                $sd3->cfs_warehouse_code = !empty($request->cfs_warehouse_code) ? $request->cfs_warehouse_code : null;
                $sd3->cfs_warehouse_name = !empty($request->cfs_warehouse_name) ? $request->cfs_warehouse_name : null;
                $sd3->cfs_warehouse_address_1 = !empty($request->cfs_warehouse_address_1) ? $request->cfs_warehouse_address_1 : null;
                $sd3->cfs_warehouse_address_2 = !empty($request->cfs_warehouse_address_2) ? $request->cfs_warehouse_address_2 : null;
                $sd3->cfs_warehouse_address_3 = !empty($request->cfs_warehouse_address_3) ? $request->cfs_warehouse_address_3 : null;
                $sd3->cfs_warehouse_address_4 = !empty($request->cfs_warehouse_address_4) ? $request->cfs_warehouse_address_4 : null;
                $sd3->cfs_warehouse_contact = !empty($request->cfs_warehouse_contact) ? $request->cfs_warehouse_contact : null;
                $sd3->unstuff = !empty($request->unstuff) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->unstuff))) : null;
                $sd3->billing = !empty($request->billing) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->billing))) : null;
                $sd3->truck_in = !empty($request->truck_in) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->truck_in))) : null;
                $sd3->truck_out = !empty($request->truck_out) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->truck_out))) : null;
                $sd3->empty_container = !empty($request->empty_container) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->empty_container))) : null;
                $sd3->yard_code = !empty($request->yard_code) ? $request->yard_code : null;
                $sd3->yard_name = !empty($request->yard_name) ? $request->yard_name : null;
                $sd3->yard_address_1 = !empty($request->yard_address_1) ? $request->yard_address_1 : null;
                $sd3->yard_address_2 = !empty($request->yard_address_2) ? $request->yard_address_2 : null;
                $sd3->yard_address_3 = !empty($request->yard_address_3) ? $request->yard_address_3 : null;
                $sd3->yard_address_4 = !empty($request->yard_address_4) ? $request->yard_address_4 : null;
                $sd3->depot_code = !empty($request->depot_code) ? $request->depot_code : null;
                $sd3->depot_name = !empty($request->depot_name) ? $request->depot_name : null;
                $sd3->depot_address_1 = !empty($request->depot_address_1) ? $request->depot_address_1 : null;
                $sd3->depot_address_2 = !empty($request->depot_address_2) ? $request->depot_address_2 : null;
                $sd3->depot_address_3 = !empty($request->depot_address_3) ? $request->depot_address_3 : null;
                $sd3->depot_address_4 = !empty($request->depot_address_4) ? $request->depot_address_4 : null;
                $sd3->depot_instruction_1 = !empty($request->depot_instruction_1) ? $request->depot_instruction_1 : null;
                $sd3->depot_instruction_2 = !empty($request->depot_instruction_2) ? $request->depot_instruction_2 : null;
                $sd3->depot_instruction_3 = !empty($request->depot_instruction_3) ? $request->depot_instruction_3 : null;
                $sd3->depot_instruction_4 = !empty($request->depot_instruction_4) ? $request->depot_instruction_4 : null;
                $sd3->instruction_1 = !empty($request->instruction_1) ? $request->instruction_1 : null;
                $sd3->instruction_2 = !empty($request->instruction_2) ? $request->instruction_2 : null;
                $sd3->instruction_3 = !empty($request->instruction_3) ? $request->instruction_3 : null;
                $sd3->instruction_4 = !empty($request->instruction_4) ? $request->instruction_4 : null;
                $sd3->create_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sd3->save();

                $result_d4 = [];
                if ($request->cargo_commodity_code[0] != null) {
                    foreach ($request->cargo_commodity_code as $key => $val) {
                        $result_d4[] = [
                            'sea_im_job_id'    => $sj->id,
                            'container_no'      => !empty($request->container_no[$key]) ? $request->container_no[$key] : null,
                            'pcs'      => !empty($request->pcs[$key]) ? $request->pcs[$key] : null,
                            'gross_weight'      => !empty($request->gross_weight[$key]) ? str_replace(",", "", $request->gross_weight[$key]) : null,
                            'cargo_commodity_code'      => $val,
                            'cargo_commodity'      => !empty($request->cargo_commodity[$key]) ? $request->cargo_commodity[$key] : null,
                            'seal_no'      => !empty($request->seal_no[$key]) ? $request->seal_no[$key] : null,
                            'cargo_container_code'      => !empty($request->cargo_container_code[$key]) ? $request->cargo_container_code[$key] : null,
                            'cargo_container'      => !empty($request->cargo_container[$key]) ? $request->cargo_container[$key] : null,
                            'cargo_uom_code'      => !empty($request->cargo_uom_code[$key]) ? $request->cargo_uom_code[$key] : null,
                            'cargo_uom'      => !empty($request->cargo_uom[$key]) ? $request->cargo_uom[$key] : null,
                            'cargo_volume'      => !empty($request->cargo_volume[$key]) ? str_replace(",", "", $request->cargo_volume[$key]) : null,
                            'marks_1'      => !empty($request->marks_1[$key]) ? $request->marks_1[$key] : null,
                            'marks_2'      => !empty($request->marks_2[$key]) ? $request->marks_2[$key] : null,
                            'marks_3'      => !empty($request->marks_3[$key]) ? $request->marks_3[$key] : null,
                            'marks_4'      => !empty($request->marks_4[$key]) ? $request->marks_4[$key] : null,
                            'marks_5'      => !empty($request->marks_5[$key]) ? $request->marks_5[$key] : null,
                            'marks_6'      => !empty($request->marks_6[$key]) ? $request->marks_6[$key] : null,
                            'marks_7'      => !empty($request->marks_7[$key]) ? $request->marks_7[$key] : null,
                            'marks_8'      => !empty($request->marks_8[$key]) ? $request->marks_8[$key] : null,
                            'marks_9'      => !empty($request->marks_9[$key]) ? $request->marks_9[$key] : null,
                            'marks_10'      => !empty($request->marks_10[$key]) ? $request->marks_10[$key] : null,
                            'good_desc_1'      => !empty($request->good_desc_1[$key]) ? $request->good_desc_1[$key] : null,
                            'good_desc_2'      => !empty($request->good_desc_2[$key]) ? $request->good_desc_2[$key] : null,
                            'good_desc_3'      => !empty($request->good_desc_3[$key]) ? $request->good_desc_3[$key] : null,
                            'good_desc_4'      => !empty($request->good_desc_4[$key]) ? $request->good_desc_4[$key] : null,
                            'good_desc_5'      => !empty($request->good_desc_5[$key]) ? $request->good_desc_5[$key] : null,
                            'good_desc_6'      => !empty($request->good_desc_6[$key]) ? $request->good_desc_6[$key] : null,
                            'good_desc_7'      => !empty($request->good_desc_7[$key]) ? $request->good_desc_7[$key] : null,
                            'good_desc_8'      => !empty($request->good_desc_8[$key]) ? $request->good_desc_8[$key] : null,
                            'good_desc_9'      => !empty($request->good_desc_9[$key]) ? $request->good_desc_9[$key] : null,
                            'good_desc_10'      => !empty($request->good_desc_10[$key]) ? $request->good_desc_10[$key] : null,
                            'create_by'         => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'update_by'         => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    SeaImJobD4::insert($result_d4);
                }

                $result_d5 = [];
                if ($request->code[1] != null) {
                    foreach ($request->id_key as $key6) {
                        $result_d5[] = [
                            'sea_im_job_id'    => $sj->id,
                            'code'  => !empty($request->code[$key6]) ? $request->code[$key6] : null,
                            'description'      => !empty($request->description[$key6]) ? $request->description[$key6] : null,
                            'qty_sales'      => !empty($request->qty_sales[$key6]) ? str_replace(",", "", $request->qty_sales[$key6]) : null,
                            'unit_rate_sales'      => !empty($request->unit_rate_sales[$key6]) ? str_replace(",", "", $request->unit_rate_sales[$key6]) : null,
                            'uom_sales'      => !empty($request->uom_sales[$key6]) ? $request->uom_sales[$key6] : null,
                            'pc_sales'      => !empty($request->pc_sales[$key6]) ? $request->pc_sales[$key6] : null,
                            'cust_code_sales'      => !empty($request->cust_code_sales[$key6]) ? $request->cust_code_sales[$key6] : null,
                            'cust_name_sales'      => !empty($request->cust_name_sales[$key6]) ? $request->cust_name_sales[$key6] : null,
                            'vat_sales'      => !empty($request->vat_sales[$key6]) ? $request->vat_sales[$key6] : null,
                            'curr_sales'      => !empty($request->curr_sales[$key6]) ? $request->curr_sales[$key6] : null,
                            'rate_sales'      => !empty($request->rate_sales[$key6]) ? str_replace(",", "", $request->rate_sales[$key6]) : null,
                            'amt_sales'      => !empty($request->amt_sales[$key6]) ? str_replace(",", "", $request->amt_sales[$key6]) : null,
                            'sales'      => !empty($request->sales[$key6]) ? str_replace(",", "", $request->sales[$key6]) : null,
                            'qty_vendor'      => !empty($request->qty_vendor[$key6]) ? str_replace(",", "", $request->qty_vendor[$key6]) : null,
                            'unit_rate_vendor'      => !empty($request->unit_rate_vendor[$key6]) ? str_replace(",", "", $request->unit_rate_vendor[$key6]) : null,
                            'uom_vendor'      => !empty($request->uom_vendor[$key6]) ? $request->uom_vendor[$key6] : null,
                            'pc_vendor'      => !empty($request->pc_vendor[$key6]) ? $request->pc_vendor[$key6] : null,
                            'code_vendor'      => !empty($request->code_vendor[$key6]) ? $request->code_vendor[$key6] : null,
                            'name_vendor'      => !empty($request->name_vendor[$key6]) ? $request->name_vendor[$key6] : null,
                            'vat_vendor'      => !empty($request->vat_vendor[$key6]) ? $request->vat_vendor[$key6] : null,
                            'curr_vendor'      => !empty($request->curr_vendor[$key6]) ? $request->curr_vendor[$key6] : null,
                            'rate_vendor'      => !empty($request->rate_vendor[$key6]) ? str_replace(",", "", $request->rate_vendor[$key6]) : null,
                            'amt_vendor'      => !empty($request->amt_vendor[$key6]) ? str_replace(",", "", $request->amt_vendor[$key6]) : null,
                            'cost'      => !empty($request->cost[$key6]) ? str_replace(",", "", $request->cost[$key6]) : null,
                            'create_by'         => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'update_by'         => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    SeaImJobD5::insert($result_d5);
                }

                DB::commit();
                return to_route('sea_im_job.index')->with('success', 'New Sea Import Job has been added!');
            } catch (QueryException $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            } catch (\Throwable $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasPermission('edit-sea_im_job')) {
            $job_type = JobType::where('description', 'like', '%IMPORT%')->get();

            $sj = SeaImJob::with(['jm', 'sd1', 'sd2', 'sd3', 'sd4', 'sd5'])->where('id', $id)->first();
            return view('trx.sea_im_job.edit', compact('job_type', 'sj'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->hasPermission('edit-sea_im_job')) {
            $sj = SeaImJob::find($id);

            $jm = JobMaster::where('id', $sj->job_master_id)->first();

            $request->validate(
                [
                    'bl_no'  => 'required|unique:job_masters,bl_no,' . $jm->id,
                    'shipment_type'  => 'required',
                    'cargo_type'  => 'required',
                    'job_type'  => 'required',
                    'customer_code'  => 'required',
                    'origin_code'  => 'required',
                    'eta'  => 'required',
                    'port_loading_code'  => 'required',
                    'port_discharge_code'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {

                $jm->job_type = !empty($request->job_type) ? $request->job_type : null;
                $jm->cargo_type = !empty($request->cargo_type) ? $request->cargo_type : null;
                $jm->bl_no = !empty($request->bl_no) ? $request->bl_no : null;
                $jm->hbl_no = !empty($request->hbl_no) ? $request->hbl_no : null;
                $jm->obl_no = !empty($request->obl_no) ? $request->obl_no : null;
                $jm->shipment_type = !empty($request->shipment_type) ? $request->shipment_type : null;
                $jm->customer_code = !empty($request->customer_code) ? $request->customer_code : null;
                $jm->customer = !empty($request->customer) ? $request->customer : null;
                $jm->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $jm->salesman_code = !empty($request->salesman_code) ? $request->salesman_code : null;
                $jm->salesman = !empty($request->salesman) ? $request->salesman : null;
                $jm->shipper_code = !empty($request->shipper_code) ? $request->shipper_code : null;
                $jm->shipper_name = !empty($request->shipper_name) ? $request->shipper_name : null;
                $jm->shipper_address_1 = !empty($request->shipper_address_1) ? $request->shipper_address_1 : null;
                $jm->shipper_address_2 = !empty($request->shipper_address_2) ? $request->shipper_address_2 : null;
                $jm->shipper_address_3 = !empty($request->shipper_address_3) ? $request->shipper_address_3 : null;
                $jm->shipper_address_4 = !empty($request->shipper_address_4) ? $request->shipper_address_4 : null;
                $jm->consignee_code = !empty($request->consignee_code) ? $request->consignee_code : null;
                $jm->consignee_name = !empty($request->consignee_name) ? $request->consignee_name : null;
                $jm->consignee_address_1 = !empty($request->consignee_address_1) ? $request->consignee_address_1 : null;
                $jm->consignee_address_2 = !empty($request->consignee_address_2) ? $request->consignee_address_2 : null;
                $jm->consignee_address_3 = !empty($request->consignee_address_3) ? $request->consignee_address_3 : null;
                $jm->consignee_address_4 = !empty($request->consignee_address_4) ? $request->consignee_address_4 : null;
                $jm->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $jm->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $jm->delivery_agent_code = !empty($request->delivery_agent_code) ? $request->delivery_agent_code : null;
                $jm->delivery_agent_name = !empty($request->delivery_agent_name) ? $request->delivery_agent_name : null;
                $jm->delivery_agent_address_1 = !empty($request->delivery_agent_address_1) ? $request->delivery_agent_address_1 : null;
                $jm->delivery_agent_address_2 = !empty($request->delivery_agent_address_2) ? $request->delivery_agent_address_2 : null;
                $jm->delivery_agent_address_3 = !empty($request->delivery_agent_address_3) ? $request->delivery_agent_address_3 : null;
                $jm->delivery_agent_address_4 = !empty($request->delivery_agent_address_4) ? $request->delivery_agent_address_4 : null;
                $jm->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $jm->update();

                $sj->job_master_id = $jm->id;
                $sj->do_ready = $request->do_ready == "yes" ? true : false;
                $sj->do_ready_remark = !empty($request->do_ready_remark) ? $request->do_ready_remark : null;
                $sj->nomination_cargo = $request->nomination_cargo == "yes" ? true : false;
                $sj->telex_release = $request->telex_release == "yes" ? true : false;
                $sj->transhipment = $request->transhipment == "yes" ? true : false;
                $sj->frt_pp_cc = !empty($request->frt_pp_cc) ? $request->frt_pp_cc : null;
                $sj->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $sj->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $sj->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $sj->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $sj->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $sj->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $sj->customer_contact = !empty($request->customer_contact) ? $request->customer_contact : null;
                $sj->consignee_contact = !empty($request->consignee_contact) ? $request->consignee_contact : null;
                $sj->consignee_telp = !empty($request->consignee_telp) ? $request->consignee_telp : null;
                $sj->consignee_postal_code = !empty($request->consignee_postal_code) ? $request->consignee_postal_code : null;
                $sj->footer_1 = !empty($request->footer_1) ? $request->footer_1 : null;
                $sj->footer_2 = !empty($request->footer_2) ? $request->footer_2 : null;
                $sj->footer_3 = !empty($request->footer_3) ? $request->footer_3 : null;
                $sj->footer_4 = !empty($request->footer_4) ? $request->footer_4 : null;
                $sj->footer_5 = !empty($request->footer_5) ? $request->footer_5 : null;
                $sj->total_pcs = !empty($request->total_pcs) ? str_replace(",", "", $request->total_pcs) : (!empty($request->pcs[0]) ? array_sum($request->pcs) : null);
                $sj->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $sj->total_gross = !empty($request->total_gross) ? str_replace(",", "", $request->total_gross) : (!empty($request->gross_weight[0]) ? array_sum(str_replace(",", "", $request->gross_weight)) : null);
                $sj->total_volume = !empty($request->total_volume) ? str_replace(",", "", $request->total_volume) : (!empty($request->cargo_volume[0]) ? array_sum(str_replace(",", "", $request->cargo_volume)) : null);
                $sj->billing_instruction = !empty($request->billing_instruction) ? $request->billing_instruction : null;
                $sj->job_costing_remark = !empty($request->job_costing_remark) ? $request->job_costing_remark : null;
                $sj->total_sales = !empty($request->total_sales) ? str_replace(",", "", $request->total_sales) : null;
                $sj->total_cost = !empty($request->total_cost) ? str_replace(",", "", $request->total_cost) : null;
                $sj->profit_loss = !empty($request->profit_loss) ? str_replace(",", "", $request->profit_loss) : null;
                $sj->margin = !empty($request->margin) ? $request->margin : null;
                $sj->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sj->update();

                $sd1 = SeaImJobD1::where('sea_im_job_id', $id)->first();
                $sd1->collect_from_code = !empty($request->collect_from_code) ? $request->collect_from_code : null;
                $sd1->collect_from_name = !empty($request->collect_from_name) ? $request->collect_from_name : null;
                $sd1->collect_from_address_1 = !empty($request->collect_from_address_1) ? $request->collect_from_address_1 : null;
                $sd1->collect_from_address_2 = !empty($request->collect_from_address_2) ? $request->collect_from_address_2 : null;
                $sd1->collect_from_address_3 = !empty($request->collect_from_address_3) ? $request->collect_from_address_3 : null;
                $sd1->collect_from_address_4 = !empty($request->collect_from_address_4) ? $request->collect_from_address_4 : null;
                $sd1->delivery_to_code = !empty($request->delivery_to_code) ? $request->delivery_to_code : null;
                $sd1->delivery_to_name = !empty($request->delivery_to_name) ? $request->delivery_to_name : null;
                $sd1->delivery_to_address_1 = !empty($request->delivery_to_address_1) ? $request->delivery_to_address_1 : null;
                $sd1->delivery_to_address_2 = !empty($request->delivery_to_address_2) ? $request->delivery_to_address_2 : null;
                $sd1->delivery_to_address_3 = !empty($request->delivery_to_address_3) ? $request->delivery_to_address_3 : null;
                $sd1->delivery_to_address_4 = !empty($request->delivery_to_address_4) ? $request->delivery_to_address_4 : null;
                $sd1->transport_company_code = !empty($request->transport_company_code) ? $request->transport_company_code : null;
                $sd1->transport_company_name = !empty($request->transport_company_name) ? $request->transport_company_name : null;
                $sd1->transport_company_address_1 = !empty($request->transport_company_address_1) ? $request->transport_company_address_1 : null;
                $sd1->transport_company_address_2 = !empty($request->transport_company_address_2) ? $request->transport_company_address_2 : null;
                $sd1->transport_company_address_3 = !empty($request->transport_company_address_3) ? $request->transport_company_address_3 : null;
                $sd1->transport_company_address_4 = !empty($request->transport_company_address_4) ? $request->transport_company_address_4 : null;
                $sd1->transport_company_contact_name = !empty($request->transport_company_contact_name) ? $request->transport_company_contact_name : null;
                $sd1->transport_company_telp = !empty($request->transport_company_telp) ? $request->transport_company_telp : null;
                $sd1->transport_company_fax = !empty($request->transport_company_fax) ? $request->transport_company_fax : null;
                $sd1->cr_no = !empty($request->cr_no) ? $request->cr_no : null;
                $sd1->vehicle_no = !empty($request->vehicle_no) ? $request->vehicle_no : null;
                $sd1->delivery_date = !empty($request->delivery_date) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->delivery_date))) : null;
                $sd1->driver_name = !empty($request->driver_name) ? $request->driver_name : null;
                $sd1->driver_contact_1 = !empty($request->driver_contact_1) ? $request->driver_contact_1 : null;
                $sd1->driver_contact_2 = !empty($request->driver_contact_2) ? $request->driver_contact_2 : null;
                $sd1->delivery_instruction_1 = !empty($request->delivery_instruction_1) ? $request->delivery_instruction_1 : null;
                $sd1->delivery_instruction_2 = !empty($request->delivery_instruction_2) ? $request->delivery_instruction_2 : null;
                $sd1->delivery_instruction_3 = !empty($request->delivery_instruction_3) ? $request->delivery_instruction_3 : null;
                $sd1->delivery_instruction_4 = !empty($request->delivery_instruction_4) ? $request->delivery_instruction_4 : null;
                $sd1->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sd1->update();

                $sd2 = SeaImJobD2::where('sea_im_job_id', $id)->first();
                $sd2->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $sd2->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $sd2->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $sd2->commodity = !empty($request->commodity) ? $request->commodity : null;
                $sd2->cargo_class = !empty($request->cargo_class) ? $request->cargo_class : null;
                $sd2->dg_cargo = $request->dg_cargo == "yes" ? true : false;
                $sd2->origin_code = !empty($request->origin_code) ? $request->origin_code : null;
                $sd2->origin_name = !empty($request->origin_name) ? $request->origin_name : null;
                $sd2->dest_code = !empty($request->dest_code) ? $request->dest_code : null;
                $sd2->dest_name = !empty($request->dest_name) ? $request->dest_name : null;
                $sd2->place_of_receipt = !empty($request->place_of_receipt) ? $request->place_of_receipt : null;
                $sd2->port_loading_code = !empty($request->port_loading_code) ? $request->port_loading_code : null;
                $sd2->port_loading_name = !empty($request->port_loading_name) ? $request->port_loading_name : null;
                $sd2->port_discharge_code = !empty($request->port_discharge_code) ? $request->port_discharge_code : null;
                $sd2->port_discharge_name = !empty($request->port_discharge_name) ? $request->port_discharge_name : null;
                $sd2->via_port_code = !empty($request->via_port_code) ? $request->via_port_code : null;
                $sd2->via_port_name = !empty($request->via_port_name) ? $request->via_port_name : null;
                $sd2->place_of_delivery = !empty($request->place_of_delivery) ? $request->place_of_delivery : null;
                $sd2->vessel_code = !empty($request->vessel_code) ? $request->vessel_code : null;
                $sd2->vessel_name = !empty($request->vessel_name) ? $request->vessel_name : null;
                $sd2->voyage_no = !empty($request->voyage_no) ? $request->voyage_no : null;
                $sd2->mother_vessel_name = !empty($request->mother_vessel_name) ? $request->mother_vessel_name : null;
                $sd2->shippline_code = !empty($request->shippline_code) ? $request->shippline_code : null;
                $sd2->shippline_name = !empty($request->shippline_name) ? $request->shippline_name : null;
                $sd2->shippline_ref_no = !empty($request->shippline_ref_no) ? $request->shippline_ref_no : null;
                $sd2->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $sd2->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $sd2->coloader_ref_no = !empty($request->coloader_ref_no) ? $request->coloader_ref_no : null;
                $sd2->detention_free_day = !empty($request->detention_free_day) ? $request->detention_free_day : null;
                $sd2->demurage_free_day = !empty($request->demurage_free_day) ? $request->demurage_free_day : null;
                $sd2->permit_no = !empty($request->permit_no) ? $request->permit_no : null;
                $sd2->letter_of_credit_no = !empty($request->letter_of_credit_no) ? $request->letter_of_credit_no : null;
                $sd2->etd = !empty($request->etd) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->etd))) : null;
                $sd2->first_via_eta = !empty($request->first_via_eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_eta))) : null;
                $sd2->eta = !empty($request->eta) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta))) : null;
                $sd2->dest_eta = !empty($request->dest_eta) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->dest_eta))) : null;
                $sd2->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $sd2->service_level = !empty($request->service_level) ? $request->service_level : null;
                $sd2->mother_voyage = !empty($request->mother_voyage) ? $request->mother_voyage : null;
                $sd2->update_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sd2->update();

                $sd3 = SeaImJobD3::where('sea_im_job_id', $id)->first();
                $sd3->principle_agent_code = !empty($request->principle_agent_code) ? $request->principle_agent_code : null;
                $sd3->shippagent_code = !empty($request->shippagent_code) ? $request->shippagent_code : null;
                $sd3->scn_code = !empty($request->scn_code) ? $request->scn_code : null;
                $sd3->smk_code = !empty($request->smk_code) ? $request->smk_code : null;
                $sd3->cfs_warehouse_code = !empty($request->cfs_warehouse_code) ? $request->cfs_warehouse_code : null;
                $sd3->cfs_warehouse_name = !empty($request->cfs_warehouse_name) ? $request->cfs_warehouse_name : null;
                $sd3->cfs_warehouse_address_1 = !empty($request->cfs_warehouse_address_1) ? $request->cfs_warehouse_address_1 : null;
                $sd3->cfs_warehouse_address_2 = !empty($request->cfs_warehouse_address_2) ? $request->cfs_warehouse_address_2 : null;
                $sd3->cfs_warehouse_address_3 = !empty($request->cfs_warehouse_address_3) ? $request->cfs_warehouse_address_3 : null;
                $sd3->cfs_warehouse_address_4 = !empty($request->cfs_warehouse_address_4) ? $request->cfs_warehouse_address_4 : null;
                $sd3->cfs_warehouse_contact = !empty($request->cfs_warehouse_contact) ? $request->cfs_warehouse_contact : null;
                $sd3->unstuff = !empty($request->unstuff) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->unstuff))) : null;
                $sd3->billing = !empty($request->billing) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->billing))) : null;
                $sd3->truck_in = !empty($request->truck_in) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->truck_in))) : null;
                $sd3->truck_out = !empty($request->truck_out) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->truck_out))) : null;
                $sd3->empty_container = !empty($request->empty_container) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->empty_container))) : null;
                $sd3->yard_code = !empty($request->yard_code) ? $request->yard_code : null;
                $sd3->yard_name = !empty($request->yard_name) ? $request->yard_name : null;
                $sd3->yard_address_1 = !empty($request->yard_address_1) ? $request->yard_address_1 : null;
                $sd3->yard_address_2 = !empty($request->yard_address_2) ? $request->yard_address_2 : null;
                $sd3->yard_address_3 = !empty($request->yard_address_3) ? $request->yard_address_3 : null;
                $sd3->yard_address_4 = !empty($request->yard_address_4) ? $request->yard_address_4 : null;
                $sd3->depot_code = !empty($request->depot_code) ? $request->depot_code : null;
                $sd3->depot_name = !empty($request->depot_name) ? $request->depot_name : null;
                $sd3->depot_address_1 = !empty($request->depot_address_1) ? $request->depot_address_1 : null;
                $sd3->depot_address_2 = !empty($request->depot_address_2) ? $request->depot_address_2 : null;
                $sd3->depot_address_3 = !empty($request->depot_address_3) ? $request->depot_address_3 : null;
                $sd3->depot_address_4 = !empty($request->depot_address_4) ? $request->depot_address_4 : null;
                $sd3->depot_instruction_1 = !empty($request->depot_instruction_1) ? $request->depot_instruction_1 : null;
                $sd3->depot_instruction_2 = !empty($request->depot_instruction_2) ? $request->depot_instruction_2 : null;
                $sd3->depot_instruction_3 = !empty($request->depot_instruction_3) ? $request->depot_instruction_3 : null;
                $sd3->depot_instruction_4 = !empty($request->depot_instruction_4) ? $request->depot_instruction_4 : null;
                $sd3->instruction_1 = !empty($request->instruction_1) ? $request->instruction_1 : null;
                $sd3->instruction_2 = !empty($request->instruction_2) ? $request->instruction_2 : null;
                $sd3->instruction_3 = !empty($request->instruction_3) ? $request->instruction_3 : null;
                $sd3->instruction_4 = !empty($request->instruction_4) ? $request->instruction_4 : null;
                $sd3->update_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sd3->update();

                $result_d4 = [];
                $sj->sea_im_job_d4()->forceDelete();
                if ($request->cargo_commodity_code[0] != null) {
                    foreach ($request->cargo_commodity_code as $key => $val) {
                        $result_d4[] = [
                            'sea_im_job_id'    => $sj->id,
                            'container_no'      => !empty($request->container_no[$key]) ? $request->container_no[$key] : null,
                            'pcs'      => !empty($request->pcs[$key]) ? $request->pcs[$key] : null,
                            'gross_weight'      => !empty($request->gross_weight[$key]) ? str_replace(",", "", $request->gross_weight[$key]) : null,
                            'cargo_commodity_code'      => $val,
                            'cargo_commodity'      => !empty($request->cargo_commodity[$key]) ? $request->cargo_commodity[$key] : null,
                            'seal_no'      => !empty($request->seal_no[$key]) ? $request->seal_no[$key] : null,
                            'cargo_container_code'      => !empty($request->cargo_container_code[$key]) ? $request->cargo_container_code[$key] : null,
                            'cargo_container'      => !empty($request->cargo_container[$key]) ? $request->cargo_container[$key] : null,
                            'cargo_uom_code'      => !empty($request->cargo_uom_code[$key]) ? $request->cargo_uom_code[$key] : null,
                            'cargo_uom'      => !empty($request->cargo_uom[$key]) ? $request->cargo_uom[$key] : null,
                            'cargo_volume'      => !empty($request->cargo_volume[$key]) ? str_replace(",", "", $request->cargo_volume[$key]) : null,
                            'marks_1'      => !empty($request->marks_1[$key]) ? $request->marks_1[$key] : null,
                            'marks_2'      => !empty($request->marks_2[$key]) ? $request->marks_2[$key] : null,
                            'marks_3'      => !empty($request->marks_3[$key]) ? $request->marks_3[$key] : null,
                            'marks_4'      => !empty($request->marks_4[$key]) ? $request->marks_4[$key] : null,
                            'marks_5'      => !empty($request->marks_5[$key]) ? $request->marks_5[$key] : null,
                            'marks_6'      => !empty($request->marks_6[$key]) ? $request->marks_6[$key] : null,
                            'marks_7'      => !empty($request->marks_7[$key]) ? $request->marks_7[$key] : null,
                            'marks_8'      => !empty($request->marks_8[$key]) ? $request->marks_8[$key] : null,
                            'marks_9'      => !empty($request->marks_9[$key]) ? $request->marks_9[$key] : null,
                            'marks_10'      => !empty($request->marks_10[$key]) ? $request->marks_10[$key] : null,
                            'good_desc_1'      => !empty($request->good_desc_1[$key]) ? $request->good_desc_1[$key] : null,
                            'good_desc_2'      => !empty($request->good_desc_2[$key]) ? $request->good_desc_2[$key] : null,
                            'good_desc_3'      => !empty($request->good_desc_3[$key]) ? $request->good_desc_3[$key] : null,
                            'good_desc_4'      => !empty($request->good_desc_4[$key]) ? $request->good_desc_4[$key] : null,
                            'good_desc_5'      => !empty($request->good_desc_5[$key]) ? $request->good_desc_5[$key] : null,
                            'good_desc_6'      => !empty($request->good_desc_6[$key]) ? $request->good_desc_6[$key] : null,
                            'good_desc_7'      => !empty($request->good_desc_7[$key]) ? $request->good_desc_7[$key] : null,
                            'good_desc_8'      => !empty($request->good_desc_8[$key]) ? $request->good_desc_8[$key] : null,
                            'good_desc_9'      => !empty($request->good_desc_9[$key]) ? $request->good_desc_9[$key] : null,
                            'good_desc_10'      => !empty($request->good_desc_10[$key]) ? $request->good_desc_10[$key] : null,
                            'create_by'         => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'update_by'         => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    SeaImJobD4::insert($result_d4);
                }

                $result_d5 = [];
                $sj->sea_im_job_d5()->forceDelete();
                if ($request->code[1] != null) {
                    foreach ($request->id_key as $key6) {
                        $result_d5[] = [
                            'sea_im_job_id'    => $sj->id,
                            'code'  => !empty($request->code[$key6]) ? $request->code[$key6] : null,
                            'description'      => !empty($request->description[$key6]) ? $request->description[$key6] : null,
                            'qty_sales'      => !empty($request->qty_sales[$key6]) ? str_replace(",", "", $request->qty_sales[$key6]) : null,
                            'unit_rate_sales'      => !empty($request->unit_rate_sales[$key6]) ? str_replace(",", "", $request->unit_rate_sales[$key6]) : null,
                            'uom_sales'      => !empty($request->uom_sales[$key6]) ? $request->uom_sales[$key6] : null,
                            'pc_sales'      => !empty($request->pc_sales[$key6]) ? $request->pc_sales[$key6] : null,
                            'cust_code_sales'      => !empty($request->cust_code_sales[$key6]) ? $request->cust_code_sales[$key6] : null,
                            'cust_name_sales'      => !empty($request->cust_name_sales[$key6]) ? $request->cust_name_sales[$key6] : null,
                            'vat_sales'      => !empty($request->vat_sales[$key6]) ? $request->vat_sales[$key6] : null,
                            'curr_sales'      => !empty($request->curr_sales[$key6]) ? $request->curr_sales[$key6] : null,
                            'rate_sales'      => !empty($request->rate_sales[$key6]) ? str_replace(",", "", $request->rate_sales[$key6]) : null,
                            'amt_sales'      => !empty($request->amt_sales[$key6]) ? str_replace(",", "", $request->amt_sales[$key6]) : null,
                            'sales'      => !empty($request->sales[$key6]) ? str_replace(",", "", $request->sales[$key6]) : null,
                            'qty_vendor'      => !empty($request->qty_vendor[$key6]) ? str_replace(",", "", $request->qty_vendor[$key6]) : null,
                            'unit_rate_vendor'      => !empty($request->unit_rate_vendor[$key6]) ? str_replace(",", "", $request->unit_rate_vendor[$key6]) : null,
                            'uom_vendor'      => !empty($request->uom_vendor[$key6]) ? $request->uom_vendor[$key6] : null,
                            'pc_vendor'      => !empty($request->pc_vendor[$key6]) ? $request->pc_vendor[$key6] : null,
                            'code_vendor'      => !empty($request->code_vendor[$key6]) ? $request->code_vendor[$key6] : null,
                            'name_vendor'      => !empty($request->name_vendor[$key6]) ? $request->name_vendor[$key6] : null,
                            'vat_vendor'      => !empty($request->vat_vendor[$key6]) ? $request->vat_vendor[$key6] : null,
                            'curr_vendor'      => !empty($request->curr_vendor[$key6]) ? $request->curr_vendor[$key6] : null,
                            'rate_vendor'      => !empty($request->rate_vendor[$key6]) ? str_replace(",", "", $request->rate_vendor[$key6]) : null,
                            'amt_vendor'      => !empty($request->amt_vendor[$key6]) ? str_replace(",", "", $request->amt_vendor[$key6]) : null,
                            'cost'      => !empty($request->cost[$key6]) ? str_replace(",", "", $request->cost[$key6]) : null,
                            'create_by'         => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'update_by'         => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    SeaImJobD5::insert($result_d5);
                }

                DB::commit();
                return to_route('sea_im_job.index')->with('success', 'Sea Import Job has been updated!');
            } catch (QueryException $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            } catch (\Throwable $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeaImJob $sea_im_job)
    {
        if (Auth::user()->hasPermission('delete-sea_im_job')) {
            DB::beginTransaction();
            try {
                $sea_im_job->delete();

                DB::commit();
                return to_route('sea_im_job.index')->with('success', 'Sea Import Job has been deleted!');
            } catch (QueryException $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            } catch (\Throwable $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
        } else {
            abort(403);
        }
    }

    public function pdf($id, $jns_pdf = NULL, Request $request)
    {
        $tgl_cetak = date('d M Y', strtotime(str_replace('/', '-', $request->tgl_cetak)));
        $penerima_kuasa = ucwords($request->penerima_kuasa);
        $sj = SeaImJob::with(['jm', 'sd1', 'sd2', 'sd3', 'sd4', 'sd5'])->where('id', $id)->orderBy('id', 'DESC')->first();

        $sales = array_filter($sj->toArray()['sd5'], function ($value) {
            return ($value['cust_code_sales'] != null);
        });

        $vendor = array_filter($sj->toArray()['sd5'], function ($value) {
            return ($value['code_vendor'] != null);
        });

        $company = Company::first();
        $company_detail = CompanyDetailSatu::where('company_id', $company->id)->where('type', 'Head Office')->first();
        $pdf = app('dompdf.wrapper');

        if ($jns_pdf == 'js') {
            $pdf->loadView('trx.sea_im_job.export_pdf_js', [
                'sj'    => $sj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        } else if ($jns_pdf == 'jo') {
            $pdf->loadView('trx.sea_im_job.export_pdf_jo', [
                'sj'    => $sj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        } else if ($jns_pdf == 'sppd') {
            $pdf->loadView('trx.sea_im_job.export_pdf_sppd', [
                'sj'    => $sj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'tgl_cetak'   => $tgl_cetak,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        } else if ($jns_pdf == 'sprdo') {
            $pdf->loadView('trx.sea_im_job.export_pdf_sprdo', [
                'sj'    => $sj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'tgl_cetak'   => $tgl_cetak,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        } else if ($jns_pdf == 'sk') {
            $pdf->loadView('trx.sea_im_job.export_pdf_sk', [
                'sj'    => $sj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'tgl_cetak'   => $tgl_cetak,
                'penerima_kuasa'   => $penerima_kuasa,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        }
        return $pdf->stream('laporan.pdf');
    }
}
