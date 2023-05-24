<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\Company;
use App\Models\History;
use App\Models\JobType;
use App\Models\AirImJob;
use App\Models\JobMaster;
use App\Models\AirImJobD1;
use App\Models\AirImJobD2;
use App\Models\AirImJobD3;
use App\Models\BisnisParty;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CompanyDetailSatu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class AirImJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-air_im_job')) {
            if ($request->ajax()) {
                if (!empty(auth()->user()->salesman_code)) {
                    $air_im_job = AirImJob::with(['jm', 'ad1'])->whereHas('jm', function ($query) {
                        $query->where('salesman_code', explode(",", auth()->user()->salesman_code));
                    })->orderBy('air_im_jobs.id', 'DESC')->select('*');
                } else {
                    $air_im_job = AirImJob::with(['jm', 'ad1'])->orderBy('air_im_jobs.id', 'DESC')->select('*');
                }
                return DataTables::of($air_im_job)
                    ->addColumn('action', function ($air_im_job) {
                        return view('datatable-modal._action_pdf_ai', [
                            'row_id' => $air_im_job->id,
                            'edit_url' => route('air_im_job.edit', $air_im_job->id),
                            'delete_url' => route('air_im_job.destroy', $air_im_job->id),
                            'job_no'    => $air_im_job->jm->job_no,
                            'can_edit' => 'edit-air_im_job',
                            'can_delete' => 'delete-air_im_job'
                        ]);
                    })
                    ->editColumn('updated_at', function ($air_im_job) {
                        return !empty($air_im_job->updated_at) ? date("d-m-Y H:i", strtotime($air_im_job->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Air Import Job')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Air Import Job')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Air Import Job',
                    'url_menu'  => route('air_im_job.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Air Import Job',
                    'url_menu'  => route('air_im_job.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('trx.air_im_job.index');
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
        if (Auth::user()->hasPermission('create-air_im_job')) {
            $job_type = JobType::where('description', 'like', '%IMPORT%')->get();
            return view('trx.air_im_job.create', compact('job_type'));
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
        if (Auth::user()->hasPermission('create-air_im_job')) {
            $request->validate(
                [
                    'job_no'    => 'required|max:20|unique:job_masters,job_no',
                    'awb_no'  => 'required|unique:job_masters,awb_no',
                    'mawb_no'  => 'required',
                    'customer_code'  => 'required',
                    'job_type'  => 'required',
                    'shipment_type'  => 'required',
                    'clearance'  => 'required',
                    'air_dept_code'  => 'required',
                    'air_dest_code'  => 'required',
                    'arrival_date_time'  => 'required',
                ]
            );

            DB::beginTransaction();

            try {
                $aj = new AirImJob();
                $job_no = CodeNumbering::custom_code('39', $aj, 'job_no');

                $jm = new JobMaster();
                $jm->job_no = $job_no;
                $jm->job_date = date('Y-m-d');
                $jm->job_type = !empty($request->job_type) ? $request->job_type : null;
                $jm->cargo_type = !empty($request->cargo_type) ? $request->cargo_type : null;
                $jm->master_job_no = $job_no;
                $jm->awb_no = !empty($request->awb_no) ? $request->awb_no : null;
                $jm->hawb_no = !empty($request->hawb_no) ? $request->hawb_no : null;
                $jm->mawb_no = !empty($request->mawb_no) ? $request->mawb_no : null;
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

                $aj->job_master_id = $jm->id;
                $aj->job_no = $job_no;
                $aj->smawb_no = !empty($request->smawb_no) ? $request->smawb_no : null;
                $aj->origin_awb_no = !empty($request->origin_awb_no) ? $request->origin_awb_no : null;
                $aj->clearance = !empty($request->clearance) ? $request->clearance : null;
                $aj->transhipment = $request->transhipment == "yes" ? true : false;
                $aj->nomination_flag = $request->nomination_flag == "yes" ? true : false;
                $aj->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $aj->customer_contact = !empty($request->customer_contact) ? $request->customer_contact : null;
                $aj->consignee_postal_code = !empty($request->consignee_postal_code) ? $request->consignee_postal_code : null;
                $aj->consignee_contact = !empty($request->consignee_contact) ? $request->consignee_contact : null;
                $aj->consignee_telp = !empty($request->consignee_telp) ? $request->consignee_telp : null;
                $aj->appt_agent_code = !empty($request->appt_agent_code) ? $request->appt_agent_code : null;
                $aj->appt_agent_name = !empty($request->appt_agent_name) ? $request->appt_agent_name : null;
                $aj->appt_contact = !empty($request->appt_contact) ? $request->appt_contact : null;
                $aj->appt_telp = !empty($request->appt_telp) ? $request->appt_telp : null;
                $aj->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $aj->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $aj->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $aj->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $aj->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $aj->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $aj->warehouse_agent_code = !empty($request->warehouse_agent_code) ? $request->warehouse_agent_code : null;
                $aj->warehouse_agent_name = !empty($request->warehouse_agent_name) ? $request->warehouse_agent_name : null;
                $aj->remark_1 = !empty($request->remark_1) ? $request->remark_1 : null;
                $aj->remark_2 = !empty($request->remark_2) ? $request->remark_2 : null;
                $aj->remark_3 = !empty($request->remark_3) ? $request->remark_3 : null;
                $aj->remark_4 = !empty($request->remark_4) ? $request->remark_4 : null;
                $aj->billing_instruction = !empty($request->billing_instruction) ? $request->billing_instruction : null;
                $aj->job_costing_remark = !empty($request->job_costing_remark) ? $request->job_costing_remark : null;
                $aj->total_sales = !empty($request->total_sales) ? str_replace(",", "", $request->total_sales) : null;
                $aj->total_cost = !empty($request->total_cost) ? str_replace(",", "", $request->total_cost) : null;
                $aj->profit_loss = !empty($request->profit_loss) ? str_replace(",", "", $request->profit_loss) : null;
                $aj->margin = !empty($request->margin) ? $request->margin : null;
                $aj->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $aj->save();

                $ad1 = new AirImJobD1();
                $ad1->air_im_job_id = $aj->id;
                $ad1->air_dept_code = !empty($request->air_dept_code) ? $request->air_dept_code : null;
                $ad1->air_dept_name = !empty($request->air_dept_name) ? $request->air_dept_name : null;
                $ad1->air_dest_code = !empty($request->air_dest_code) ? $request->air_dest_code : null;
                $ad1->air_dest_name = !empty($request->air_dest_name) ? $request->air_dest_name : null;
                $ad1->flight_no = !empty($request->flight_no) ? $request->flight_no : null;
                $ad1->flight_date_1 = !empty($request->flight_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_1))) : null;
                $ad1->route_1 = !empty($request->route_1) ? $request->route_1 : null;
                $ad1->flight_no_1 = !empty($request->flight_no_1) ? $request->flight_no_1 : null;
                $ad1->etd_1 = !empty($request->etd_1) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->etd_1))) : null;
                $ad1->eta_1 = !empty($request->eta_1) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->eta_1))) : null;
                $ad1->route_2 = !empty($request->route_2) ? $request->route_2 : null;
                $ad1->flight_no_2 = !empty($request->flight_no_2) ? $request->flight_no_2 : null;
                $ad1->etd_2 = !empty($request->etd_2) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->etd_2))) : null;
                $ad1->eta_2 = !empty($request->eta_2) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->eta_2))) : null;
                $ad1->route_3 = !empty($request->route_3) ? $request->route_3 : null;
                $ad1->flight_no_3 = !empty($request->flight_no_3) ? $request->flight_no_3 : null;
                $ad1->etd_3 = !empty($request->etd_3) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->etd_3))) : null;
                $ad1->eta_3 = !empty($request->eta_3) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->eta_3))) : null;
                $ad1->arrival_date_time = !empty($request->arrival_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->arrival_date_time))) : null;
                $ad1->declare_val_carriage = !empty($request->declare_val_carriage) ? str_replace(",", "", $request->declare_val_carriage) : null;
                $ad1->declare_val_custom = !empty($request->declare_val_custom) ? str_replace(",", "", $request->declare_val_custom) : null;
                $ad1->curr_code = !empty($request->curr_code) ? $request->curr_code : null;
                $ad1->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $ad1->commodity_name = !empty($request->commodity_name) ? $request->commodity_name : null;
                $ad1->weight_val_flag = !empty($request->weight_val_flag) ? $request->weight_val_flag : null;
                $ad1->bill_party_code_1 = !empty($request->bill_party_code_1) ? $request->bill_party_code_1 : null;
                $ad1->bill_party_name_1 = !empty($request->bill_party_name_1) ? $request->bill_party_name_1 : null;
                $ad1->other_val_flag = !empty($request->other_val_flag) ? $request->other_val_flag : null;
                $ad1->bill_party_code_2 = !empty($request->bill_party_code_2) ? $request->bill_party_code_2 : null;
                $ad1->bill_party_name_2 = !empty($request->bill_party_name_2) ? $request->bill_party_name_2 : null;
                $ad1->pcs = !empty($request->pcs) ? str_replace(",", "", $request->pcs) : null;
                $ad1->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $ad1->gross_weight = !empty($request->gross_weight) ? str_replace(",", "", $request->gross_weight) : null;
                $ad1->volume_weight = !empty($request->volume_weight) ? str_replace(",", "", $request->volume_weight) : null;
                $ad1->kg_lb = !empty($request->kg_lb) ? $request->kg_lb : null;
                $ad1->rate_class = !empty($request->rate_class) ? $request->rate_class : null;
                $ad1->charge_weight = !empty($request->charge_weight) ? str_replace(",", "", $request->charge_weight) : null;
                $ad1->iata_rate = !empty($request->iata_rate) ? str_replace(",", "", $request->iata_rate) : null;
                $ad1->iata_total_amt = !empty($request->iata_total_amt) ? str_replace(",", "", $request->iata_total_amt) : null;
                $ad1->weight_charge_pp = !empty($request->weight_charge_pp) ? str_replace(",", "", $request->weight_charge_pp) : null;
                $ad1->value_charge_pp = !empty($request->value_charge_pp) ? str_replace(",", "", $request->value_charge_pp) : null;
                $ad1->tax_pp = !empty($request->tax_pp) ? str_replace(",", "", $request->tax_pp) : null;
                $ad1->agent_pp = !empty($request->agent_pp) ? str_replace(",", "", $request->agent_pp) : null;
                $ad1->carrier_pp = !empty($request->carrier_pp) ? str_replace(",", "", $request->carrier_pp) : null;
                $ad1->total_pp = !empty($request->total_pp) ? str_replace(",", "", $request->total_pp) : null;
                $ad1->weight_charge_cc = !empty($request->weight_charge_cc) ? str_replace(",", "", $request->weight_charge_cc) : null;
                $ad1->value_charge_cc = !empty($request->value_charge_cc) ? str_replace(",", "", $request->value_charge_cc) : null;
                $ad1->tax_cc = !empty($request->tax_cc) ? str_replace(",", "", $request->tax_cc) : null;
                $ad1->agent_cc = !empty($request->agent_cc) ? str_replace(",", "", $request->agent_cc) : null;
                $ad1->carrier_cc = !empty($request->carrier_cc) ? str_replace(",", "", $request->carrier_cc) : null;
                $ad1->total_cc = !empty($request->total_cc) ? str_replace(",", "", $request->total_cc) : null;
                $ad1->permit_no = !empty($request->permit_no) ? $request->permit_no : null;
                $ad1->permit = !empty($request->permit) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->permit))) : null;
                $ad1->collect_curr = !empty($request->collect_curr) ? $request->collect_curr : null;
                $ad1->curr_rate = !empty($request->curr_rate) ? str_replace(",", "", $request->curr_rate) : null;
                $ad1->curr_markup_rate = !empty($request->curr_markup_rate) ? str_replace(",", "", $request->curr_markup_rate) : null;
                $ad1->final_rate = !empty($request->final_rate) ? str_replace(",", "", $request->final_rate) : null;
                $ad1->final_amt = !empty($request->final_amt) ? str_replace(",", "", $request->final_amt) : null;
                $ad1->local_amt = !empty($request->local_amt) ? str_replace(",", "", $request->local_amt) : null;
                $ad1->cc_fee_percent = !empty($request->cc_fee_percent) ? str_replace(",", "", $request->cc_fee_percent) : null;
                $ad1->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $ad1->save();

                $ad2 = new AirImJobD2();
                $ad2->air_im_job_id = $aj->id;
                $ad2->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $ad2->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $ad2->trans_company_code = !empty($request->trans_company_code) ? $request->trans_company_code : null;
                $ad2->trans_company_name = !empty($request->trans_company_name) ? $request->trans_company_name : null;
                $ad2->trans_company_address_1 = !empty($request->trans_company_address_1) ? $request->trans_company_address_1 : null;
                $ad2->trans_company_address_2 = !empty($request->trans_company_address_2) ? $request->trans_company_address_2 : null;
                $ad2->trans_company_address_3 = !empty($request->trans_company_address_3) ? $request->trans_company_address_3 : null;
                $ad2->trans_company_address_4 = !empty($request->trans_company_address_4) ? $request->trans_company_address_4 : null;
                $ad2->pickup = !empty($request->pickup) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->pickup))) : null;
                $ad2->collect_code = !empty($request->collect_code) ? $request->collect_code : null;
                $ad2->collect_name = !empty($request->collect_name) ? $request->collect_name : null;
                $ad2->collect_address_1 = !empty($request->collect_address_1) ? $request->collect_address_1 : null;
                $ad2->collect_address_2 = !empty($request->collect_address_2) ? $request->collect_address_2 : null;
                $ad2->collect_address_3 = !empty($request->collect_address_3) ? $request->collect_address_3 : null;
                $ad2->collect_address_4 = !empty($request->collect_address_4) ? $request->collect_address_4 : null;
                $ad2->delivery = !empty($request->delivery) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->delivery))) : null;
                $ad2->delivery_to_code = !empty($request->delivery_to_code) ? $request->delivery_to_code : null;
                $ad2->delivery_to_name = !empty($request->delivery_to_name) ? $request->delivery_to_name : null;
                $ad2->delivery_to_address_1 = !empty($request->delivery_to_address_1) ? $request->delivery_to_address_1 : null;
                $ad2->delivery_to_address_2 = !empty($request->delivery_to_address_2) ? $request->delivery_to_address_2 : null;
                $ad2->delivery_to_address_3 = !empty($request->delivery_to_address_3) ? $request->delivery_to_address_3 : null;
                $ad2->delivery_to_address_4 = !empty($request->delivery_to_address_4) ? $request->delivery_to_address_4 : null;
                $ad2->delivery_ins_1 = !empty($request->delivery_ins_1) ? $request->delivery_ins_1 : null;
                $ad2->delivery_ins_2 = !empty($request->delivery_ins_2) ? $request->delivery_ins_2 : null;
                $ad2->delivery_ins_3 = !empty($request->delivery_ins_3) ? $request->delivery_ins_3 : null;
                $ad2->delivery_ins_4 = !empty($request->delivery_ins_4) ? $request->delivery_ins_4 : null;
                $ad2->delivery_ins_5 = !empty($request->delivery_ins_5) ? $request->delivery_ins_5 : null;
                $ad2->delivery_ins_6 = !empty($request->delivery_ins_6) ? $request->delivery_ins_6 : null;
                $ad2->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $ad2->save();

                $result_d3 = [];
                if ($request->code[1] != null) {
                    foreach ($request->id_key as $key6) {
                        $result_d3[] = [
                            'air_im_job_id' => $aj->id,
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
                    AirImJobD3::insert($result_d3);
                }

                DB::commit();
                return to_route('air_im_job.index')->with('success', 'New Air Import Job has been added!');
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
        if (Auth::user()->hasPermission('edit-air_im_job')) {
            $job_type = JobType::where('description', 'like', '%IMPORT%')->get();

            $aj = AirImJob::with(['jm', 'ad1', 'ad2', 'ad3'])->where('id', $id)->first();
            return view('trx.air_im_job.edit', compact('job_type', 'aj'));
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
        if (Auth::user()->hasPermission('edit-air_im_job')) {
            $aj = AirImJob::find($id);

            $jm = JobMaster::where('id', $aj->job_master_id)->first();

            $request->validate(
                [
                    'awb_no'  => 'required|unique:job_masters,awb_no,' . $jm->id,
                    'mawb_no'  => 'required',
                    'customer_code'  => 'required',
                    'job_type'  => 'required',
                    'shipment_type'  => 'required',
                    'clearance'  => 'required',
                    'air_dept_code'  => 'required',
                    'air_dest_code'  => 'required',
                    'arrival_date_time'  => 'required',
                ]
            );

            DB::beginTransaction();
            try {
                $jm->job_type = !empty($request->job_type) ? $request->job_type : null;
                $jm->cargo_type = !empty($request->cargo_type) ? $request->cargo_type : null;
                $jm->awb_no = !empty($request->awb_no) ? $request->awb_no : null;
                $jm->hawb_no = !empty($request->hawb_no) ? $request->hawb_no : null;
                $jm->mawb_no = !empty($request->mawb_no) ? $request->mawb_no : null;
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

                $aj->job_master_id = $jm->id;
                $aj->smawb_no = !empty($request->smawb_no) ? $request->smawb_no : null;
                $aj->origin_awb_no = !empty($request->origin_awb_no) ? $request->origin_awb_no : null;
                $aj->clearance = !empty($request->clearance) ? $request->clearance : null;
                $aj->transhipment = $request->transhipment == "yes" ? true : false;
                $aj->nomination_flag = $request->nomination_flag == "yes" ? true : false;
                $aj->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $aj->customer_contact = !empty($request->customer_contact) ? $request->customer_contact : null;
                $aj->consignee_postal_code = !empty($request->consignee_postal_code) ? $request->consignee_postal_code : null;
                $aj->consignee_contact = !empty($request->consignee_contact) ? $request->consignee_contact : null;
                $aj->consignee_telp = !empty($request->consignee_telp) ? $request->consignee_telp : null;
                $aj->appt_agent_code = !empty($request->appt_agent_code) ? $request->appt_agent_code : null;
                $aj->appt_agent_name = !empty($request->appt_agent_name) ? $request->appt_agent_name : null;
                $aj->appt_contact = !empty($request->appt_contact) ? $request->appt_contact : null;
                $aj->appt_telp = !empty($request->appt_telp) ? $request->appt_telp : null;
                $aj->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $aj->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $aj->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $aj->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $aj->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $aj->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $aj->warehouse_agent_code = !empty($request->warehouse_agent_code) ? $request->warehouse_agent_code : null;
                $aj->warehouse_agent_name = !empty($request->warehouse_agent_name) ? $request->warehouse_agent_name : null;
                $aj->remark_1 = !empty($request->remark_1) ? $request->remark_1 : null;
                $aj->remark_2 = !empty($request->remark_2) ? $request->remark_2 : null;
                $aj->remark_3 = !empty($request->remark_3) ? $request->remark_3 : null;
                $aj->remark_4 = !empty($request->remark_4) ? $request->remark_4 : null;
                $aj->billing_instruction = !empty($request->billing_instruction) ? $request->billing_instruction : null;
                $aj->job_costing_remark = !empty($request->job_costing_remark) ? $request->job_costing_remark : null;
                $aj->total_sales = !empty($request->total_sales) ? str_replace(",", "", $request->total_sales) : null;
                $aj->total_cost = !empty($request->total_cost) ? str_replace(",", "", $request->total_cost) : null;
                $aj->profit_loss = !empty($request->profit_loss) ? str_replace(",", "", $request->profit_loss) : null;
                $aj->margin = !empty($request->margin) ? $request->margin : null;
                $aj->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $aj->update();

                $ad1 = AirImJobD1::where('air_im_job_id', $id)->first();
                $ad1->air_dept_code = !empty($request->air_dept_code) ? $request->air_dept_code : null;
                $ad1->air_dept_name = !empty($request->air_dept_name) ? $request->air_dept_name : null;
                $ad1->air_dest_code = !empty($request->air_dest_code) ? $request->air_dest_code : null;
                $ad1->air_dest_name = !empty($request->air_dest_name) ? $request->air_dest_name : null;
                $ad1->flight_no = !empty($request->flight_no) ? $request->flight_no : null;
                $ad1->flight_date_1 = !empty($request->flight_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_1))) : null;
                $ad1->route_1 = !empty($request->route_1) ? $request->route_1 : null;
                $ad1->flight_no_1 = !empty($request->flight_no_1) ? $request->flight_no_1 : null;
                $ad1->etd_1 = !empty($request->etd_1) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->etd_1))) : null;
                $ad1->eta_1 = !empty($request->eta_1) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->eta_1))) : null;
                $ad1->route_2 = !empty($request->route_2) ? $request->route_2 : null;
                $ad1->flight_no_2 = !empty($request->flight_no_2) ? $request->flight_no_2 : null;
                $ad1->etd_2 = !empty($request->etd_2) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->etd_2))) : null;
                $ad1->eta_2 = !empty($request->eta_2) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->eta_2))) : null;
                $ad1->route_3 = !empty($request->route_3) ? $request->route_3 : null;
                $ad1->flight_no_3 = !empty($request->flight_no_3) ? $request->flight_no_3 : null;
                $ad1->etd_3 = !empty($request->etd_3) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->etd_3))) : null;
                $ad1->eta_3 = !empty($request->eta_3) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->eta_3))) : null;
                $ad1->arrival_date_time = !empty($request->arrival_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->arrival_date_time))) : null;
                $ad1->declare_val_carriage = !empty($request->declare_val_carriage) ? str_replace(",", "", $request->declare_val_carriage) : null;
                $ad1->declare_val_custom = !empty($request->declare_val_custom) ? str_replace(",", "", $request->declare_val_custom) : null;
                $ad1->curr_code = !empty($request->curr_code) ? $request->curr_code : null;
                $ad1->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $ad1->commodity_name = !empty($request->commodity_name) ? $request->commodity_name : null;
                $ad1->weight_val_flag = !empty($request->weight_val_flag) ? $request->weight_val_flag : null;
                $ad1->bill_party_code_1 = !empty($request->bill_party_code_1) ? $request->bill_party_code_1 : null;
                $ad1->bill_party_name_1 = !empty($request->bill_party_name_1) ? $request->bill_party_name_1 : null;
                $ad1->other_val_flag = !empty($request->other_val_flag) ? $request->other_val_flag : null;
                $ad1->bill_party_code_2 = !empty($request->bill_party_code_2) ? $request->bill_party_code_2 : null;
                $ad1->bill_party_name_2 = !empty($request->bill_party_name_2) ? $request->bill_party_name_2 : null;
                $ad1->pcs = !empty($request->pcs) ? str_replace(",", "", $request->pcs) : null;
                $ad1->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $ad1->gross_weight = !empty($request->gross_weight) ? str_replace(",", "", $request->gross_weight) : null;
                $ad1->volume_weight = !empty($request->volume_weight) ? str_replace(",", "", $request->volume_weight) : null;
                $ad1->kg_lb = !empty($request->kg_lb) ? $request->kg_lb : null;
                $ad1->rate_class = !empty($request->rate_class) ? $request->rate_class : null;
                $ad1->charge_weight = !empty($request->charge_weight) ? str_replace(",", "", $request->charge_weight) : null;
                $ad1->iata_rate = !empty($request->iata_rate) ? str_replace(",", "", $request->iata_rate) : null;
                $ad1->iata_total_amt = !empty($request->iata_total_amt) ? str_replace(",", "", $request->iata_total_amt) : null;
                $ad1->weight_charge_pp = !empty($request->weight_charge_pp) ? str_replace(",", "", $request->weight_charge_pp) : null;
                $ad1->value_charge_pp = !empty($request->value_charge_pp) ? str_replace(",", "", $request->value_charge_pp) : null;
                $ad1->tax_pp = !empty($request->tax_pp) ? str_replace(",", "", $request->tax_pp) : null;
                $ad1->agent_pp = !empty($request->agent_pp) ? str_replace(",", "", $request->agent_pp) : null;
                $ad1->carrier_pp = !empty($request->carrier_pp) ? str_replace(",", "", $request->carrier_pp) : null;
                $ad1->total_pp = !empty($request->total_pp) ? str_replace(",", "", $request->total_pp) : null;
                $ad1->weight_charge_cc = !empty($request->weight_charge_cc) ? str_replace(",", "", $request->weight_charge_cc) : null;
                $ad1->value_charge_cc = !empty($request->value_charge_cc) ? str_replace(",", "", $request->value_charge_cc) : null;
                $ad1->tax_cc = !empty($request->tax_cc) ? str_replace(",", "", $request->tax_cc) : null;
                $ad1->agent_cc = !empty($request->agent_cc) ? str_replace(",", "", $request->agent_cc) : null;
                $ad1->carrier_cc = !empty($request->carrier_cc) ? str_replace(",", "", $request->carrier_cc) : null;
                $ad1->total_cc = !empty($request->total_cc) ? str_replace(",", "", $request->total_cc) : null;
                $ad1->permit_no = !empty($request->permit_no) ? $request->permit_no : null;
                $ad1->permit = !empty($request->permit) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->permit))) : null;
                $ad1->collect_curr = !empty($request->collect_curr) ? $request->collect_curr : null;
                $ad1->curr_rate = !empty($request->curr_rate) ? str_replace(",", "", $request->curr_rate) : null;
                $ad1->curr_markup_rate = !empty($request->curr_markup_rate) ? str_replace(",", "", $request->curr_markup_rate) : null;
                $ad1->final_rate = !empty($request->final_rate) ? str_replace(",", "", $request->final_rate) : null;
                $ad1->final_amt = !empty($request->final_amt) ? str_replace(",", "", $request->final_amt) : null;
                $ad1->local_amt = !empty($request->local_amt) ? str_replace(",", "", $request->local_amt) : null;
                $ad1->cc_fee_percent = !empty($request->cc_fee_percent) ? str_replace(",", "", $request->cc_fee_percent) : null;
                $ad1->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $ad1->update();

                $ad2 = AirImJobD2::where('air_im_job_id', $id)->first();
                $ad2->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $ad2->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $ad2->trans_company_code = !empty($request->trans_company_code) ? $request->trans_company_code : null;
                $ad2->trans_company_name = !empty($request->trans_company_name) ? $request->trans_company_name : null;
                $ad2->trans_company_address_1 = !empty($request->trans_company_address_1) ? $request->trans_company_address_1 : null;
                $ad2->trans_company_address_2 = !empty($request->trans_company_address_2) ? $request->trans_company_address_2 : null;
                $ad2->trans_company_address_3 = !empty($request->trans_company_address_3) ? $request->trans_company_address_3 : null;
                $ad2->trans_company_address_4 = !empty($request->trans_company_address_4) ? $request->trans_company_address_4 : null;
                $ad2->pickup = !empty($request->pickup) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->pickup))) : null;
                $ad2->collect_code = !empty($request->collect_code) ? $request->collect_code : null;
                $ad2->collect_name = !empty($request->collect_name) ? $request->collect_name : null;
                $ad2->collect_address_1 = !empty($request->collect_address_1) ? $request->collect_address_1 : null;
                $ad2->collect_address_2 = !empty($request->collect_address_2) ? $request->collect_address_2 : null;
                $ad2->collect_address_3 = !empty($request->collect_address_3) ? $request->collect_address_3 : null;
                $ad2->collect_address_4 = !empty($request->collect_address_4) ? $request->collect_address_4 : null;
                $ad2->delivery = !empty($request->delivery) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->delivery))) : null;
                $ad2->delivery_to_code = !empty($request->delivery_to_code) ? $request->delivery_to_code : null;
                $ad2->delivery_to_name = !empty($request->delivery_to_name) ? $request->delivery_to_name : null;
                $ad2->delivery_to_address_1 = !empty($request->delivery_to_address_1) ? $request->delivery_to_address_1 : null;
                $ad2->delivery_to_address_2 = !empty($request->delivery_to_address_2) ? $request->delivery_to_address_2 : null;
                $ad2->delivery_to_address_3 = !empty($request->delivery_to_address_3) ? $request->delivery_to_address_3 : null;
                $ad2->delivery_to_address_4 = !empty($request->delivery_to_address_4) ? $request->delivery_to_address_4 : null;
                $ad2->delivery_ins_1 = !empty($request->delivery_ins_1) ? $request->delivery_ins_1 : null;
                $ad2->delivery_ins_2 = !empty($request->delivery_ins_2) ? $request->delivery_ins_2 : null;
                $ad2->delivery_ins_3 = !empty($request->delivery_ins_3) ? $request->delivery_ins_3 : null;
                $ad2->delivery_ins_4 = !empty($request->delivery_ins_4) ? $request->delivery_ins_4 : null;
                $ad2->delivery_ins_5 = !empty($request->delivery_ins_5) ? $request->delivery_ins_5 : null;
                $ad2->delivery_ins_6 = !empty($request->delivery_ins_6) ? $request->delivery_ins_6 : null;
                $ad2->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $ad2->update();

                $result_d3 = [];
                $aj->air_im_job_d3()->forceDelete();
                if ($request->code[1] != null) {
                    foreach ($request->id_key as $key6) {
                        $result_d3[] = [
                            'air_im_job_id' => $aj->id,
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
                    AirImJobD3::insert($result_d3);
                }

                DB::commit();
                return to_route('air_im_job.index')->with('success', 'New Air Import Job has been updated!');
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
    public function destroy(AirImJob $air_im_job)
    {
        if (Auth::user()->hasPermission('delete-air_im_job')) {
            DB::beginTransaction();
            try {
                $air_im_job->delete();

                DB::commit();
                return to_route('air_im_job.index')->with('success', 'Air Import Job has been deleted!');
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
        $aj = AirImJob::with(['jm.bisnis_party', 'ad1', 'ad2', 'ad3'])->where('id', $id)->orderBy('id', 'DESC')->first();
        $sales = array_filter($aj->toArray()['ad3'], function ($value) {
            return ($value['cust_code_sales'] != null);
        });

        $vendor = array_filter($aj->toArray()['ad3'], function ($value) {
            return ($value['code_vendor'] != null);
        });

        $company = Company::first();
        $company_detail = CompanyDetailSatu::where('company_id', $company->id)->where('type', 'Head Office')->first();
        $pdf = app('dompdf.wrapper');

        if ($jns_pdf == 'js') {
            $pdf->loadView('trx.air_im_job.export_pdf_js', [
                'aj'    => $aj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        } elseif ($jns_pdf == 'jo') {
            $pdf->loadView('trx.air_im_job.export_pdf_jo', [
                'aj'    => $aj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        }

        return $pdf->stream('laporan.pdf');
    }
}
