<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\Company;
use App\Models\History;
use App\Models\JobType;
use App\Models\SeaExJob;
use App\Models\JobMaster;
use App\Models\SeaExJobD1;
use App\Models\SeaExJobD2;
use App\Models\SeaExJobD3;
use App\Models\SeaExJobD4;
use App\Models\SeaExJobD5;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CompanyDetailSatu;
use App\Models\SeaBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class SeaExportJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-sea_ex_job')) {
            if ($request->ajax()) {
                if (!empty(auth()->user()->salesman_code)) {
                    $sea_ex_job = SeaExJob::with(['job_master', 'sea_ex_job_d1'])->whereHas('job_master', function ($query) {
                        $query->where('salesman_code', explode(",", auth()->user()->salesman_code));
                    })->orderBy('sea_ex_jobs.id', 'DESC')->select('*');
                } else {
                    $sea_ex_job = SeaExJob::with(['job_master', 'sea_ex_job_d1'])->orderBy('sea_ex_jobs.id', 'DESC')->select('*');
                }
                return DataTables::of($sea_ex_job)
                    ->addColumn('action', function ($sea_ex_job) {
                        return view('datatable-modal._action_pdf', [
                            'row_id' => $sea_ex_job->id,
                            'edit_url' => route('sea_ex_job.edit', $sea_ex_job->id),
                            'delete_url' => route('sea_ex_job.destroy', $sea_ex_job->id),
                            'job_no'    => $sea_ex_job->job_master->job_no,
                            'can_edit' => 'edit-sea_ex_job',
                            'can_delete' => 'delete-sea_ex_job'
                        ]);
                    })
                    ->editColumn('updated_at', function ($sea_ex_job) {
                        return !empty($sea_ex_job->updated_at) ? date("d-m-Y H:i", strtotime($sea_ex_job->updated_at)) : "-";
                    })
                    ->editColumn('total_gross', function ($sea_ex_job) {
                        return !empty($sea_ex_job->total_gross) ? number_format($sea_ex_job->total_gross, 4, '.', ',') : "-";
                    })
                    ->editColumn('total_volume', function ($sea_ex_job) {
                        return !empty($sea_ex_job->total_volume) ? number_format($sea_ex_job->total_volume, 4, '.', ',') : "-";
                    })
                    ->rawColumns(['updated_at', 'action', 'total_gross', 'total_volume'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Sea Export Job')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Sea Export Job')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Export Job',
                    'url_menu'  => route('sea_ex_job.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Export Job',
                    'url_menu'  => route('sea_ex_job.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('trx.sea_ex_job.index');
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
        if (Auth::user()->hasPermission('create-sea_ex_job')) {
            $job_type = JobType::where('description', 'like', '%EXPORT%')->get();

            return view('trx.sea_ex_job.create', compact('job_type'));
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
        if (Auth::user()->hasPermission('create-sea_ex_job')) {
            $request->validate(
                [
                    'job_no'    => 'required|max:20|unique:job_masters,job_no',
                    'bl_no'  => 'required|unique:job_masters,bl_no',
                    'shipment_type'  => 'required',
                    'cargo_type'  => 'required',
                    'job_type'  => 'required',
                    'customer_code'  => 'required',
                    'dest_code'  => 'required',
                    'etd'  => 'required',
                    'port_loading_code'  => 'required',
                    'port_discharge_code'  => 'required',
                ],
            );
            DB::beginTransaction();
            try {
                $sj = new SeaExJob();
                $job_no = CodeNumbering::custom_code('36', $sj, 'job_no');

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
                $sj->booking_no = !empty($request->booking_no) ? $request->booking_no : null;
                $sj->quotation_no = !empty($request->quotation_no) ? $request->quotation_no : null;
                $sj->no_of_original_bl = !empty($request->no_of_original_bl) ? str_replace(",", "", $request->no_of_original_bl) : null;
                $sj->bl_surrendered = $request->bl_surrendered == "yes" ? true : false;
                $sj->bl_attach = $request->bl_attach == "yes" ? true : false;
                $sj->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $sj->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $sj->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $sj->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $sj->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $sj->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $sj->freight = !empty($request->freight) ? $request->freight : null;
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

                $sj_d1 = new SeaExJobD1();
                $sj_d1->sea_ex_job_id = $sj->id;
                $sj_d1->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $sj_d1->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $sj_d1->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $sj_d1->commodity = !empty($request->commodity) ? $request->commodity : null;
                $sj_d1->cargo_class = !empty($request->cargo_class) ? $request->cargo_class : null;
                $sj_d1->origin_code = !empty($request->origin_code) ? $request->origin_code : null;
                $sj_d1->origin_name = !empty($request->origin_name) ? $request->origin_name : null;
                $sj_d1->dest_code = !empty($request->dest_code) ? $request->dest_code : null;
                $sj_d1->dest_name = !empty($request->dest_name) ? $request->dest_name : null;
                $sj_d1->place_of_receipt = !empty($request->place_of_receipt) ? $request->place_of_receipt : null;
                $sj_d1->port_loading_code = !empty($request->port_loading_code) ? $request->port_loading_code : null;
                $sj_d1->port_loading_name = !empty($request->port_loading_name) ? $request->port_loading_name : null;
                $sj_d1->port_discharge_code = !empty($request->port_discharge_code) ? $request->port_discharge_code : null;
                $sj_d1->port_discharge_name = !empty($request->port_discharge_name) ? $request->port_discharge_name : null;
                $sj_d1->via_port_code = !empty($request->via_port_code) ? $request->via_port_code : null;
                $sj_d1->via_port_name = !empty($request->via_port_name) ? $request->via_port_name : null;
                $sj_d1->place_of_delivery = !empty($request->place_of_delivery) ? $request->place_of_delivery : null;
                $sj_d1->pre_carriage = !empty($request->pre_carriage) ? $request->pre_carriage : null;
                $sj_d1->vessel_code = !empty($request->vessel_code) ? $request->vessel_code : null;
                $sj_d1->vessel_name = !empty($request->vessel_name) ? $request->vessel_name : null;
                $sj_d1->voyage_no = !empty($request->voyage_no) ? $request->voyage_no : null;
                $sj_d1->mother_vessel_name = !empty($request->mother_vessel_name) ? $request->mother_vessel_name : null;
                $sj_d1->shippline_code = !empty($request->shippline_code) ? $request->shippline_code : null;
                $sj_d1->shippline_name = !empty($request->shippline_name) ? $request->shippline_name : null;
                $sj_d1->shippline_ref_no = !empty($request->shippline_ref_no) ? $request->shippline_ref_no : null;
                $sj_d1->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $sj_d1->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $sj_d1->coloader_ref_no = !empty($request->coloader_ref_no) ? $request->coloader_ref_no : null;
                $sj_d1->stuff_warehouse_code = !empty($request->stuff_warehouse_code) ? $request->stuff_warehouse_code : null;
                $sj_d1->stuff_warehouse_name = !empty($request->stuff_warehouse_name) ? $request->stuff_warehouse_name : null;
                $sj_d1->permit_no = !empty($request->permit_no) ? $request->permit_no : null;
                $sj_d1->eta_sub = !empty($request->eta_sub) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_sub))) : null;
                $sj_d1->etd = !empty($request->etd) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->etd))) : null;
                $sj_d1->first_via_ata = !empty($request->first_via_ata) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_ata))) : null;
                $sj_d1->first_via_eta = !empty($request->first_via_eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_eta))) : null;
                $sj_d1->first_via_etd = !empty($request->first_via_etd) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_etd))) : null;
                $sj_d1->eta = !empty($request->eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->eta))) : null;
                $sj_d1->dest_eta = !empty($request->dest_eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->dest_eta))) : null;
                $sj_d1->mother_voyage = !empty($request->mother_voyage) ? $request->mother_voyage : null;
                $sj_d1->vessel_remark = !empty($request->vessel_remark) ? $request->vessel_remark : null;
                $sj_d1->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $sj_d1->service_level = !empty($request->service_level) ? $request->service_level : null;
                $sj_d1->create_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sj_d1->save();

                $sj_d2 = new SeaExJobD2();
                $sj_d2->sea_ex_job_id = $sj->id;
                $sj_d2->principle_agent_code = !empty($request->principle_agent_code) ? $request->principle_agent_code : null;
                $sj_d2->shippagent_code = !empty($request->shippagent_code) ? $request->shippagent_code : null;
                $sj_d2->scn_code = !empty($request->scn_code) ? $request->scn_code : null;
                $sj_d2->stuff_agent_code = !empty($request->stuff_agent_code) ? $request->stuff_agent_code : null;
                $sj_d2->stuff_agent_name = !empty($request->stuff_agent_name) ? $request->stuff_agent_name : null;
                $sj_d2->stuff_agent_address_1 = !empty($request->stuff_agent_address_1) ? $request->stuff_agent_address_1 : null;
                $sj_d2->stuff_agent_address_2 = !empty($request->stuff_agent_address_2) ? $request->stuff_agent_address_2 : null;
                $sj_d2->stuff_agent_address_3 = !empty($request->stuff_agent_address_3) ? $request->stuff_agent_address_3 : null;
                $sj_d2->stuff_agent_address_4 = !empty($request->stuff_agent_address_4) ? $request->stuff_agent_address_4 : null;
                $sj_d2->stuff_agent_contact_name = !empty($request->stuff_agent_contact_name) ? $request->stuff_agent_contact_name : null;
                $sj_d2->stuff = !empty($request->stuff) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->stuff))) : null;
                $sj_d2->close_date_time = !empty($request->close_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->close_date_time))) : null;
                $sj_d2->trucking = !empty($request->trucking) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->trucking))) : null;
                $sj_d2->billing = !empty($request->billing) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->billing))) : null;
                $sj_d2->yard_code = !empty($request->yard_code) ? $request->yard_code : null;
                $sj_d2->yard_name = !empty($request->yard_name) ? $request->yard_name : null;
                $sj_d2->yard_address_1 = !empty($request->yard_address_1) ? $request->yard_address_1 : null;
                $sj_d2->yard_address_2 = !empty($request->yard_address_2) ? $request->yard_address_2 : null;
                $sj_d2->yard_address_3 = !empty($request->yard_address_3) ? $request->yard_address_3 : null;
                $sj_d2->yard_address_4 = !empty($request->yard_address_4) ? $request->yard_address_4 : null;
                $sj_d2->depot_code = !empty($request->depot_code) ? $request->depot_code : null;
                $sj_d2->depot_name = !empty($request->depot_name) ? $request->depot_name : null;
                $sj_d2->depot_address_1 = !empty($request->depot_address_1) ? $request->depot_address_1 : null;
                $sj_d2->depot_address_2 = !empty($request->depot_address_2) ? $request->depot_address_2 : null;
                $sj_d2->depot_address_3 = !empty($request->depot_address_3) ? $request->depot_address_3 : null;
                $sj_d2->depot_address_4 = !empty($request->depot_address_4) ? $request->depot_address_4 : null;
                $sj_d2->create_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sj_d2->save();

                $result_d3 = [];
                if ($request->cargo_commodity_code[0] != null) {
                    foreach ($request->cargo_commodity_code as $key => $val) {
                        $result_d3[] = [
                            'sea_ex_job_id'    => $sj->id,
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
                    SeaExJobD3::insert($result_d3);
                }

                $sj_d4 = new SeaExJobD4();
                $sj_d4->sea_ex_job_id = $sj->id;
                $sj_d4->letter_of_credit = !empty($request->letter_of_credit) ? $request->letter_of_credit : null;
                $sj_d4->obl_surrendered = $request->obl_surrendered == "yes" ? true : false;
                $sj_d4->obl_freight = !empty($request->obl_freight) ? $request->obl_freight : null;
                $sj_d4->place_of_issue = !empty($request->place_of_issue) ? $request->place_of_issue : null;
                $sj_d4->date_of_issue = !empty($request->date_of_issue) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->date_of_issue))) : null;
                $sj_d4->laden_on_board = !empty($request->laden_on_board) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->laden_on_board))) : null;
                $sj_d4->telex_release = $request->telex_release == "yes" ? true : false;
                $sj_d4->issue_by =  Company::where('id', 1)->first()->name;
                $sj_d4->said_to_contain = !empty($request->said_to_contain) ? $request->said_to_contain : null;
                $sj_d4->total_pcs_in_word = !empty($request->total_pcs_in_word) ? $request->total_pcs_in_word : null;
                $sj_d4->do_release_to = !empty($request->do_release_to) ? $request->do_release_to : null;
                $sj_d4->do_release_date = !empty($request->do_release_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->do_release_date))) : null;
                $sj_d4->cargo_collection_date = !empty($request->cargo_collection_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->cargo_collection_date))) : null;
                $sj_d4->note = !empty($request->note) ? $request->note : null;
                $sj_d4->create_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sj_d4->save();

                $result_d5 = [];
                if ($request->code[0] != null) {
                    foreach ($request->code as $key6 => $val6) {
                        $result_d5[] = [
                            'sea_ex_job_id'    => $sj->id,
                            'code'  => $val6,
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
                    SeaExJobD5::insert($result_d5);
                }

                // UPDATE NO JOB NO. DI MENU BOOKING
                if (!empty($request->booking_no)) {
                    $book = SeaBooking::where('code', $request->booking_no)->first();
                    $book->job_no = $job_no;
                    $book->update();
                }

                DB::commit();
                return to_route('sea_ex_job.index')->with('success', 'New Sea Export Job has been added!');
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
        if (Auth::user()->hasPermission('edit-sea_ex_job')) {
            $job_type = JobType::where('description', 'like', '%EXPORT%')->get();

            $sj = SeaExJob::with(['jm', 's_d1', 's_d2', 's_d3', 's_d4', 's_d5'])->where('id', $id)->first();
            return view('trx.sea_ex_job.edit', compact('job_type', 'sj'));
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
        if (Auth::user()->hasPermission('edit-sea_ex_job')) {
            $sj = SeaExJob::find($id);

            $jm = JobMaster::where('id', $sj->job_master_id)->first();

            $request->validate(
                [
                    'bl_no'  => 'required|unique:job_masters,bl_no,' . $jm->id,
                    'shipment_type'  => 'required',
                    'cargo_type'  => 'required',
                    'job_type'  => 'required',
                    'customer_code'  => 'required',
                    'dest_code'  => 'required',
                    'etd'  => 'required',
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

                // UPDATE NO JOB NO. DI MENU BOOKING
                if (!empty($request->booking_no)) {
                    if ($sj->booking_no != $request->booking_no) {
                        $book_old = SeaBooking::where('code', $sj->booking_no)->first();
                        $book_old->update(['job_no' => null]);

                        $book = SeaBooking::where('code', $request->booking_no)->first();
                        $book->update(['job_no' => $jm->job_no]);
                    } else {
                        $book = SeaBooking::where('code', $sj->booking_no)->first();
                        $book->update(['job_no' => $jm->job_no]);
                    }
                }

                $sj->booking_no = !empty($request->booking_no) ? $request->booking_no : null;
                $sj->quotation_no = !empty($request->quotation_no) ? $request->quotation_no : null;
                $sj->no_of_original_bl = !empty($request->no_of_original_bl) ? str_replace(",", "", $request->no_of_original_bl) : null;
                $sj->bl_surrendered = $request->bl_surrendered == "yes" ? true : false;
                $sj->bl_attach = $request->bl_attach == "yes" ? true : false;
                $sj->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $sj->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $sj->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $sj->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $sj->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $sj->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $sj->freight = !empty($request->freight) ? $request->freight : null;
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

                $sj_d1 = SeaExJobD1::where('sea_ex_job_id', $id)->first();
                $sj_d1->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $sj_d1->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $sj_d1->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $sj_d1->commodity = !empty($request->commodity) ? $request->commodity : null;
                $sj_d1->cargo_class = !empty($request->cargo_class) ? $request->cargo_class : null;
                $sj_d1->origin_code = !empty($request->origin_code) ? $request->origin_code : null;
                $sj_d1->origin_name = !empty($request->origin_name) ? $request->origin_name : null;
                $sj_d1->dest_code = !empty($request->dest_code) ? $request->dest_code : null;
                $sj_d1->dest_name = !empty($request->dest_name) ? $request->dest_name : null;
                $sj_d1->place_of_receipt = !empty($request->place_of_receipt) ? $request->place_of_receipt : null;
                $sj_d1->port_loading_code = !empty($request->port_loading_code) ? $request->port_loading_code : null;
                $sj_d1->port_loading_name = !empty($request->port_loading_name) ? $request->port_loading_name : null;
                $sj_d1->port_discharge_code = !empty($request->port_discharge_code) ? $request->port_discharge_code : null;
                $sj_d1->port_discharge_name = !empty($request->port_discharge_name) ? $request->port_discharge_name : null;
                $sj_d1->via_port_code = !empty($request->via_port_code) ? $request->via_port_code : null;
                $sj_d1->via_port_name = !empty($request->via_port_name) ? $request->via_port_name : null;
                $sj_d1->place_of_delivery = !empty($request->place_of_delivery) ? $request->place_of_delivery : null;
                $sj_d1->pre_carriage = !empty($request->pre_carriage) ? $request->pre_carriage : null;
                $sj_d1->vessel_code = !empty($request->vessel_code) ? $request->vessel_code : null;
                $sj_d1->vessel_name = !empty($request->vessel_name) ? $request->vessel_name : null;
                $sj_d1->voyage_no = !empty($request->voyage_no) ? $request->voyage_no : null;
                $sj_d1->mother_vessel_name = !empty($request->mother_vessel_name) ? $request->mother_vessel_name : null;
                $sj_d1->shippline_code = !empty($request->shippline_code) ? $request->shippline_code : null;
                $sj_d1->shippline_name = !empty($request->shippline_name) ? $request->shippline_name : null;
                $sj_d1->shippline_ref_no = !empty($request->shippline_ref_no) ? $request->shippline_ref_no : null;
                $sj_d1->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $sj_d1->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $sj_d1->coloader_ref_no = !empty($request->coloader_ref_no) ? $request->coloader_ref_no : null;
                $sj_d1->stuff_warehouse_code = !empty($request->stuff_warehouse_code) ? $request->stuff_warehouse_code : null;
                $sj_d1->stuff_warehouse_name = !empty($request->stuff_warehouse_name) ? $request->stuff_warehouse_name : null;
                $sj_d1->permit_no = !empty($request->permit_no) ? $request->permit_no : null;
                $sj_d1->eta_sub = !empty($request->eta_sub) ?  date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_sub))) : null;
                $sj_d1->etd = !empty($request->etd) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->etd))) : null;
                $sj_d1->first_via_ata = !empty($request->first_via_ata) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_ata))) : null;
                $sj_d1->first_via_eta = !empty($request->first_via_eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_eta))) : null;
                $sj_d1->first_via_etd = !empty($request->first_via_etd) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->first_via_etd))) : null;
                $sj_d1->eta = !empty($request->eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->eta))) : null;
                $sj_d1->dest_eta = !empty($request->dest_eta) ?  date('Y-m-d', strtotime(str_replace('/', '-', $request->dest_eta))) : null;
                $sj_d1->mother_voyage = !empty($request->mother_voyage) ? $request->mother_voyage : null;
                $sj_d1->vessel_remark = !empty($request->vessel_remark) ? $request->vessel_remark : null;
                $sj_d1->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $sj_d1->service_level = !empty($request->service_level) ? $request->service_level : null;
                $sj_d1->update_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sj_d1->update();

                $sj_d2 = SeaExJobD2::where('sea_ex_job_id', $id)->first();
                $sj_d2->principle_agent_code = !empty($request->principle_agent_code) ? $request->principle_agent_code : null;
                $sj_d2->shippagent_code = !empty($request->shippagent_code) ? $request->shippagent_code : null;
                $sj_d2->scn_code = !empty($request->scn_code) ? $request->scn_code : null;
                $sj_d2->stuff_agent_code = !empty($request->stuff_agent_code) ? $request->stuff_agent_code : null;
                $sj_d2->stuff_agent_name = !empty($request->stuff_agent_name) ? $request->stuff_agent_name : null;
                $sj_d2->stuff_agent_address_1 = !empty($request->stuff_agent_address_1) ? $request->stuff_agent_address_1 : null;
                $sj_d2->stuff_agent_address_2 = !empty($request->stuff_agent_address_2) ? $request->stuff_agent_address_2 : null;
                $sj_d2->stuff_agent_address_3 = !empty($request->stuff_agent_address_3) ? $request->stuff_agent_address_3 : null;
                $sj_d2->stuff_agent_address_4 = !empty($request->stuff_agent_address_4) ? $request->stuff_agent_address_4 : null;
                $sj_d2->stuff_agent_contact_name = !empty($request->stuff_agent_contact_name) ? $request->stuff_agent_contact_name : null;
                $sj_d2->stuff = !empty($request->stuff) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->stuff))) : null;
                $sj_d2->close_date_time = !empty($request->close_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->close_date_time))) : null;
                $sj_d2->trucking = !empty($request->trucking) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->trucking))) : null;
                $sj_d2->billing = !empty($request->billing) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->billing))) : null;
                $sj_d2->yard_code = !empty($request->yard_code) ? $request->yard_code : null;
                $sj_d2->yard_name = !empty($request->yard_name) ? $request->yard_name : null;
                $sj_d2->yard_address_1 = !empty($request->yard_address_1) ? $request->yard_address_1 : null;
                $sj_d2->yard_address_2 = !empty($request->yard_address_2) ? $request->yard_address_2 : null;
                $sj_d2->yard_address_3 = !empty($request->yard_address_3) ? $request->yard_address_3 : null;
                $sj_d2->yard_address_4 = !empty($request->yard_address_4) ? $request->yard_address_4 : null;
                $sj_d2->depot_code = !empty($request->depot_code) ? $request->depot_code : null;
                $sj_d2->depot_name = !empty($request->depot_name) ? $request->depot_name : null;
                $sj_d2->depot_address_1 = !empty($request->depot_address_1) ? $request->depot_address_1 : null;
                $sj_d2->depot_address_2 = !empty($request->depot_address_2) ? $request->depot_address_2 : null;
                $sj_d2->depot_address_3 = !empty($request->depot_address_3) ? $request->depot_address_3 : null;
                $sj_d2->depot_address_4 = !empty($request->depot_address_4) ? $request->depot_address_4 : null;
                $sj_d2->update_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sj_d2->update();

                $result_d3 = [];
                $sj->sea_ex_job_d3()->forceDelete();
                if ($request->cargo_commodity_code[0] != null) {
                    foreach ($request->cargo_commodity_code as $key => $val) {
                        $result_d3[] = [
                            'sea_ex_job_id'    => $sj->id,
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
                    SeaExJobD3::insert($result_d3);
                }

                $sj_d4 = SeaExJobD4::where('sea_ex_job_id', $id)->first();
                $sj_d4->letter_of_credit = !empty($request->letter_of_credit) ? $request->letter_of_credit : null;
                $sj_d4->obl_surrendered = $request->obl_surrendered == "yes" ? true : false;
                $sj_d4->obl_freight = !empty($request->obl_freight) ? $request->obl_freight : null;
                $sj_d4->place_of_issue = !empty($request->place_of_issue) ? $request->place_of_issue : null;
                $sj_d4->date_of_issue = !empty($request->date_of_issue) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->date_of_issue))) : null;
                $sj_d4->laden_on_board = !empty($request->laden_on_board) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->laden_on_board))) : null;
                $sj_d4->telex_release = $request->telex_release == "yes" ? true : false;
                $sj_d4->issue_by =  Company::where('id', 1)->first()->name;
                $sj_d4->said_to_contain = !empty($request->said_to_contain) ? $request->said_to_contain : null;
                $sj_d4->total_pcs_in_word = !empty($request->total_pcs_in_word) ? $request->total_pcs_in_word : null;
                $sj_d4->do_release_to = !empty($request->do_release_to) ? $request->do_release_to : null;
                $sj_d4->do_release_date = !empty($request->do_release_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->do_release_date))) : null;
                $sj_d4->cargo_collection_date = !empty($request->cargo_collection_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->cargo_collection_date))) : null;
                $sj_d4->note = !empty($request->note) ? $request->note : null;
                $sj_d4->update_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $sj_d4->update();

                $result_d5 = [];
                $sj->sea_ex_job_d5()->forceDelete();
                if ($request->code[0] != null) {
                    foreach ($request->code as $key6 => $val6) {
                        $result_d5[] = [
                            'sea_ex_job_id'    => $sj->id,
                            'code'  => $val6,
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
                    SeaExJobD5::insert($result_d5);
                }

                DB::commit();
                return to_route('sea_ex_job.index')->with('success', 'New Sea Export Job has been updated!');
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
    public function destroy(SeaExJob $sea_ex_job)
    {
        if (Auth::user()->hasPermission('delete-sea_ex_job')) {
            DB::beginTransaction();
            try {
                $sea_ex_job->delete();

                DB::commit();
                return to_route('sea_ex_job.index')->with('success', 'Sea Export Job has been deleted!');
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



    public function pdf($id, $jns_pdf = NULL)
    {
        $sj = SeaExJob::with(['jm.bisnis_party', 's_d1', 's_d2', 's_d3', 's_d4', 's_d5'])->where('id', $id)->orderBy('id', 'DESC')->first();
        $sales = array_filter($sj->toArray()['s_d5'], function ($value) {
            return ($value['cust_code_sales'] != null);
        });

        $vendor = array_filter($sj->toArray()['s_d5'], function ($value) {
            return ($value['code_vendor'] != null);
        });
        $company = Company::first();
        $company_detail = CompanyDetailSatu::where('company_id', $company->id)->where('type', 'Head Office')->first();
        $pdf = app('dompdf.wrapper');

        if ($jns_pdf == 'js') {
            $pdf->loadView('trx.sea_ex_job.export_pdf_js', [
                'sj'    => $sj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        } else if ($jns_pdf == 'jo') {
            $pdf->loadView('trx.sea_ex_job.export_pdf_jo', [
                'sj'    => $sj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        } else if ($jns_pdf == 'jc') {
            $pdf->loadView('trx.sea_ex_job.export_pdf_jc', [
                'sj'    => $sj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        }
        return $pdf->stream('laporan.pdf');
    }
}
