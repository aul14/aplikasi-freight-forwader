<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\AddInfo;
use App\Models\History;
use App\Models\JobType;
use App\Models\AddInfoD1;
use App\Models\AirBooking;
use App\Models\AirBookingD1;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class AirExportBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-air_book')) {
            if ($request->ajax()) {
                // if (!empty(auth()->user()->salesman_code)) {
                //     $air_book = AirBooking::with(['air_book_d1', 'air_book_d2'])->where('salesman_code', explode(",", auth()->user()->salesman_code))->orderBy('id', 'DESC')->select('*');
                // } else {
                $air_book = AirBooking::with('air_book_d1')->orderBy('id', 'DESC')->select('*');
                // }
                return DataTables::of($air_book)
                    ->addColumn('action', function ($air_book) {
                        return view('datatable-modal._action', [
                            'row_id' => $air_book->id,
                            'edit_url' => route('air_book.edit', $air_book->id),
                            'delete_url' => route('air_book.destroy', $air_book->id),
                            'can_edit' => 'edit-air_book',
                            'can_delete' => 'delete-air_book'
                        ]);
                    })
                    ->editColumn('updated_at', function ($air_book) {
                        return !empty($air_book->updated_at) ? date("d-m-Y H:i", strtotime($air_book->updated_at)) : "-";
                    })
                    ->editColumn('flight_date_1', function ($air_book) {
                        return !empty($air_book->flight_date_1) ? date("d-m-Y H:i", strtotime($air_book->flight_date_1)) : "-";
                    })
                    ->editColumn('volume_weight', function ($air_book) {
                        return number_format($air_book->volume_weight, 4, '.', ',');
                    })
                    ->editColumn('gross_weight', function ($air_book) {
                        return number_format($air_book->gross_weight, 4, '.', ',');
                    })
                    ->rawColumns(['updated_at', 'action', 'flight_date_1', 'volume_weight', 'gross_weight'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Air Export Booking')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Air Export Booking')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Air Export Booking',
                    'url_menu'  => route('air_book.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Air Export Booking',
                    'url_menu'  => route('air_book.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('trx.air_book.index');
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
        if (Auth::user()->hasPermission('create-air_book')) {
            $job_type = JobType::where('description', 'like', '%EXPORT%')->get();
            $add_info = AddInfo::where('trx_type', 'AEB')->first()->makeHidden(['id', 'trx_type', 'created_at', 'updated_at'])->toarray();
            $add_info =  collect($add_info)->filter(function ($value) {
                return !is_null($value);
            });
            return view('trx.air_book.create', compact('job_type', 'add_info'));
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
        if (Auth::user()->hasPermission('create-air_book')) {
            $request->validate(
                [
                    'code'    => 'required|max:20|unique:air_bookings,code',
                    'job_type'  => 'required',
                    'flight_date_1'  => 'required',
                    'air_dest_code'  => 'required',
                    'air_dept_code'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $air_book = new AirBooking();
                $code = CodeNumbering::custom_code('35', $air_book, 'code');

                $air_book->code = $code;
                $air_book->booking_date = !empty($request->booking_date) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->booking_date)))  : null;
                $air_book->job_no = !empty($request->job_no) ? $request->job_no : null;
                $air_book->job_date = !empty($request->job_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->job_date)))  : null;
                $air_book->job_type = !empty($request->job_type) ? $request->job_type : null;
                $air_book->quotation_no = !empty($request->quotation_no) ? $request->quotation_no : null;
                $air_book->code_customer = !empty($request->code_customer) ? $request->code_customer : null;
                $air_book->customer = !empty($request->customer) ? $request->customer : null;
                $air_book->booking_from = !empty($request->booking_from) ? $request->booking_from : null;
                $air_book->nomination_cargo = $request->nomination_cargo == "yes" ? true : false;
                $air_book->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $air_book->email = !empty($request->email) ? $request->email : null;
                $air_book->telp = !empty($request->telp) ? $request->telp : null;
                $air_book->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $air_book->payment_term = !empty($request->payment_term) ? $request->payment_term : null;
                $air_book->awb_no = !empty($request->awb_no) ? $request->awb_no : null;
                $air_book->mawb_no = !empty($request->mawb_no) ? $request->mawb_no : null;
                $air_book->shipment_type = !empty($request->shipment_type) ? $request->shipment_type : null;
                $air_book->shipper_code = !empty($request->shipper_code) ? $request->shipper_code : null;
                $air_book->shipper_name = !empty($request->shipper_name) ? $request->shipper_name : null;
                $air_book->consignee_code = !empty($request->consignee_code) ? $request->consignee_code : null;
                $air_book->consignee_name = !empty($request->consignee_name) ? $request->consignee_name : null;
                $air_book->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $air_book->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $air_book->overseas_agent_code = !empty($request->overseas_agent_code) ? $request->overseas_agent_code : null;
                $air_book->overseas_agent_name = !empty($request->overseas_agent_name) ? $request->overseas_agent_name : null;
                $air_book->overseas_agent_address_1 = !empty($request->overseas_agent_address_1) ? $request->overseas_agent_address_1 : null;
                $air_book->overseas_agent_address_2 = !empty($request->overseas_agent_address_2) ? $request->overseas_agent_address_2 : null;
                $air_book->overseas_agent_address_3 = !empty($request->overseas_agent_address_3) ? $request->overseas_agent_address_3 : null;
                $air_book->overseas_agent_address_4 = !empty($request->overseas_agent_address_4) ? $request->overseas_agent_address_4 : null;
                $air_book->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $air_book->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $air_book->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $air_book->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $air_book->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $air_book->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $air_book->agent_code = !empty($request->agent_code) ? $request->agent_code : null;
                $air_book->agent_name = !empty($request->agent_name) ? $request->agent_name : null;
                $air_book->air_dept_code = !empty($request->air_dept_code) ? $request->air_dept_code : null;
                $air_book->air_dept_name = !empty($request->air_dept_name) ? $request->air_dept_name : null;
                $air_book->air_dest_code = !empty($request->air_dest_code) ? $request->air_dest_code : null;
                $air_book->air_dest_name = !empty($request->air_dest_name) ? $request->air_dest_name : null;
                $air_book->country_origin_code = !empty($request->country_origin_code) ? $request->country_origin_code : null;
                $air_book->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $air_book->delivery_type_name = !empty($request->delivery_type_name) ? $request->delivery_type_name : null;
                $air_book->weight_val_flag = !empty($request->weight_val_flag) ? $request->weight_val_flag : null;
                $air_book->other_flag = !empty($request->other_flag) ? $request->other_flag : null;
                $air_book->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $air_book->uom = !empty($request->uom) ? $request->uom : null;
                $air_book->to_dest_code_1 = !empty($request->to_dest_code_1) ? $request->to_dest_code_1 : null;
                $air_book->by_airline_id_1 = !empty($request->by_airline_id_1) ? $request->by_airline_id_1 : null;
                $air_book->flight_no_1 = !empty($request->flight_no_1) ? $request->flight_no_1 : null;
                $air_book->flight_date_1 = !empty($request->flight_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_1)))  : null;
                $air_book->eta_date_1 = !empty($request->eta_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_1)))  : null;
                $air_book->to_dest_code_2 = !empty($request->to_dest_code_2) ? $request->to_dest_code_2 : null;
                $air_book->by_airline_id_2 = !empty($request->by_airline_id_2) ? $request->by_airline_id_2 : null;
                $air_book->flight_no_2 = !empty($request->flight_no_2) ? $request->flight_no_2 : null;
                $air_book->flight_date_2 = !empty($request->flight_date_2) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_2)))  : null;
                $air_book->eta_date_2 = !empty($request->eta_date_2) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_2)))  : null;
                $air_book->to_dest_code_3 = !empty($request->to_dest_code_3) ? $request->to_dest_code_3 : null;
                $air_book->by_airline_id_3 = !empty($request->by_airline_id_3) ? $request->by_airline_id_3 : null;
                $air_book->flight_no_3 = !empty($request->flight_no_3) ? $request->flight_no_3 : null;
                $air_book->flight_date_3 = !empty($request->flight_date_3) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_3)))  : null;
                $air_book->eta_date_3 = !empty($request->eta_date_3) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_3)))  : null;
                $air_book->to_dest_code_4 = !empty($request->to_dest_code_4) ? $request->to_dest_code_4 : null;
                $air_book->by_airline_id_4 = !empty($request->by_airline_id_4) ? $request->by_airline_id_4 : null;
                $air_book->flight_no_4 = !empty($request->flight_no_4) ? $request->flight_no_4 : null;
                $air_book->flight_date_4 = !empty($request->flight_date_4) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_4)))  : null;
                $air_book->eta_date_4 = !empty($request->eta_date_4) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_4)))  : null;
                $air_book->service_level = !empty($request->service_level) ? $request->service_level : null;
                $air_book->pcs = !empty($request->pcs) ? $request->pcs : null;
                $air_book->gross_weight = !empty($request->gross_weight) ? str_replace(",", "", $request->gross_weight) : null;
                $air_book->volume_weight = !empty($request->volume_weight) ? str_replace(",", "", $request->volume_weight) : null;
                $air_book->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $air_book->commodity = !empty($request->commodity) ? $request->commodity : null;
                $air_book->footer_1 = !empty($request->footer_1) ? $request->footer_1 : null;
                $air_book->footer_2 = !empty($request->footer_2) ? $request->footer_2 : null;
                $air_book->footer_3 = !empty($request->footer_3) ? $request->footer_3 : null;
                $air_book->footer_4 = !empty($request->footer_4) ? $request->footer_4 : null;
                $air_book->footer_5 = !empty($request->footer_5) ? $request->footer_5 : null;
                $air_book->footer_6 = !empty($request->footer_6) ? $request->footer_6 : null;
                $air_book->footer_7 = !empty($request->footer_7) ? $request->footer_7 : null;
                $air_book->footer_8 = !empty($request->footer_8) ? $request->footer_8 : null;
                $air_book->footer_9 = !empty($request->footer_9) ? $request->footer_9 : null;
                $air_book->footer_10 = !empty($request->footer_10) ? $request->footer_10 : null;
                $air_book->footnote = !empty($request->footnote) ? $request->footnote : null;
                $air_book->satuan_dimension = !empty($request->satuan_dimension) ? $request->satuan_dimension : null;
                $air_book->total_m3 = !empty($request->total_m3) ? str_replace(",", "", $request->total_m3) : null;
                $air_book->total_pcs = !empty($request->total_pcs) ? str_replace(",", "", $request->total_pcs) : null;
                $air_book->total_dimension = !empty($request->total_dimension) ? str_replace(",", "", $request->total_dimension) : null;
                $air_book->total_vol_wt = !empty($request->total_vol_wt) ? str_replace(",", "", $request->total_vol_wt) : null;
                $air_book->create_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $air_book->save();

                $result_d1 = [];
                if ($request->pcs_rcp[0] != null || $request->length[0] != null || $request->width[0] != null || $request->height[0] != null) {
                    foreach ($request->s_no as $key => $val) {
                        $result_d1[] = [
                            'air_booking_id' => $air_book->id,
                            's_no'      => $val,
                            'loose_qty'   => !empty($request->loose_qty[$key]) ? $request->loose_qty[$key] : null,
                            'pcs_rcp'   => !empty($request->pcs_rcp[$key]) ? $request->pcs_rcp[$key] : null,
                            'uom_d1'   => !empty($request->uom_d1[$key]) ? $request->uom_d1[$key] : null,
                            'length'      => !empty($request->length[$key]) ? str_replace(",", "", $request->length[$key]) : null,
                            'width'      => !empty($request->width[$key]) ? str_replace(",", "", $request->width[$key]) : null,
                            'height'      => !empty($request->height[$key]) ? str_replace(",", "", $request->height[$key]) : null,
                            'dimension'      => !empty($request->dimension[$key]) ? str_replace(",", "", $request->dimension[$key]) : null,
                            'sum_m3'      => !empty($request->sum_m3[$key]) ? str_replace(",", "", $request->sum_m3[$key]) : null,
                            'sum_volwt'      => !empty($request->sum_volwt[$key]) ? str_replace(",", "", $request->sum_volwt[$key]) : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    AirBookingD1::insert($result_d1);
                }

                //SAVE TO TABLE ADDITIONAL INFO OR Extra Info OR REMARK
                $add_info = AddInfo::where('trx_type', 'AEB')->first()->makeHidden(['trx_type', 'created_at', 'updated_at'])->toarray();
                $add_info =  collect($add_info)->filter(function ($value) {
                    return !is_null($value);
                });

                $data_info = [];
                foreach ($add_info as $key => $val) {
                    $test = str_replace('k', 'v', $key);
                    $data_info[$test] = $request->input($test) == "yes" ? true : $request->input($test);
                }
                unset($data_info['id']);

                $cek_info_d1 = AddInfoD1::where('trx_id', $air_book->id)->first();
                if ($cek_info_d1 == null) {
                    $add_info_d1 = new AddInfoD1();
                } else {
                    $add_info_d1 = AddInfoD1::where('trx_id', $air_book->id)->first();
                }
                $add_info_d1->add_info_id = $add_info['id'];
                $add_info_d1->trx_type = 'AEB';
                $add_info_d1->trx_id = $air_book->id;
                $add_info_d1->vs1 = !empty($data_info['vs1']) ? $data_info['vs1'] : null;
                $add_info_d1->vs2 = !empty($data_info['vs2']) ? $data_info['vs2'] : null;
                $add_info_d1->vs3 = !empty($data_info['vs3']) ? $data_info['vs3'] : null;
                $add_info_d1->vs4 = !empty($data_info['vs4']) ? $data_info['vs4'] : null;
                $add_info_d1->vn1 = !empty($data_info['vn1']) ? $data_info['vn1'] : null;
                $add_info_d1->vn2 = !empty($data_info['vn2']) ? $data_info['vn2'] : null;
                $add_info_d1->vt1 = !empty($data_info['vt1']) ? $data_info['vt1'] : null;
                $add_info_d1->vt2 = !empty($data_info['vt2']) ? $data_info['vt2'] : null;
                $add_info_d1->vb1 = !empty($data_info['vb1']) ? $data_info['vb1'] : null;
                $add_info_d1->vb2 = !empty($data_info['vb2']) ? $data_info['vb2'] : null;
                $add_info_d1->vd1 = !empty($data_info['vd1']) ? $data_info['vd1'] : null;
                $add_info_d1->vd2 = !empty($data_info['vd2']) ? $data_info['vd2'] : null;
                $add_info_d1->vdt1 = !empty($data_info['vdt1']) ? $data_info['vdt1'] : null;
                $add_info_d1->vdt2 = !empty($data_info['vdt2']) ? $data_info['vdt2'] : null;
                if ($cek_info_d1 == null) {
                    $add_info_d1->save();
                } else {
                    $add_info_d1->update();
                }

                DB::commit();
                return to_route('air_book.index')->with('success', 'New Air Export Booking has been added!');
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
        if (Auth::user()->hasPermission('edit-air_book')) {
            $job_type = JobType::where('description', 'like', '%EXPORT%')->get();
            $add_info_d1 = AddInfoD1::where('trx_id', $id)->first();
            $add_info = AddInfo::where('trx_type', 'AEB')->first()->makeHidden(['id', 'trx_type', 'created_at', 'updated_at'])->toarray();
            $add_info =  collect($add_info)->filter(function ($value) {
                return !is_null($value);
            });
            $ab = AirBooking::with('a_d1')->find($id);

            return view('trx.air_book.edit', compact('job_type', 'add_info', 'ab', 'add_info_d1'));
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
        if (Auth::user()->hasPermission('edit-air_book')) {
            $request->validate(
                [
                    'code'    => 'required|max:20|unique:air_bookings,code,' . $id,
                    'job_type'  => 'required',
                    'flight_date_1'  => 'required',
                    'air_dest_code'  => 'required',
                    'air_dept_code'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $air_book = AirBooking::find($id);

                $air_book->booking_date = !empty($request->booking_date) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->booking_date)))  : null;
                $air_book->job_no = !empty($request->job_no) ? $request->job_no : null;
                $air_book->job_date = !empty($request->job_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->job_date)))  : null;
                $air_book->job_type = !empty($request->job_type) ? $request->job_type : null;
                $air_book->quotation_no = !empty($request->quotation_no) ? $request->quotation_no : null;
                $air_book->code_customer = !empty($request->code_customer) ? $request->code_customer : null;
                $air_book->customer = !empty($request->customer) ? $request->customer : null;
                $air_book->booking_from = !empty($request->booking_from) ? $request->booking_from : null;
                $air_book->nomination_cargo = $request->nomination_cargo == "yes" ? true : false;
                $air_book->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $air_book->email = !empty($request->email) ? $request->email : null;
                $air_book->telp = !empty($request->telp) ? $request->telp : null;
                $air_book->shipmode = !empty($request->shipmode) ? $request->shipmode : null;
                $air_book->payment_term = !empty($request->payment_term) ? $request->payment_term : null;
                $air_book->awb_no = !empty($request->awb_no) ? $request->awb_no : null;
                $air_book->mawb_no = !empty($request->mawb_no) ? $request->mawb_no : null;
                $air_book->shipment_type = !empty($request->shipment_type) ? $request->shipment_type : null;
                $air_book->shipper_code = !empty($request->shipper_code) ? $request->shipper_code : null;
                $air_book->shipper_name = !empty($request->shipper_name) ? $request->shipper_name : null;
                $air_book->consignee_code = !empty($request->consignee_code) ? $request->consignee_code : null;
                $air_book->consignee_name = !empty($request->consignee_name) ? $request->consignee_name : null;
                $air_book->coloader_code = !empty($request->coloader_code) ? $request->coloader_code : null;
                $air_book->coloader_name = !empty($request->coloader_name) ? $request->coloader_name : null;
                $air_book->overseas_agent_code = !empty($request->overseas_agent_code) ? $request->overseas_agent_code : null;
                $air_book->overseas_agent_name = !empty($request->overseas_agent_name) ? $request->overseas_agent_name : null;
                $air_book->overseas_agent_address_1 = !empty($request->overseas_agent_address_1) ? $request->overseas_agent_address_1 : null;
                $air_book->overseas_agent_address_2 = !empty($request->overseas_agent_address_2) ? $request->overseas_agent_address_2 : null;
                $air_book->overseas_agent_address_3 = !empty($request->overseas_agent_address_3) ? $request->overseas_agent_address_3 : null;
                $air_book->overseas_agent_address_4 = !empty($request->overseas_agent_address_4) ? $request->overseas_agent_address_4 : null;
                $air_book->notify_code = !empty($request->notify_code) ? $request->notify_code : null;
                $air_book->notify_name = !empty($request->notify_name) ? $request->notify_name : null;
                $air_book->notify_address_1 = !empty($request->notify_address_1) ? $request->notify_address_1 : null;
                $air_book->notify_address_2 = !empty($request->notify_address_2) ? $request->notify_address_2 : null;
                $air_book->notify_address_3 = !empty($request->notify_address_3) ? $request->notify_address_3 : null;
                $air_book->notify_address_4 = !empty($request->notify_address_4) ? $request->notify_address_4 : null;
                $air_book->agent_code = !empty($request->agent_code) ? $request->agent_code : null;
                $air_book->agent_name = !empty($request->agent_name) ? $request->agent_name : null;
                $air_book->air_dept_code = !empty($request->air_dept_code) ? $request->air_dept_code : null;
                $air_book->air_dept_name = !empty($request->air_dept_name) ? $request->air_dept_name : null;
                $air_book->air_dest_code = !empty($request->air_dest_code) ? $request->air_dest_code : null;
                $air_book->air_dest_name = !empty($request->air_dest_name) ? $request->air_dest_name : null;
                $air_book->country_origin_code = !empty($request->country_origin_code) ? $request->country_origin_code : null;
                $air_book->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $air_book->delivery_type_name = !empty($request->delivery_type_name) ? $request->delivery_type_name : null;
                $air_book->weight_val_flag = !empty($request->weight_val_flag) ? $request->weight_val_flag : null;
                $air_book->other_flag = !empty($request->other_flag) ? $request->other_flag : null;
                $air_book->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $air_book->uom = !empty($request->uom) ? $request->uom : null;
                $air_book->to_dest_code_1 = !empty($request->to_dest_code_1) ? $request->to_dest_code_1 : null;
                $air_book->by_airline_id_1 = !empty($request->by_airline_id_1) ? $request->by_airline_id_1 : null;
                $air_book->flight_no_1 = !empty($request->flight_no_1) ? $request->flight_no_1 : null;
                $air_book->flight_date_1 = !empty($request->flight_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_1)))  : null;
                $air_book->eta_date_1 = !empty($request->eta_date_1) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_1)))  : null;
                $air_book->to_dest_code_2 = !empty($request->to_dest_code_2) ? $request->to_dest_code_2 : null;
                $air_book->by_airline_id_2 = !empty($request->by_airline_id_2) ? $request->by_airline_id_2 : null;
                $air_book->flight_no_2 = !empty($request->flight_no_2) ? $request->flight_no_2 : null;
                $air_book->flight_date_2 = !empty($request->flight_date_2) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_2)))  : null;
                $air_book->eta_date_2 = !empty($request->eta_date_2) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_2)))  : null;
                $air_book->to_dest_code_3 = !empty($request->to_dest_code_3) ? $request->to_dest_code_3 : null;
                $air_book->by_airline_id_3 = !empty($request->by_airline_id_3) ? $request->by_airline_id_3 : null;
                $air_book->flight_no_3 = !empty($request->flight_no_3) ? $request->flight_no_3 : null;
                $air_book->flight_date_3 = !empty($request->flight_date_3) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_3)))  : null;
                $air_book->eta_date_3 = !empty($request->eta_date_3) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_3)))  : null;
                $air_book->to_dest_code_4 = !empty($request->to_dest_code_4) ? $request->to_dest_code_4 : null;
                $air_book->by_airline_id_4 = !empty($request->by_airline_id_4) ? $request->by_airline_id_4 : null;
                $air_book->flight_no_4 = !empty($request->flight_no_4) ? $request->flight_no_4 : null;
                $air_book->flight_date_4 = !empty($request->flight_date_4) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->flight_date_4)))  : null;
                $air_book->eta_date_4 = !empty($request->eta_date_4) ? date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->eta_date_4)))  : null;
                $air_book->service_level = !empty($request->service_level) ? $request->service_level : null;
                $air_book->pcs = !empty($request->pcs) ? $request->pcs : null;
                $air_book->gross_weight = !empty($request->gross_weight) ? str_replace(",", "", $request->gross_weight) : null;
                $air_book->volume_weight = !empty($request->volume_weight) ? str_replace(",", "", $request->volume_weight) : null;
                $air_book->commodity_code = !empty($request->commodity_code) ? $request->commodity_code : null;
                $air_book->commodity = !empty($request->commodity) ? $request->commodity : null;
                $air_book->footer_1 = !empty($request->footer_1) ? $request->footer_1 : null;
                $air_book->footer_2 = !empty($request->footer_2) ? $request->footer_2 : null;
                $air_book->footer_3 = !empty($request->footer_3) ? $request->footer_3 : null;
                $air_book->footer_4 = !empty($request->footer_4) ? $request->footer_4 : null;
                $air_book->footer_5 = !empty($request->footer_5) ? $request->footer_5 : null;
                $air_book->footer_6 = !empty($request->footer_6) ? $request->footer_6 : null;
                $air_book->footer_7 = !empty($request->footer_7) ? $request->footer_7 : null;
                $air_book->footer_8 = !empty($request->footer_8) ? $request->footer_8 : null;
                $air_book->footer_9 = !empty($request->footer_9) ? $request->footer_9 : null;
                $air_book->footer_10 = !empty($request->footer_10) ? $request->footer_10 : null;
                $air_book->footnote = !empty($request->footnote) ? $request->footnote : null;
                $air_book->satuan_dimension = !empty($request->satuan_dimension) ? $request->satuan_dimension : null;
                $air_book->total_m3 = !empty($request->total_m3) ? str_replace(",", "", $request->total_m3) : null;
                $air_book->total_pcs = !empty($request->total_pcs) ? str_replace(",", "", $request->total_pcs) : null;
                $air_book->total_dimension = !empty($request->total_dimension) ? str_replace(",", "", $request->total_dimension) : null;
                $air_book->total_vol_wt = !empty($request->total_vol_wt) ? str_replace(",", "", $request->total_vol_wt) : null;
                $air_book->update_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $air_book->update();

                $result_d1 = [];
                $air_book->air_book_d1()->forceDelete();
                if ($request->pcs_rcp[0] != null || $request->length[0] != null || $request->width[0] != null || $request->height[0] != null) {
                    foreach ($request->s_no as $key => $val) {
                        $result_d1[] = [
                            'air_booking_id' => $air_book->id,
                            's_no'      => $val,
                            'loose_qty'   => !empty($request->loose_qty[$key]) ? $request->loose_qty[$key] : null,
                            'pcs_rcp'   => !empty($request->pcs_rcp[$key]) ? $request->pcs_rcp[$key] : null,
                            'uom_d1'   => !empty($request->uom_d1[$key]) ? $request->uom_d1[$key] : null,
                            'length'      => !empty($request->length[$key]) ? str_replace(",", "", $request->length[$key]) : null,
                            'width'      => !empty($request->width[$key]) ? str_replace(",", "", $request->width[$key]) : null,
                            'height'      => !empty($request->height[$key]) ? str_replace(",", "", $request->height[$key]) : null,
                            'dimension'      => !empty($request->dimension[$key]) ? str_replace(",", "", $request->dimension[$key]) : null,
                            'sum_m3'      => !empty($request->sum_m3[$key]) ? str_replace(",", "", $request->sum_m3[$key]) : null,
                            'sum_volwt'      => !empty($request->sum_volwt[$key]) ? str_replace(",", "", $request->sum_volwt[$key]) : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    AirBookingD1::insert($result_d1);
                }

                //SAVE TO TABLE ADDITIONAL INFO OR Extra Info OR REMARK
                $add_info = AddInfo::where('trx_type', 'AEB')->first()->makeHidden(['trx_type', 'created_at', 'updated_at'])->toarray();
                $add_info =  collect($add_info)->filter(function ($value) {
                    return !is_null($value);
                });

                $data_info = [];
                foreach ($add_info as $key => $val) {
                    $test = str_replace('k', 'v', $key);
                    $data_info[$test] = $request->input($test) == "yes" ? true : $request->input($test);
                }
                unset($data_info['id']);

                $cek_info_d1 = AddInfoD1::where('trx_id', $air_book->id)->first();
                if ($cek_info_d1 == null) {
                    $add_info_d1 = new AddInfoD1();
                } else {
                    $add_info_d1 = AddInfoD1::where('trx_id', $air_book->id)->first();
                }
                $add_info_d1->add_info_id = $add_info['id'];
                $add_info_d1->trx_type = 'AEB';
                $add_info_d1->trx_id = $air_book->id;
                $add_info_d1->vs1 = !empty($data_info['vs1']) ? $data_info['vs1'] : null;
                $add_info_d1->vs2 = !empty($data_info['vs2']) ? $data_info['vs2'] : null;
                $add_info_d1->vs3 = !empty($data_info['vs3']) ? $data_info['vs3'] : null;
                $add_info_d1->vs4 = !empty($data_info['vs4']) ? $data_info['vs4'] : null;
                $add_info_d1->vn1 = !empty($data_info['vn1']) ? $data_info['vn1'] : null;
                $add_info_d1->vn2 = !empty($data_info['vn2']) ? $data_info['vn2'] : null;
                $add_info_d1->vt1 = !empty($data_info['vt1']) ? $data_info['vt1'] : null;
                $add_info_d1->vt2 = !empty($data_info['vt2']) ? $data_info['vt2'] : null;
                $add_info_d1->vb1 = !empty($data_info['vb1']) ? $data_info['vb1'] : null;
                $add_info_d1->vb2 = !empty($data_info['vb2']) ? $data_info['vb2'] : null;
                $add_info_d1->vd1 = !empty($data_info['vd1']) ? $data_info['vd1'] : null;
                $add_info_d1->vd2 = !empty($data_info['vd2']) ? $data_info['vd2'] : null;
                $add_info_d1->vdt1 = !empty($data_info['vdt1']) ? $data_info['vdt1'] : null;
                $add_info_d1->vdt2 = !empty($data_info['vdt2']) ? $data_info['vdt2'] : null;
                if ($cek_info_d1 == null) {
                    $add_info_d1->save();
                } else {
                    $add_info_d1->update();
                }

                DB::commit();
                return to_route('air_book.index')->with('success', 'Air Export Booking has been updated!');
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
    public function destroy(AirBooking $air_book)
    {
        if (Auth::user()->hasPermission('delete-air_book')) {
            DB::beginTransaction();
            try {
                $air_book->delete();

                DB::commit();
                return to_route('air_book.index')->with('success', 'Air Export Booking has been deleted!');
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
}
