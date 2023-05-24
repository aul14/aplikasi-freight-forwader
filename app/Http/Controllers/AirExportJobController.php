<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\Company;
use App\Models\History;
use App\Models\JobType;
use App\Models\AirExJob;
use App\Models\JobMaster;
use App\Models\AirBooking;
use App\Models\AirExJobD1;
use App\Models\AirExJobD2;
use App\Models\AirExJobD3;
use App\Models\AirExJobD4;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CompanyDetailSatu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class AirExportJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-air_ex_job')) {
            if ($request->ajax()) {
                if (!empty(auth()->user()->salesman_code)) {
                    $air_ex_job = AirExJob::with(['jm', 'ad1', 'ad3'])->whereHas('jm', function ($query) {
                        $query->where('salesman_code', explode(",", auth()->user()->salesman_code));
                    })->orderBy('air_ex_jobs.id', 'DESC')->select('*');
                } else {
                    $air_ex_job = AirExJob::with(['jm', 'ad1', 'ad3'])->orderBy('air_ex_jobs.id', 'DESC')->select('*');
                }
                return DataTables::of($air_ex_job)
                    ->addColumn('action', function ($air_ex_job) {
                        return view('datatable-modal._action_pdf_ae', [
                            'row_id' => $air_ex_job->id,
                            'edit_url' => route('air_ex_job.edit', $air_ex_job->id),
                            'delete_url' => route('air_ex_job.destroy', $air_ex_job->id),
                            'job_no'    => $air_ex_job->jm->job_no,
                            'can_edit' => 'edit-air_ex_job',
                            'can_delete' => 'delete-air_ex_job'
                        ]);
                    })
                    ->editColumn('updated_at', function ($air_ex_job) {
                        return !empty($air_ex_job->updated_at) ? date("d-m-Y H:i", strtotime($air_ex_job->updated_at)) : "-";
                    })
                    ->editColumn('gross_weight', function ($air_ex_job) {
                        return !empty($air_ex_job->ad3->gross_weight) ? number_format($air_ex_job->ad3->gross_weight, 4, '.', ',') : "-";
                    })
                    ->editColumn('total_vol_wt', function ($air_ex_job) {
                        return !empty($air_ex_job->total_vol_wt) ? number_format($air_ex_job->total_vol_wt, 4, '.', ',') : "-";
                    })
                    ->rawColumns(['updated_at', 'action', 'gross_weight', 'total_vol_wt'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Air Export Job')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Air Export Job')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Air Export Job',
                    'url_menu'  => route('air_ex_job.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Air Export Job',
                    'url_menu'  => route('air_ex_job.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('trx.air_ex_job.index');
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
        if (Auth::user()->hasPermission('create-air_ex_job')) {
            $job_type = JobType::where('description', 'like', '%EXPORT%')->get();

            return view('trx.air_ex_job.create', compact('job_type'));
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
        if (Auth::user()->hasPermission('create-air_ex_job')) {
            $request->validate(
                [
                    'job_no'    => 'required|max:20|unique:job_masters,job_no',
                    'awb_no'  => 'required|unique:job_masters,awb_no',
                    'customer_code'  => 'required',
                    'air_dept_code'  => 'required',
                    'air_dest_code'  => 'required',
                    'to_dest_code_1'  => 'required',
                    'by_airline_id_1'  => 'required',
                    'flight_no_1'  => 'required',
                    'flight_date_1'  => 'required',
                    'weight_val_flag'  => 'required',
                    'other_flag'  => 'required',
                ]
            );

            DB::beginTransaction();
            try {
                $aj = new AirExJob();
                $job_no = CodeNumbering::custom_code('38', $aj, 'job_no');

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
                $aj->booking_no = !empty($request->booking_no) ? $request->booking_no : null;
                $aj->nomination_flag = $request->nomination_flag == "yes" ? true : false;
                $aj->bank = $request->bank == "yes" ? true : false;
                $aj->awb_prefix = !empty($request->awb_prefix) ? $request->awb_prefix : null;
                $aj->shipper_acc_no = !empty($request->shipper_acc_no) ? $request->shipper_acc_no : null;
                $aj->consignee_acc_no = !empty($request->consignee_acc_no) ? $request->consignee_acc_no : null;
                $aj->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $aj->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $aj->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $aj->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $aj->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $aj->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $aj->agent_code = !empty($request->agent_code) ? $request->agent_code : null;
                $aj->agent_name = !empty($request->agent_name) ? $request->agent_name : null;
                $aj->agent_iata_code = !empty($request->agent_iata_code) ? $request->agent_iata_code : null;
                $aj->agent_acc_no = !empty($request->agent_acc_no) ? $request->agent_acc_no : null;
                $aj->note = !empty($request->note) ? $request->note : null;
                $aj->vol_wt_ratio = !empty($request->vol_wt_ratio) ? str_replace(",", "", $request->vol_wt_ratio) : null;
                $aj->round_up = $request->round_up == "yes" ? true : false;
                $aj->kg_lb_flag = !empty($request->kg_lb_flag) ? $request->kg_lb_flag : null;
                $aj->no_high_pallet = !empty($request->no_high_pallet) ? str_replace(",", "", $request->no_high_pallet) : null;
                $aj->no_low_pallet = !empty($request->no_low_pallet) ? str_replace(",", "", $request->no_low_pallet) : null;
                $aj->no_container = !empty($request->no_container) ? str_replace(",", "", $request->no_container) : null;
                $aj->satuan_dimension = !empty($request->satuan_dimension) ? $request->satuan_dimension : null;
                $aj->total_m3 = !empty($request->total_m3) ? str_replace(",", "", $request->total_m3) : null;
                $aj->total_pcs = !empty($request->total_pcs) ? str_replace(",", "", $request->total_pcs) : null;
                $aj->total_dimension = !empty($request->total_dimension) ? str_replace(",", "", $request->total_dimension) : null;
                $aj->total_vol_wt = !empty($request->total_vol_wt) ? str_replace(",", "", $request->total_vol_wt) : null;
                $aj->billing_instruction = !empty($request->billing_instruction) ? $request->billing_instruction : null;
                $aj->job_costing_remark = !empty($request->job_costing_remark) ? $request->job_costing_remark : null;
                $aj->total_sales = !empty($request->total_sales) ? str_replace(",", "", $request->total_sales) : null;
                $aj->total_cost = !empty($request->total_cost) ? str_replace(",", "", $request->total_cost) : null;
                $aj->profit_loss = !empty($request->profit_loss) ? str_replace(",", "", $request->profit_loss) : null;
                $aj->margin = !empty($request->margin) ? $request->margin : null;
                $aj->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $aj->save();

                $ad1 = new AirExJobD1();
                $ad1->air_ex_job_id = $aj->id;
                $ad1->air_dept_code = !empty($request->air_dept_code) ? $request->air_dept_code : null;
                $ad1->air_dept_name = !empty($request->air_dept_name) ? $request->air_dept_name : null;
                $ad1->to_dest_code_1 = !empty($request->to_dest_code_1) ? $request->to_dest_code_1 : null;
                $ad1->by_airline_id_1 = !empty($request->by_airline_id_1) ? $request->by_airline_id_1 : null;
                $ad1->flight_no_1 = !empty($request->flight_no_1) ? $request->flight_no_1 : null;
                $ad1->flight_date_1 = !empty($request->flight_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_1))) : null;
                $ad1->eta_date_1 = !empty($request->eta_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_1))) : null;
                $ad1->to_dest_code_2 = !empty($request->to_dest_code_2) ? $request->to_dest_code_2 : null;
                $ad1->by_airline_id_2 = !empty($request->by_airline_id_2) ? $request->by_airline_id_2 : null;
                $ad1->flight_no_2 = !empty($request->flight_no_2) ? $request->flight_no_2 : null;
                $ad1->flight_date_2 = !empty($request->flight_date_2) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_2))) : null;
                $ad1->eta_date_2 = !empty($request->eta_date_2) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_2))) : null;
                $ad1->to_dest_code_3 = !empty($request->to_dest_code_3) ? $request->to_dest_code_3 : null;
                $ad1->by_airline_id_3 = !empty($request->by_airline_id_3) ? $request->by_airline_id_3 : null;
                $ad1->flight_no_3 = !empty($request->flight_no_3) ? $request->flight_no_3 : null;
                $ad1->flight_date_3 = !empty($request->flight_date_3) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_3))) : null;
                $ad1->eta_date_3 = !empty($request->eta_date_3) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_3))) : null;
                $ad1->to_dest_code_4 = !empty($request->to_dest_code_4) ? $request->to_dest_code_4 : null;
                $ad1->by_airline_id_4 = !empty($request->by_airline_id_4) ? $request->by_airline_id_4 : null;
                $ad1->flight_no_4 = !empty($request->flight_no_4) ? $request->flight_no_4 : null;
                $ad1->flight_date_4 = !empty($request->flight_date_4) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_4))) : null;
                $ad1->eta_date_4 = !empty($request->eta_date_4) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_4))) : null;
                $ad1->air_dest_code = !empty($request->air_dest_code) ? $request->air_dest_code : null;
                $ad1->air_dest_name = !empty($request->air_dest_name) ? $request->air_dest_name : null;
                $ad1->arrival_date_time = !empty($request->arrival_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->arrival_date_time))) : null;
                $ad1->curr_code = !empty($request->curr_code) ? $request->curr_code : null;
                $ad1->curr_rate = !empty($request->curr_rate) ? str_replace(",", "", $request->curr_rate) : null;
                $ad1->weight_val_flag = !empty($request->weight_val_flag) ? $request->weight_val_flag : null;
                $ad1->frt_bill_party = !empty($request->frt_bill_party) ? $request->frt_bill_party : null;
                $ad1->other_flag = !empty($request->other_flag) ? $request->other_flag : null;
                $ad1->other_bill_party = !empty($request->other_bill_party) ? $request->other_bill_party : null;
                $ad1->collect_curr_code = !empty($request->collect_curr_code) ? $request->collect_curr_code : null;
                $ad1->collect_curr_rate = !empty($request->collect_curr_rate) ? str_replace(",", "", $request->collect_curr_rate) : null;
                $ad1->declare_val_carriage = !empty($request->declare_val_carriage) ? $request->declare_val_carriage : null;
                $ad1->custom_curr_code = !empty($request->custom_curr_code) ? $request->custom_curr_code : null;
                $ad1->custom_declare_val = !empty($request->custom_declare_val) ? $request->custom_declare_val : null;
                $ad1->custom_local_amt = !empty($request->custom_local_amt) ? str_replace(",", "", $request->custom_local_amt) : null;
                $ad1->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $ad1->insure_curr_code = !empty($request->insure_curr_code) ? $request->insure_curr_code : null;
                $ad1->insure_amt = !empty($request->insure_amt) ? str_replace(",", "", $request->insure_amt) : null;
                $ad1->insure_local_amt = !empty($request->insure_local_amt) ? str_replace(",", "", $request->insure_local_amt) : null;
                $ad1->dg_cargo = $request->dg_cargo == "yes" ? true : false;
                $ad1->handling_info_1 = !empty($request->handling_info_1) ? $request->handling_info_1 : null;
                $ad1->handling_info_2 = !empty($request->handling_info_2) ? $request->handling_info_2 : null;
                $ad1->handling_info_3 = !empty($request->handling_info_3) ? $request->handling_info_3 : null;
                $ad1->account_info_1 = !empty($request->account_info_1) ? $request->account_info_1 : null;
                $ad1->account_info_2 = !empty($request->account_info_2) ? $request->account_info_2 : null;
                $ad1->account_info_3 = !empty($request->account_info_3) ? $request->account_info_3 : null;
                $ad1->account_info_4 = !empty($request->account_info_4) ? $request->account_info_4 : null;
                $ad1->account_info_5 = !empty($request->account_info_5) ? $request->account_info_5 : null;
                $ad1->account_info_6 = !empty($request->account_info_6) ? $request->account_info_6 : null;
                $ad1->account_info_7 = !empty($request->account_info_7) ? $request->account_info_7 : null;
                $ad1->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $ad1->permit_no = !empty($request->permit_no) ? $request->permit_no : null;
                $ad1->print_dimension = $request->print_dimension == "yes" ? true : false;
                $ad1->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $ad1->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $ad1->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $ad1->save();

                $result_d2 = [];
                if ($request->pcs_rcp[0] != null || $request->length[0] != null || $request->width[0] != null || $request->height[0] != null) {
                    foreach ($request->pcs_rcp as $key => $val) {
                        $result_d2[] = [
                            'air_ex_job_id' => $aj->id,
                            'pcs_rcp'   => !empty($request->pcs_rcp[$key]) ? $request->pcs_rcp[$key] : null,
                            'length'      => !empty($request->length[$key]) ? str_replace(",", "", $request->length[$key]) : null,
                            'width'      => !empty($request->width[$key]) ? str_replace(",", "", $request->width[$key]) : null,
                            'height'      => !empty($request->height[$key]) ? str_replace(",", "", $request->height[$key]) : null,
                            'dimension'      => !empty($request->dimension[$key]) ? str_replace(",", "", $request->dimension[$key]) : null,
                            'sum_m3'      => !empty($request->sum_m3[$key]) ? str_replace(",", "", $request->sum_m3[$key]) : null,
                            'sum_volwt'      => !empty($request->sum_volwt[$key]) ? str_replace(",", "", $request->sum_volwt[$key]) : null,
                            'create_by'     => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'update_by'     => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    AirExJobD2::insert($result_d2);
                }

                $ad3 = new AirExJobD3();
                $ad3->air_ex_job_id = $aj->id;
                $ad3->pcs = !empty($request->pcs) ? str_replace(",", "", $request->pcs) : null;
                $ad3->uom = !empty($request->uom) ? $request->uom : null;
                $ad3->gross_weight = !empty($request->gross_weight) ? str_replace(",", "", $request->gross_weight) : null;
                $ad3->rate_class = !empty($request->rate_class) ? $request->rate_class : null;
                $ad3->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $ad3->chargeable_wt = !empty($request->chargeable_wt) ? str_replace(",", "", $request->chargeable_wt) : null;
                $ad3->doc_rate = !empty($request->doc_rate) ? str_replace(",", "", $request->doc_rate) : null;
                $ad3->doc_total_amt = !empty($request->doc_total_amt) ? str_replace(",", "", $request->doc_total_amt) : null;
                $ad3->slac_qty = !empty($request->slac_qty) ? str_replace(",", "", $request->slac_qty) : null;
                $ad3->slac_uom = !empty($request->slac_uom) ? $request->slac_uom : null;
                $ad3->cargo_class = !empty($request->cargo_class) ? $request->cargo_class : null;
                $ad3->salesman_code = !empty($request->salesman_code) ? $request->salesman_code : null;
                $ad3->as_arrange_flag = $request->as_arrange_flag == "yes" ? true : false;
                $ad3->user_charge_wt = !empty($request->user_charge_wt) ? str_replace(",", "", $request->user_charge_wt) : null;
                $ad3->commodity_desc_1 = !empty($request->commodity_desc_1) ? $request->commodity_desc_1 : null;
                $ad3->commodity_desc_2 = !empty($request->commodity_desc_2) ? $request->commodity_desc_2 : null;
                $ad3->commodity_desc_3 = !empty($request->commodity_desc_3) ? $request->commodity_desc_3 : null;
                $ad3->commodity_desc_4 = !empty($request->commodity_desc_4) ? $request->commodity_desc_4 : null;
                $ad3->commodity_desc_5 = !empty($request->commodity_desc_5) ? $request->commodity_desc_5 : null;
                $ad3->commodity_desc_6 = !empty($request->commodity_desc_6) ? $request->commodity_desc_6 : null;
                $ad3->commodity_desc_7 = !empty($request->commodity_desc_7) ? $request->commodity_desc_7 : null;
                $ad3->commodity_desc_8 = !empty($request->commodity_desc_8) ? $request->commodity_desc_8 : null;
                $ad3->commodity_desc_9 = !empty($request->commodity_desc_9) ? $request->commodity_desc_9 : null;
                $ad3->commodity_desc_10 = !empty($request->commodity_desc_10) ? $request->commodity_desc_10 : null;
                $ad3->commodity_desc_11 = !empty($request->commodity_desc_11) ? $request->commodity_desc_11 : null;
                $ad3->commodity_desc_12 = !empty($request->commodity_desc_12) ? $request->commodity_desc_12 : null;
                $ad3->desc_1 = !empty($request->desc_1) ? $request->desc_1 : null;
                $ad3->desc_2 = !empty($request->desc_2) ? $request->desc_2 : null;
                $ad3->desc_3 = !empty($request->desc_3) ? $request->desc_3 : null;
                $ad3->desc_4 = !empty($request->desc_4) ? $request->desc_4 : null;
                $ad3->desc_5 = !empty($request->desc_5) ? $request->desc_5 : null;
                $ad3->desc_6 = !empty($request->desc_6) ? $request->desc_6 : null;
                $ad3->desc_7 = !empty($request->desc_7) ? $request->desc_7 : null;
                $ad3->desc_8 = !empty($request->desc_8) ? $request->desc_8 : null;
                $ad3->desc_9 = !empty($request->desc_9) ? $request->desc_9 : null;
                $ad3->desc_10 = !empty($request->desc_10) ? $request->desc_10 : null;
                $ad3->desc_11 = !empty($request->desc_11) ? $request->desc_11 : null;
                $ad3->desc_12 = !empty($request->desc_12) ? $request->desc_12 : null;
                $ad3->create_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $ad3->save();

                $result_d4 = [];
                if ($request->code[1] != null) {
                    foreach ($request->id_key as $key6) {
                        $result_d4[] = [
                            'air_ex_job_id' => $aj->id,
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
                    AirExJobD4::insert($result_d4);
                }

                // UPDATE NO JOB NO. DI MENU BOOKING
                if (!empty($request->booking_no)) {
                    $book = AirBooking::where('code', $request->booking_no)->first();
                    $book->job_no = $job_no;
                    $book->update();
                }

                DB::commit();
                return to_route('air_ex_job.index')->with('success', 'New Air Export Job has been added!');
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
        if (Auth::user()->hasPermission('edit-air_ex_job')) {
            $job_type = JobType::where('description', 'like', '%EXPORT%')->get();

            $aj = AirExJob::with(['jm', 'ad1', 'ad2', 'ad3', 'ad4'])->where('id', $id)->first();
            return view('trx.air_ex_job.edit', compact('job_type', 'aj'));
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
        if (Auth::user()->hasPermission('edit-air_ex_job')) {
            $aj = AirExJob::find($id);

            $jm = JobMaster::where('id', $aj->job_master_id)->first();

            $request->validate(
                [
                    'awb_no'  => 'required|unique:job_masters,awb_no,' . $jm->id,
                    'customer_code'  => 'required',
                    'air_dept_code'  => 'required',
                    'air_dest_code'  => 'required',
                    'to_dest_code_1'  => 'required',
                    'by_airline_id_1'  => 'required',
                    'flight_no_1'  => 'required',
                    'flight_date_1'  => 'required',
                    'weight_val_flag'  => 'required',
                    'other_flag'  => 'required',
                ],
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

                // UPDATE NO JOB NO. DI MENU BOOKING
                if (!empty($request->booking_no)) {
                    if ($aj->booking_no != $request->booking_no) {
                        $book_old = AirBooking::where('code', $aj->booking_no)->first();
                        $book_old->update(['job_no' => null]);

                        $book = AirBooking::where('code', $request->booking_no)->first();
                        $book->update(['job_no' => $jm->job_no]);
                    } else {
                        $book = AirBooking::where('code', $aj->booking_no)->first();
                        $book->update(['job_no' => $jm->job_no]);
                    }
                }

                $aj->smawb_no = !empty($request->smawb_no) ? $request->smawb_no : null;
                $aj->booking_no = !empty($request->booking_no) ? $request->booking_no : null;
                $aj->nomination_flag = $request->nomination_flag == "yes" ? true : false;
                $aj->bank = $request->bank == "yes" ? true : false;
                $aj->awb_prefix = !empty($request->awb_prefix) ? $request->awb_prefix : null;
                $aj->shipper_acc_no = !empty($request->shipper_acc_no) ? $request->shipper_acc_no : null;
                $aj->consignee_acc_no = !empty($request->consignee_acc_no) ? $request->consignee_acc_no : null;
                $aj->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $aj->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $aj->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $aj->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $aj->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $aj->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $aj->agent_code = !empty($request->agent_code) ? $request->agent_code : null;
                $aj->agent_name = !empty($request->agent_name) ? $request->agent_name : null;
                $aj->agent_iata_code = !empty($request->agent_iata_code) ? $request->agent_iata_code : null;
                $aj->agent_acc_no = !empty($request->agent_acc_no) ? $request->agent_acc_no : null;
                $aj->note = !empty($request->note) ? $request->note : null;
                $aj->vol_wt_ratio = !empty($request->vol_wt_ratio) ? str_replace(",", "", $request->vol_wt_ratio) : null;
                $aj->round_up = $request->round_up == "yes" ? true : false;
                $aj->kg_lb_flag = !empty($request->kg_lb_flag) ? $request->kg_lb_flag : null;
                $aj->no_high_pallet = !empty($request->no_high_pallet) ? str_replace(",", "", $request->no_high_pallet) : null;
                $aj->no_low_pallet = !empty($request->no_low_pallet) ? str_replace(",", "", $request->no_low_pallet) : null;
                $aj->no_container = !empty($request->no_container) ? str_replace(",", "", $request->no_container) : null;
                $aj->satuan_dimension = !empty($request->satuan_dimension) ? $request->satuan_dimension : null;
                $aj->total_m3 = !empty($request->total_m3) ? str_replace(",", "", $request->total_m3) : null;
                $aj->total_pcs = !empty($request->total_pcs) ? str_replace(",", "", $request->total_pcs) : null;
                $aj->total_dimension = !empty($request->total_dimension) ? str_replace(",", "", $request->total_dimension) : null;
                $aj->total_vol_wt = !empty($request->total_vol_wt) ? str_replace(",", "", $request->total_vol_wt) : null;
                $aj->billing_instruction = !empty($request->billing_instruction) ? $request->billing_instruction : null;
                $aj->job_costing_remark = !empty($request->job_costing_remark) ? $request->job_costing_remark : null;
                $aj->total_sales = !empty($request->total_sales) ? str_replace(",", "", $request->total_sales) : null;
                $aj->total_cost = !empty($request->total_cost) ? str_replace(",", "", $request->total_cost) : null;
                $aj->profit_loss = !empty($request->profit_loss) ? str_replace(",", "", $request->profit_loss) : null;
                $aj->margin = !empty($request->margin) ? $request->margin : null;
                $aj->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $aj->update();

                $ad1 = AirExJobD1::where('air_ex_job_id', $id)->first();
                $ad1->air_dept_code = !empty($request->air_dept_code) ? $request->air_dept_code : null;
                $ad1->air_dept_name = !empty($request->air_dept_name) ? $request->air_dept_name : null;
                $ad1->to_dest_code_1 = !empty($request->to_dest_code_1) ? $request->to_dest_code_1 : null;
                $ad1->by_airline_id_1 = !empty($request->by_airline_id_1) ? $request->by_airline_id_1 : null;
                $ad1->flight_no_1 = !empty($request->flight_no_1) ? $request->flight_no_1 : null;
                $ad1->flight_date_1 = !empty($request->flight_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_1))) : null;
                $ad1->eta_date_1 = !empty($request->eta_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_1))) : null;
                $ad1->to_dest_code_2 = !empty($request->to_dest_code_2) ? $request->to_dest_code_2 : null;
                $ad1->by_airline_id_2 = !empty($request->by_airline_id_2) ? $request->by_airline_id_2 : null;
                $ad1->flight_no_2 = !empty($request->flight_no_2) ? $request->flight_no_2 : null;
                $ad1->flight_date_2 = !empty($request->flight_date_2) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_2))) : null;
                $ad1->eta_date_2 = !empty($request->eta_date_2) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_2))) : null;
                $ad1->to_dest_code_3 = !empty($request->to_dest_code_3) ? $request->to_dest_code_3 : null;
                $ad1->by_airline_id_3 = !empty($request->by_airline_id_3) ? $request->by_airline_id_3 : null;
                $ad1->flight_no_3 = !empty($request->flight_no_3) ? $request->flight_no_3 : null;
                $ad1->flight_date_3 = !empty($request->flight_date_3) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_3))) : null;
                $ad1->eta_date_3 = !empty($request->eta_date_3) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_3))) : null;
                $ad1->to_dest_code_4 = !empty($request->to_dest_code_4) ? $request->to_dest_code_4 : null;
                $ad1->by_airline_id_4 = !empty($request->by_airline_id_4) ? $request->by_airline_id_4 : null;
                $ad1->flight_no_4 = !empty($request->flight_no_4) ? $request->flight_no_4 : null;
                $ad1->flight_date_4 = !empty($request->flight_date_4) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_4))) : null;
                $ad1->eta_date_4 = !empty($request->eta_date_4) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_4))) : null;
                $ad1->air_dest_code = !empty($request->air_dest_code) ? $request->air_dest_code : null;
                $ad1->air_dest_name = !empty($request->air_dest_name) ? $request->air_dest_name : null;
                $ad1->arrival_date_time = !empty($request->arrival_date_time) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->arrival_date_time))) : null;
                $ad1->curr_code = !empty($request->curr_code) ? $request->curr_code : null;
                $ad1->curr_rate = !empty($request->curr_rate) ? str_replace(",", "", $request->curr_rate) : null;
                $ad1->weight_val_flag = !empty($request->weight_val_flag) ? $request->weight_val_flag : null;
                $ad1->frt_bill_party = !empty($request->frt_bill_party) ? $request->frt_bill_party : null;
                $ad1->other_flag = !empty($request->other_flag) ? $request->other_flag : null;
                $ad1->other_bill_party = !empty($request->other_bill_party) ? $request->other_bill_party : null;
                $ad1->collect_curr_code = !empty($request->collect_curr_code) ? $request->collect_curr_code : null;
                $ad1->collect_curr_rate = !empty($request->collect_curr_rate) ? str_replace(",", "", $request->collect_curr_rate) : null;
                $ad1->declare_val_carriage = !empty($request->declare_val_carriage) ? $request->declare_val_carriage : null;
                $ad1->custom_curr_code = !empty($request->custom_curr_code) ? $request->custom_curr_code : null;
                $ad1->custom_declare_val = !empty($request->custom_declare_val) ? $request->custom_declare_val : null;
                $ad1->custom_local_amt = !empty($request->custom_local_amt) ? str_replace(",", "", $request->custom_local_amt) : null;
                $ad1->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $ad1->insure_curr_code = !empty($request->insure_curr_code) ? $request->insure_curr_code : null;
                $ad1->insure_amt = !empty($request->insure_amt) ? str_replace(",", "", $request->insure_amt) : null;
                $ad1->insure_local_amt = !empty($request->insure_local_amt) ? str_replace(",", "", $request->insure_local_amt) : null;
                $ad1->dg_cargo = $request->dg_cargo == "yes" ? true : false;
                $ad1->handling_info_1 = !empty($request->handling_info_1) ? $request->handling_info_1 : null;
                $ad1->handling_info_2 = !empty($request->handling_info_2) ? $request->handling_info_2 : null;
                $ad1->handling_info_3 = !empty($request->handling_info_3) ? $request->handling_info_3 : null;
                $ad1->account_info_1 = !empty($request->account_info_1) ? $request->account_info_1 : null;
                $ad1->account_info_2 = !empty($request->account_info_2) ? $request->account_info_2 : null;
                $ad1->account_info_3 = !empty($request->account_info_3) ? $request->account_info_3 : null;
                $ad1->account_info_4 = !empty($request->account_info_4) ? $request->account_info_4 : null;
                $ad1->account_info_5 = !empty($request->account_info_5) ? $request->account_info_5 : null;
                $ad1->account_info_6 = !empty($request->account_info_6) ? $request->account_info_6 : null;
                $ad1->account_info_7 = !empty($request->account_info_7) ? $request->account_info_7 : null;
                $ad1->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $ad1->permit_no = !empty($request->permit_no) ? $request->permit_no : null;
                $ad1->print_dimension = $request->print_dimension == "yes" ? true : false;
                $ad1->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $ad1->delivery_type = !empty($request->delivery_type) ? $request->delivery_type : null;
                $ad1->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $ad1->update();

                $result_d2 = [];
                $aj->air_ex_job_d2()->forceDelete();
                if ($request->pcs_rcp[0] != null || $request->length[0] != null || $request->width[0] != null || $request->height[0] != null) {
                    foreach ($request->pcs_rcp as $key => $val) {
                        $result_d2[] = [
                            'air_ex_job_id' => $aj->id,
                            'pcs_rcp'   => !empty($request->pcs_rcp[$key]) ? $request->pcs_rcp[$key] : null,
                            'length'      => !empty($request->length[$key]) ? str_replace(",", "", $request->length[$key]) : null,
                            'width'      => !empty($request->width[$key]) ? str_replace(",", "", $request->width[$key]) : null,
                            'height'      => !empty($request->height[$key]) ? str_replace(",", "", $request->height[$key]) : null,
                            'dimension'      => !empty($request->dimension[$key]) ? str_replace(",", "", $request->dimension[$key]) : null,
                            'sum_m3'      => !empty($request->sum_m3[$key]) ? str_replace(",", "", $request->sum_m3[$key]) : null,
                            'sum_volwt'      => !empty($request->sum_volwt[$key]) ? str_replace(",", "", $request->sum_volwt[$key]) : null,
                            'create_by'     => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'update_by'     => auth()->user()->firstname . " " . auth()->user()->lastname,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    AirExJobD2::insert($result_d2);
                }

                $ad3 = AirExJobD3::where('air_ex_job_id', $id)->first();
                $ad3->pcs = !empty($request->pcs) ? str_replace(",", "", $request->pcs) : null;
                $ad3->uom = !empty($request->uom) ? $request->uom : null;
                $ad3->gross_weight = !empty($request->gross_weight) ? str_replace(",", "", $request->gross_weight) : null;
                $ad3->rate_class = !empty($request->rate_class) ? $request->rate_class : null;
                $ad3->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $ad3->chargeable_wt = !empty($request->chargeable_wt) ? str_replace(",", "", $request->chargeable_wt) : null;
                $ad3->doc_rate = !empty($request->doc_rate) ? str_replace(",", "", $request->doc_rate) : null;
                $ad3->doc_total_amt = !empty($request->doc_total_amt) ? str_replace(",", "", $request->doc_total_amt) : null;
                $ad3->slac_qty = !empty($request->slac_qty) ? str_replace(",", "", $request->slac_qty) : null;
                $ad3->slac_uom = !empty($request->slac_uom) ? $request->slac_uom : null;
                $ad3->cargo_class = !empty($request->cargo_class) ? $request->cargo_class : null;
                $ad3->salesman_code = !empty($request->salesman_code) ? $request->salesman_code : null;
                $ad3->as_arrange_flag = $request->as_arrange_flag == "yes" ? true : false;
                $ad3->user_charge_wt = !empty($request->user_charge_wt) ? str_replace(",", "", $request->user_charge_wt) : null;
                $ad3->commodity_desc_1 = !empty($request->commodity_desc_1) ? $request->commodity_desc_1 : null;
                $ad3->commodity_desc_2 = !empty($request->commodity_desc_2) ? $request->commodity_desc_2 : null;
                $ad3->commodity_desc_3 = !empty($request->commodity_desc_3) ? $request->commodity_desc_3 : null;
                $ad3->commodity_desc_4 = !empty($request->commodity_desc_4) ? $request->commodity_desc_4 : null;
                $ad3->commodity_desc_5 = !empty($request->commodity_desc_5) ? $request->commodity_desc_5 : null;
                $ad3->commodity_desc_6 = !empty($request->commodity_desc_6) ? $request->commodity_desc_6 : null;
                $ad3->commodity_desc_7 = !empty($request->commodity_desc_7) ? $request->commodity_desc_7 : null;
                $ad3->commodity_desc_8 = !empty($request->commodity_desc_8) ? $request->commodity_desc_8 : null;
                $ad3->commodity_desc_9 = !empty($request->commodity_desc_9) ? $request->commodity_desc_9 : null;
                $ad3->commodity_desc_10 = !empty($request->commodity_desc_10) ? $request->commodity_desc_10 : null;
                $ad3->commodity_desc_11 = !empty($request->commodity_desc_11) ? $request->commodity_desc_11 : null;
                $ad3->commodity_desc_12 = !empty($request->commodity_desc_12) ? $request->commodity_desc_12 : null;
                $ad3->desc_1 = !empty($request->desc_1) ? $request->desc_1 : null;
                $ad3->desc_2 = !empty($request->desc_2) ? $request->desc_2 : null;
                $ad3->desc_3 = !empty($request->desc_3) ? $request->desc_3 : null;
                $ad3->desc_4 = !empty($request->desc_4) ? $request->desc_4 : null;
                $ad3->desc_5 = !empty($request->desc_5) ? $request->desc_5 : null;
                $ad3->desc_6 = !empty($request->desc_6) ? $request->desc_6 : null;
                $ad3->desc_7 = !empty($request->desc_7) ? $request->desc_7 : null;
                $ad3->desc_8 = !empty($request->desc_8) ? $request->desc_8 : null;
                $ad3->desc_9 = !empty($request->desc_9) ? $request->desc_9 : null;
                $ad3->desc_10 = !empty($request->desc_10) ? $request->desc_10 : null;
                $ad3->desc_11 = !empty($request->desc_11) ? $request->desc_11 : null;
                $ad3->desc_12 = !empty($request->desc_12) ? $request->desc_12 : null;
                $ad3->update_by  = auth()->user()->firstname . " " . auth()->user()->lastname;
                $ad3->update();

                $result_d4 = [];
                $aj->air_ex_job_d4()->forceDelete();
                if ($request->code[1] != null) {
                    foreach ($request->id_key as $key6) {
                        $result_d4[] = [
                            'air_ex_job_id' => $aj->id,
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
                    AirExJobD4::insert($result_d4);
                }


                DB::commit();
                return to_route('air_ex_job.index')->with('success', 'Air Export Job has been updated!');
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
    public function destroy(AirExJob $air_ex_job)
    {
        if (Auth::user()->hasPermission('delete-air_ex_job')) {
            DB::beginTransaction();
            try {
                $air_ex_job->delete();

                DB::commit();
                return to_route('air_ex_job.index')->with('success', 'Air Export Job has been deleted!');
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
        $aj = AirExJob::with(['jm.bisnis_party', 'ad1', 'ad2', 'ad3', 'ad4'])->where('id', $id)->orderBy('id', 'DESC')->first();
        $sales = array_filter($aj->toArray()['ad4'], function ($value) {
            return ($value['cust_code_sales'] != null);
        });

        $vendor = array_filter($aj->toArray()['ad4'], function ($value) {
            return ($value['code_vendor'] != null);
        });

        $company = Company::first();
        $company_detail = CompanyDetailSatu::where('company_id', $company->id)->where('type', 'Head Office')->first();
        $pdf = app('dompdf.wrapper');

        if ($jns_pdf == 'js') {
            $pdf->loadView('trx.air_ex_job.export_pdf_js', [
                'aj'    => $aj,
                'company'   => $company,
                'company_detail'   => $company_detail,
                'vendor'   => $vendor,
                'sales'   => $sales,
            ])->setPaper('a4', 'portrait');
        } elseif ($jns_pdf == 'jo') {
            $pdf->loadView('trx.air_ex_job.export_pdf_jo', [
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
