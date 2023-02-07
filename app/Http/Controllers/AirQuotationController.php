<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\AddInfo;
use App\Models\History;
use App\Models\AddInfoD1;
use App\Models\Quotation;
use App\Models\AirQuotation;
use App\Models\AirQuotationD1;
use App\Models\AirQuotationD2;
use App\Models\AirQuotationSD1;
use App\Models\AirQuotationSD2;
use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AirQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-air_quot')) {
            if ($request->ajax()) {
                $air_quot = AirQuotation::with('quotation')->orderBy('id', 'DESC')->select('*');
                return DataTables::of($air_quot)
                    ->addColumn('action', function ($air_quot) {
                        return view('datatable-modal._action', [
                            'row_id' => $air_quot->id,
                            'edit_url' => route('air_quot.edit', $air_quot->id),
                            'delete_url' => route('air_quot.destroy', $air_quot->id),
                            'can_edit' => 'edit-air_quot',
                            'can_delete' => 'delete-air_quot'
                        ]);
                    })
                    ->editColumn('updated_at', function ($air_quot) {
                        return !empty($air_quot->updated_at) ? date("d-m-Y H:i", strtotime($air_quot->updated_at)) : "-";
                    })
                    ->editColumn('effective_date', function ($air_quot) {
                        return !empty($air_quot->effective_date) ? date("d-m-Y", strtotime($air_quot->effective_date)) : "-";
                    })
                    ->editColumn('expiry_date', function ($air_quot) {
                        return !empty($air_quot->expiry_date) ? date("d-m-Y", strtotime($air_quot->expiry_date)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action', 'effective_date', 'expiry_date'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Air Freight Quotation')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Air Freight Quotation')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Air Freight Quotation',
                    'url_menu'  => route('air_quot.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Air Freight Quotation',
                    'url_menu'  => route('air_quot.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('trx.air_quot.index');
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
        if (Auth::user()->hasPermission('create-air_quot')) {
            $add_info = AddInfo::where('trx_type', 'AQ')->first()->makeHidden(['id', 'trx_type', 'created_at', 'updated_at'])->toarray();
            $add_info =  collect($add_info)->filter(function ($value) {
                return !is_null($value);
            });
            return view('trx.air_quot.create', compact('add_info'));
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
        if (Auth::user()->hasPermission('create-air_quot')) {
            $request->validate(
                [
                    'air_quot_no'    => 'required|max:15|unique:air_quotations,air_quot_no',
                    'quotation_type_id'  => 'required',
                    'salesman_id'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $air_quot = new AirQuotation();
                $air_quot_no = CodeNumbering::custom_code('33', $air_quot, 'air_quot_no');

                // SAVE TO TABLE QUOTATION
                $quot = new Quotation();
                $quot->air_quot_no = $air_quot_no;
                $quot->title = !empty($request->title) ? $request->title : null;
                $quot->effective_date = !empty($request->effective_date) ? $request->effective_date : null;
                $quot->expiry_date = !empty($request->expiry_date) ? $request->expiry_date : null;
                $quot->validity_day = !empty($request->validity_day) ? $request->validity_day : null;
                $quot->quotation_type_id = !empty($request->quotation_type_id) ? $request->quotation_type_id : 0;
                $quot->bisnis_party_id = !empty($request->bisnis_party_id) ? $request->bisnis_party_id : 0;
                $quot->address_1 = !empty($request->address_1) ? $request->address_1 : null;
                $quot->address_2 = !empty($request->address_2) ? $request->address_2 : null;
                $quot->address_3 = !empty($request->address_3) ? $request->address_3 : null;
                $quot->address_4 = !empty($request->address_4) ? $request->address_4 : null;
                $quot->contact_name = !empty($request->contact_name) ? $request->contact_name : null;
                $quot->telp = !empty($request->telp) ? $request->telp : null;
                $quot->fax = !empty($request->fax) ? $request->fax : null;
                $quot->email = !empty($request->email) ? $request->email : null;
                $quot->salesman_id = !empty($request->salesman_id) ? $request->salesman_id : null;
                $quot->currency_id = !empty($request->currency_id) ? $request->currency_id : null;
                $quot->delivery_type_id = !empty($request->delivery_type_id) ? $request->delivery_type_id : null;
                $quot->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $quot->commodity_id = !empty($request->commodity_id) ? $request->commodity_id : null;
                $quot->pcs = !empty($request->pcs) ? $request->pcs : null;
                $quot->uom_id = !empty($request->uom_id) ? $request->uom_id : null;
                $quot->total_gross = !empty($request->total_gross) ? str_replace(",", "", $request->total_gross)  : null;
                $quot->total_volume = !empty($request->total_volume) ? str_replace(",", "", $request->total_volume) : null;
                $quot->save();

                // SAVE TO TABLE AIR QUOTATION
                $air_quot->quotation_id = $quot->id;
                $air_quot->air_quot_no = $air_quot_no;
                $air_quot->save();

                //SAVE TO TABLE AIR QUOTATION D1 AND SUB D1
                // $result_sd1 = [];
                $result_sd2 = [];
                $result_d1 = [];
                if ($request->air_dept_code[0] != null) {
                    foreach ($request->fch_code as $key => $val) {
                        $result_d1[] = [
                            'air_quotation_id' => $air_quot->id,
                            'code'  => $val,
                            'air_dept_code' => !empty($request->air_dept_code[$key]) ? $request->air_dept_code[$key] : null,
                            'air_dept_name'       => !empty($request->air_dept_name[$key]) ? $request->air_dept_name[$key] : null,
                            'air_dest_code'       => !empty($request->air_dest_code[$key]) ? $request->air_dest_code[$key] : null,
                            'air_dest_name'       => !empty($request->air_dest_name[$key]) ? $request->air_dest_name[$key] : null,
                            'service_level'       => !empty($request->service_level[$key]) ? $request->service_level[$key] : null,
                            'airline_id'       => !empty($request->airline_id[$key]) ? $request->airline_id[$key] : null,
                            'flight_no'       => !empty($request->flight_no[$key]) ? $request->flight_no[$key] : null,
                            'transit_time'       => !empty($request->transit_time[$key]) ? $request->transit_time[$key] : null,
                            'frequency'       => !empty($request->frequency[$key]) ? $request->frequency[$key] : null,
                            'note'       => !empty($request->note[$key]) ? $request->note[$key] : null,
                            'sales_item_code'       => !empty($request->sales_item_code[$key]) ? $request->sales_item_code[$key] : null,
                            'sales_item_name'       => !empty($request->sales_item_name[$key]) ? $request->sales_item_name[$key] : null,
                            'currency_d1'       => !empty($request->currency_d1[$key]) ? $request->currency_d1[$key] : null,
                            'weight_type'       => !empty($request->weight_type[$key]) ? $request->weight_type[$key] : null,
                            'total_amt'       => !empty($request->total_amt[$key]) ? str_replace(",", "", $request->total_amt[$key])  : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        // $result_sd1[] = [
                        //     'air_quotation_id' => $air_quot->id,
                        //     'air_quotation_d1_code' => $val,
                        //     'rate_1'        => !empty($request->rate_1[$key]) ? $request->rate_1[$key] : null,
                        //     'scr_1'        => !empty($request->scr_1[$key]) ? $request->scr_1[$key] : null,
                        //     'break_point_1'        => !empty($request->break_point_1[$key]) ? $request->break_point_1[$key] : null,
                        //     'quote_amt_1'        => !empty($request->quote_amt_1[$key]) ? $request->quote_amt_1[$key] : null,
                        //     'rate_2'        => !empty($request->rate_2[$key]) ? $request->rate_2[$key] : null,
                        //     'scr_2'        => !empty($request->scr_2[$key]) ? $request->scr_2[$key] : null,
                        //     'break_point_2'        => !empty($request->break_point_2[$key]) ? $request->break_point_2[$key] : null,
                        //     'quote_amt_2'        => !empty($request->quote_amt_2[$key]) ? $request->quote_amt_2[$key] : null,
                        //     'rate_3'        => !empty($request->rate_3[$key]) ? $request->rate_3[$key] : null,
                        //     'scr_3'        => !empty($request->scr_3[$key]) ? $request->scr_3[$key] : null,
                        //     'break_point_3'        => !empty($request->break_point_3[$key]) ? $request->break_point_3[$key] : null,
                        //     'quote_amt_3'        => !empty($request->quote_amt_3[$key]) ? $request->quote_amt_3[$key] : null,
                        //     'rate_4'        => !empty($request->rate_4[$key]) ? $request->rate_4[$key] : null,
                        //     'scr_4'        => !empty($request->scr_4[$key]) ? $request->scr_4[$key] : null,
                        //     'break_point_4'        => !empty($request->break_point_4[$key]) ? $request->break_point_4[$key] : null,
                        //     'quote_amt_4'        => !empty($request->quote_amt_4[$key]) ? $request->quote_amt_4[$key] : null,
                        //     'rate_5'        => !empty($request->rate_5[$key]) ? $request->rate_5[$key] : null,
                        //     'scr_5'        => !empty($request->scr_5[$key]) ? $request->scr_5[$key] : null,
                        //     'break_point_5'        => !empty($request->break_point_5[$key]) ? $request->break_point_5[$key] : null,
                        //     'quote_amt_5'        => !empty($request->quote_amt_5[$key]) ? $request->quote_amt_5[$key] : null,
                        //     'rate_6'        => !empty($request->rate_6[$key]) ? $request->rate_6[$key] : null,
                        //     'scr_6'        => !empty($request->scr_6[$key]) ? $request->scr_6[$key] : null,
                        //     'break_point_6'        => !empty($request->break_point_6[$key]) ? $request->break_point_6[$key] : null,
                        //     'quote_amt_6'        => !empty($request->quote_amt_6[$key]) ? $request->quote_amt_6[$key] : null,
                        //     'rate_7'        => !empty($request->rate_7[$key]) ? $request->rate_7[$key] : null,
                        //     'scr_7'        => !empty($request->scr_7[$key]) ? $request->scr_7[$key] : null,
                        //     'break_point_7'        => !empty($request->break_point_7[$key]) ? $request->break_point_7[$key] : null,
                        //     'quote_amt_7'        => !empty($request->quote_amt_7[$key]) ? $request->quote_amt_7[$key] : null,
                        //     'rate_8'        => !empty($request->rate_8[$key]) ? $request->rate_8[$key] : null,
                        //     'scr_8'        => !empty($request->scr_8[$key]) ? $request->scr_8[$key] : null,
                        //     'break_point_8'        => !empty($request->break_point_8[$key]) ? $request->break_point_8[$key] : null,
                        //     'quote_amt_8'        => !empty($request->quote_amt_8[$key]) ? $request->quote_amt_8[$key] : null,
                        //     'rate_9'        => !empty($request->rate_9[$key]) ? $request->rate_9[$key] : null,
                        //     'scr_9'        => !empty($request->scr_9[$key]) ? $request->scr_9[$key] : null,
                        //     'break_point_9'        => !empty($request->break_point_9[$key]) ? $request->break_point_9[$key] : null,
                        //     'quote_amt_9'        => !empty($request->quote_amt_9[$key]) ? $request->quote_amt_9[$key] : null,
                        //     'rate_10'        => !empty($request->rate_10[$key]) ? $request->rate_10[$key] : null,
                        //     'scr_10'        => !empty($request->scr_10[$key]) ? $request->scr_10[$key] : null,
                        //     'break_point_10'        => !empty($request->break_point_10[$key]) ? $request->break_point_10[$key] : null,
                        //     'quote_amt_10'        => !empty($request->quote_amt_10[$key]) ? $request->quote_amt_10[$key] : null,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ];

                        $result_sd2 = [];
                        if ($request->item_code_s_d2[0] != null) {
                            foreach ($request->fchsub_code as $key2 => $val2) {
                                $result_sd2[] = [
                                    'air_quotation_id'    =>   $air_quot->id,
                                    'air_quotation_d1_code' => $val2,
                                    'item_code_s_d2'     => !empty($request->item_code_s_d2[$key2]) ? $request->item_code_s_d2[$key2] : null,
                                    'item_desc_s_d2'     => !empty($request->item_desc_s_d2[$key2]) ? $request->item_desc_s_d2[$key2] : null,
                                    'qty_s_d2'     => !empty($request->qty_s_d2[$key2]) ? $request->qty_s_d2[$key2] : null,
                                    'awb_code_s_d2'     => !empty($request->awb_code_s_d2[$key2]) ? $request->awb_code_s_d2[$key2] : null,
                                    'uom_s_d2'     => !empty($request->uom_s_d2[$key2]) ? $request->uom_s_d2[$key2] : null,
                                    'chg_s_d2'     => !empty($request->chg_s_d2[$key2]) ? $request->chg_s_d2[$key2] : null,
                                    'vat_code_s_d2'     => !empty($request->vat_code_s_d2[$key2]) ? $request->vat_code_s_d2[$key2] : null,
                                    'p_c_s_d2'     => !empty($request->p_c_s_d2[$key2]) ? $request->p_c_s_d2[$key2] : null,
                                    'due_s_d2'     => !empty($request->due_s_d2[$key2]) ? $request->due_s_d2[$key2] : null,
                                    'chg_unit_s_d2'     => !empty($request->chg_unit_s_d2[$key2]) ? $request->chg_unit_s_d2[$key2] : null,
                                    'rate_s_d2'     => !empty($request->rate_s_d2[$key2]) ? $request->rate_s_d2[$key2] : null,
                                    'currency_s_d2'     => !empty($request->currency_s_d2[$key2]) ? $request->currency_s_d2[$key2] : null,
                                    'curr_rate_s_d2'     => !empty($request->curr_rate_s_d2[$key2]) ? str_replace(",", "", $request->curr_rate_s_d2[$key2])  : null,
                                    'min_amt_s_d2'     => !empty($request->min_amt_s_d2[$key2]) ? str_replace(",", "", $request->min_amt_s_d2[$key2])  : null,
                                    'unit_rate_s_d2'     => !empty($request->unit_rate_s_d2[$key2]) ?  str_replace(",", "", $request->unit_rate_s_d2[$key2])  : null,
                                    'idr_amt_s_d2'     => !empty($request->idr_amt_s_d2[$key2]) ?  str_replace(",", "", $request->idr_amt_s_d2[$key2])  : null,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ];
                            }
                        }
                    }
                    AirQuotationD1::insert($result_d1);
                    // AirQuotationSD1::insert($result_sd1);
                    AirQuotationSD2::insert($result_sd2);
                }

                //SAVE TO TABLE AIR QUOTATION D2
                $result_d2 = [];
                if ($request->item_code_d2[0] !=  null) {
                    foreach (array_unique($request->item_code_d2) as $key3 => $val3) {
                        $result_d2[] = [
                            'air_quotation_id'    =>   $air_quot->id,
                            'item_code_d2'     => $val3,
                            'item_desc_d2'     => !empty($request->item_desc_d2[$key3]) ? $request->item_desc_d2[$key3] : null,
                            'qty_d2'     => !empty($request->qty_d2[$key3]) ? $request->qty_d2[$key3] : null,
                            'awb_code_d2'     => !empty($request->awb_code_d2[$key3]) ? $request->awb_code_d2[$key3] : null,
                            'uom_d2'     => !empty($request->uom_d2[$key3]) ? $request->uom_d2[$key3] : null,
                            'chg_d2'     => !empty($request->chg_d2[$key3]) ? $request->chg_d2[$key3] : null,
                            'vat_code_d2'     => !empty($request->vat_code_d2[$key3]) ? $request->vat_code_d2[$key3] : null,
                            'p_c_d2'     => !empty($request->p_c_d2[$key3]) ? $request->p_c_d2[$key3] : null,
                            'chg_unit_d2'     => !empty($request->chg_unit_d2[$key3]) ? $request->chg_unit_d2[$key3] : null,
                            'due_d2'     => !empty($request->due_d2[$key3]) ? $request->due_d2[$key3] : null,
                            'rate_d2'     => !empty($request->rate_d2[$key3]) ? $request->rate_d2[$key3] : null,
                            'currency_d2'     => !empty($request->currency_d2[$key3]) ? $request->currency_d2[$key3] : null,
                            'curr_rate_d2'     => !empty($request->curr_rate_d2[$key3]) ? str_replace(",", "", $request->curr_rate_d2[$key3])  : null,
                            'unit_rate_d2'     => !empty($request->unit_rate_d2[$key3]) ? str_replace(",", "", $request->unit_rate_d2[$key3])  : null,
                            'min_amt_d2'     => !empty($request->min_amt_d2[$key3]) ? str_replace(",", "", $request->min_amt_d2[$key3])  : null,
                            'idr_amt_d2'     => !empty($request->idr_amt_d2[$key3]) ? str_replace(",", "", $request->idr_amt_d2[$key3])  : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    AirQuotationD2::insert($result_d2);
                }

                //SAVE TO TABLE ADDITIONAL INFO OR Extra Info OR REMARK
                $add_info = AddInfo::where('trx_type', 'AQ')->first()->makeHidden(['trx_type', 'created_at', 'updated_at'])->toarray();
                $add_info =  collect($add_info)->filter(function ($value) {
                    return !is_null($value);
                });

                $data_info = [];
                foreach ($add_info as $key => $val) {
                    $test = str_replace('k', 'v', $key);
                    $data_info[$test] = $request->input($test) == "yes" ? true : $request->input($test);
                }
                unset($data_info['id']);

                if (!empty($data_info['vs1'])  || !empty($data_info['vs2']) || !empty($data_info['vs3']) || !empty($data_info['vs4']) || !empty($data_info['vn1']) || !empty($data_info['vn2']) || !empty($data_info['vt1']) || !empty($data_info['vt2']) || !empty($data_info['vb1']) || !empty($data_info['vb2']) || !empty($data_info['vd1']) || !empty($data_info['vd2']) || !empty($data_info['vdt1']) || !empty($data_info['vdt2'])) {
                    $add_info_d1 = new AddInfoD1();
                    $add_info_d1->add_info_id = $add_info['id'];
                    $add_info_d1->trx_type = 'AQ';
                    $add_info_d1->trx_id = $air_quot->id;
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
                    $add_info_d1->save();
                }

                DB::commit();
                return to_route('air_quot.index')->with('success', 'New Air Freight Quotation has been added!');
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
        if (Auth::user()->hasPermission('edit-air_quot')) {
            $air_quot = AirQuotation::with(['quotation',  'air_quotation_d1', 'air_quotation_d2'])->where('id', $id)->first();
            $aq_d1 = AirQuotationD1::with('air_quotation_s_d2')->where('air_quotation_id', $id)->get();
            $aq = $air_quot;
            // dd($aq_d1);
            $add_info_d1 = AddInfoD1::where('trx_id', $id)->first();
            $add_info = AddInfo::where('trx_type', 'AQ')->first()->makeHidden(['id', 'trx_type', 'created_at', 'updated_at'])->toarray();
            $add_info =  collect($add_info)->filter(function ($value) {
                return !is_null($value);
            });
            return view('trx.air_quot.edit', compact('add_info', 'aq', 'aq_d1', 'add_info_d1'));
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
        if (Auth::user()->hasPermission('edit-air_quot')) {
            $request->validate(
                [
                    'air_quot_no'    => 'required|max:15|unique:air_quotations,air_quot_no,' . $id,
                    'quotation_type_id'  => 'required',
                    'salesman_id'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $air_quot = AirQuotation::find($id);

                // SAVE TO TABLE QUOTATION
                $quot = Quotation::where('air_quot_no', $air_quot->air_quot_no)->first();
                $quot->title = !empty($request->title) ? $request->title : null;
                $quot->effective_date = !empty($request->effective_date) ? $request->effective_date : null;
                $quot->expiry_date = !empty($request->expiry_date) ? $request->expiry_date : null;
                $quot->validity_day = !empty($request->validity_day) ? $request->validity_day : null;
                $quot->quotation_type_id = !empty($request->quotation_type_id) ? $request->quotation_type_id : 0;
                $quot->bisnis_party_id = !empty($request->bisnis_party_id) ? $request->bisnis_party_id : 0;
                $quot->address_1 = !empty($request->address_1) ? $request->address_1 : null;
                $quot->address_2 = !empty($request->address_2) ? $request->address_2 : null;
                $quot->address_3 = !empty($request->address_3) ? $request->address_3 : null;
                $quot->address_4 = !empty($request->address_4) ? $request->address_4 : null;
                $quot->contact_name = !empty($request->contact_name) ? $request->contact_name : null;
                $quot->telp = !empty($request->telp) ? $request->telp : null;
                $quot->fax = !empty($request->fax) ? $request->fax : null;
                $quot->email = !empty($request->email) ? $request->email : null;
                $quot->salesman_id = !empty($request->salesman_id) ? $request->salesman_id : null;
                $quot->currency_id = !empty($request->currency_id) ? $request->currency_id : null;
                $quot->delivery_type_id = !empty($request->delivery_type_id) ? $request->delivery_type_id : null;
                $quot->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $quot->commodity_id = !empty($request->commodity_id) ? $request->commodity_id : null;
                $quot->pcs = !empty($request->pcs) ? $request->pcs : null;
                $quot->uom_id = !empty($request->uom_id) ? $request->uom_id : null;
                $quot->total_gross = !empty($request->total_gross) ? str_replace(",", "", $request->total_gross)  : null;
                $quot->total_volume = !empty($request->total_volume) ? str_replace(",", "", $request->total_volume) : null;
                $quot->update();

                // SAVE TO TABLE AIR QUOTATION
                $air_quot->quotation_id = $quot->id;
                $air_quot->update();

                //SAVE TO TABLE AIR QUOTATION D1 AND SUB D1
                // $result_sd1 = [];
                $result_sd2 = [];
                $result_d1 = [];
                $air_quot->air_quotation_d1()->forceDelete();
                $air_quot->air_quotation_s_d2()->forceDelete();
                if ($request->air_dept_code[0] != null) {
                    foreach ($request->fch_code as $key => $val) {
                        $result_d1[] = [
                            'air_quotation_id' => $air_quot->id,
                            'code'  => $val,
                            'air_dept_code' => !empty($request->air_dept_code[$key]) ? $request->air_dept_code[$key] : null,
                            'air_dept_name'       => !empty($request->air_dept_name[$key]) ? $request->air_dept_name[$key] : null,
                            'air_dest_code'       => !empty($request->air_dest_code[$key]) ? $request->air_dest_code[$key] : null,
                            'air_dest_name'       => !empty($request->air_dest_name[$key]) ? $request->air_dest_name[$key] : null,
                            'service_level'       => !empty($request->service_level[$key]) ? $request->service_level[$key] : null,
                            'airline_id'       => !empty($request->airline_id[$key]) ? $request->airline_id[$key] : null,
                            'flight_no'       => !empty($request->flight_no[$key]) ? $request->flight_no[$key] : null,
                            'transit_time'       => !empty($request->transit_time[$key]) ? $request->transit_time[$key] : null,
                            'frequency'       => !empty($request->frequency[$key]) ? $request->frequency[$key] : null,
                            'note'       => !empty($request->note[$key]) ? $request->note[$key] : null,
                            'sales_item_code'       => !empty($request->sales_item_code[$key]) ? $request->sales_item_code[$key] : null,
                            'sales_item_name'       => !empty($request->sales_item_name[$key]) ? $request->sales_item_name[$key] : null,
                            'currency_d1'       => !empty($request->currency_d1[$key]) ? $request->currency_d1[$key] : null,
                            'weight_type'       => !empty($request->weight_type[$key]) ? $request->weight_type[$key] : null,
                            'total_amt'       => !empty($request->total_amt[$key]) ? str_replace(",", "", $request->total_amt[$key])  : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        // $result_sd1[] = [
                        //     'air_quotation_id' => $air_quot->id,
                        //     'air_quotation_d1_code' => $val,
                        //     'rate_1'        => !empty($request->rate_1[$key]) ? $request->rate_1[$key] : null,
                        //     'scr_1'        => !empty($request->scr_1[$key]) ? $request->scr_1[$key] : null,
                        //     'break_point_1'        => !empty($request->break_point_1[$key]) ? $request->break_point_1[$key] : null,
                        //     'quote_amt_1'        => !empty($request->quote_amt_1[$key]) ? $request->quote_amt_1[$key] : null,
                        //     'rate_2'        => !empty($request->rate_2[$key]) ? $request->rate_2[$key] : null,
                        //     'scr_2'        => !empty($request->scr_2[$key]) ? $request->scr_2[$key] : null,
                        //     'break_point_2'        => !empty($request->break_point_2[$key]) ? $request->break_point_2[$key] : null,
                        //     'quote_amt_2'        => !empty($request->quote_amt_2[$key]) ? $request->quote_amt_2[$key] : null,
                        //     'rate_3'        => !empty($request->rate_3[$key]) ? $request->rate_3[$key] : null,
                        //     'scr_3'        => !empty($request->scr_3[$key]) ? $request->scr_3[$key] : null,
                        //     'break_point_3'        => !empty($request->break_point_3[$key]) ? $request->break_point_3[$key] : null,
                        //     'quote_amt_3'        => !empty($request->quote_amt_3[$key]) ? $request->quote_amt_3[$key] : null,
                        //     'rate_4'        => !empty($request->rate_4[$key]) ? $request->rate_4[$key] : null,
                        //     'scr_4'        => !empty($request->scr_4[$key]) ? $request->scr_4[$key] : null,
                        //     'break_point_4'        => !empty($request->break_point_4[$key]) ? $request->break_point_4[$key] : null,
                        //     'quote_amt_4'        => !empty($request->quote_amt_4[$key]) ? $request->quote_amt_4[$key] : null,
                        //     'rate_5'        => !empty($request->rate_5[$key]) ? $request->rate_5[$key] : null,
                        //     'scr_5'        => !empty($request->scr_5[$key]) ? $request->scr_5[$key] : null,
                        //     'break_point_5'        => !empty($request->break_point_5[$key]) ? $request->break_point_5[$key] : null,
                        //     'quote_amt_5'        => !empty($request->quote_amt_5[$key]) ? $request->quote_amt_5[$key] : null,
                        //     'rate_6'        => !empty($request->rate_6[$key]) ? $request->rate_6[$key] : null,
                        //     'scr_6'        => !empty($request->scr_6[$key]) ? $request->scr_6[$key] : null,
                        //     'break_point_6'        => !empty($request->break_point_6[$key]) ? $request->break_point_6[$key] : null,
                        //     'quote_amt_6'        => !empty($request->quote_amt_6[$key]) ? $request->quote_amt_6[$key] : null,
                        //     'rate_7'        => !empty($request->rate_7[$key]) ? $request->rate_7[$key] : null,
                        //     'scr_7'        => !empty($request->scr_7[$key]) ? $request->scr_7[$key] : null,
                        //     'break_point_7'        => !empty($request->break_point_7[$key]) ? $request->break_point_7[$key] : null,
                        //     'quote_amt_7'        => !empty($request->quote_amt_7[$key]) ? $request->quote_amt_7[$key] : null,
                        //     'rate_8'        => !empty($request->rate_8[$key]) ? $request->rate_8[$key] : null,
                        //     'scr_8'        => !empty($request->scr_8[$key]) ? $request->scr_8[$key] : null,
                        //     'break_point_8'        => !empty($request->break_point_8[$key]) ? $request->break_point_8[$key] : null,
                        //     'quote_amt_8'        => !empty($request->quote_amt_8[$key]) ? $request->quote_amt_8[$key] : null,
                        //     'rate_9'        => !empty($request->rate_9[$key]) ? $request->rate_9[$key] : null,
                        //     'scr_9'        => !empty($request->scr_9[$key]) ? $request->scr_9[$key] : null,
                        //     'break_point_9'        => !empty($request->break_point_9[$key]) ? $request->break_point_9[$key] : null,
                        //     'quote_amt_9'        => !empty($request->quote_amt_9[$key]) ? $request->quote_amt_9[$key] : null,
                        //     'rate_10'        => !empty($request->rate_10[$key]) ? $request->rate_10[$key] : null,
                        //     'scr_10'        => !empty($request->scr_10[$key]) ? $request->scr_10[$key] : null,
                        //     'break_point_10'        => !empty($request->break_point_10[$key]) ? $request->break_point_10[$key] : null,
                        //     'quote_amt_10'        => !empty($request->quote_amt_10[$key]) ? $request->quote_amt_10[$key] : null,
                        //     'created_at' => now(),
                        //     'updated_at' => now(),
                        // ];

                        $result_sd2 = [];
                        if ($request->item_code_s_d2[0] != null) {
                            foreach ($request->fchsub_code as $key2 => $val2) {
                                $result_sd2[] = [
                                    'air_quotation_id'    =>   $air_quot->id,
                                    'air_quotation_d1_code' => $val2,
                                    'item_code_s_d2'     => !empty($request->item_code_s_d2[$key2]) ? $request->item_code_s_d2[$key2] : null,
                                    'item_desc_s_d2'     => !empty($request->item_desc_s_d2[$key2]) ? $request->item_desc_s_d2[$key2] : null,
                                    'qty_s_d2'     => !empty($request->qty_s_d2[$key2]) ? $request->qty_s_d2[$key2] : null,
                                    'awb_code_s_d2'     => !empty($request->awb_code_s_d2[$key2]) ? $request->awb_code_s_d2[$key2] : null,
                                    'uom_s_d2'     => !empty($request->uom_s_d2[$key2]) ? $request->uom_s_d2[$key2] : null,
                                    'chg_s_d2'     => !empty($request->chg_s_d2[$key2]) ? $request->chg_s_d2[$key2] : null,
                                    'vat_code_s_d2'     => !empty($request->vat_code_s_d2[$key2]) ? $request->vat_code_s_d2[$key2] : null,
                                    'p_c_s_d2'     => !empty($request->p_c_s_d2[$key2]) ? $request->p_c_s_d2[$key2] : null,
                                    'due_s_d2'     => !empty($request->due_s_d2[$key2]) ? $request->due_s_d2[$key2] : null,
                                    'chg_unit_s_d2'     => !empty($request->chg_unit_s_d2[$key2]) ? $request->chg_unit_s_d2[$key2] : null,
                                    'rate_s_d2'     => !empty($request->rate_s_d2[$key2]) ? $request->rate_s_d2[$key2] : null,
                                    'currency_s_d2'     => !empty($request->currency_s_d2[$key2]) ? $request->currency_s_d2[$key2] : null,
                                    'curr_rate_s_d2'     => !empty($request->curr_rate_s_d2[$key2]) ? str_replace(",", "", $request->curr_rate_s_d2[$key2])  : null,
                                    'min_amt_s_d2'     => !empty($request->min_amt_s_d2[$key2]) ? str_replace(",", "", $request->min_amt_s_d2[$key2])  : null,
                                    'unit_rate_s_d2'     => !empty($request->unit_rate_s_d2[$key2]) ?  str_replace(",", "", $request->unit_rate_s_d2[$key2])  : null,
                                    'idr_amt_s_d2'     => !empty($request->idr_amt_s_d2[$key2]) ?  str_replace(",", "", $request->idr_amt_s_d2[$key2])  : null,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ];
                            }
                        }
                    }
                    AirQuotationD1::insert($result_d1);
                    // AirQuotationSD1::insert($result_sd1);
                    AirQuotationSD2::insert($result_sd2);
                }

                //SAVE TO TABLE AIR QUOTATION D2
                $result_d2 = [];
                $air_quot->air_quotation_d2()->forceDelete();
                if ($request->item_code_d2[0] !=  null) {
                    foreach (array_unique($request->item_code_d2) as $key3 => $val3) {
                        $result_d2[] = [
                            'air_quotation_id'    =>   $air_quot->id,
                            'item_code_d2'     => $val3,
                            'item_desc_d2'     => !empty($request->item_desc_d2[$key3]) ? $request->item_desc_d2[$key3] : null,
                            'qty_d2'     => !empty($request->qty_d2[$key3]) ? $request->qty_d2[$key3] : null,
                            'awb_code_d2'     => !empty($request->awb_code_d2[$key3]) ? $request->awb_code_d2[$key3] : null,
                            'uom_d2'     => !empty($request->uom_d2[$key3]) ? $request->uom_d2[$key3] : null,
                            'chg_d2'     => !empty($request->chg_d2[$key3]) ? $request->chg_d2[$key3] : null,
                            'vat_code_d2'     => !empty($request->vat_code_d2[$key3]) ? $request->vat_code_d2[$key3] : null,
                            'p_c_d2'     => !empty($request->p_c_d2[$key3]) ? $request->p_c_d2[$key3] : null,
                            'chg_unit_d2'     => !empty($request->chg_unit_d2[$key3]) ? $request->chg_unit_d2[$key3] : null,
                            'due_d2'     => !empty($request->due_d2[$key3]) ? $request->due_d2[$key3] : null,
                            'rate_d2'     => !empty($request->rate_d2[$key3]) ? $request->rate_d2[$key3] : null,
                            'currency_d2'     => !empty($request->currency_d2[$key3]) ? $request->currency_d2[$key3] : null,
                            'curr_rate_d2'     => !empty($request->curr_rate_d2[$key3]) ? str_replace(",", "", $request->curr_rate_d2[$key3])  : null,
                            'unit_rate_d2'     => !empty($request->unit_rate_d2[$key3]) ? str_replace(",", "", $request->unit_rate_d2[$key3])  : null,
                            'min_amt_d2'     => !empty($request->min_amt_d2[$key3]) ? str_replace(",", "", $request->min_amt_d2[$key3])  : null,
                            'idr_amt_d2'     => !empty($request->idr_amt_d2[$key3]) ? str_replace(",", "", $request->idr_amt_d2[$key3])  : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    AirQuotationD2::insert($result_d2);
                }

                //SAVE TO TABLE ADDITIONAL INFO OR Extra Info OR REMARK
                $add_info = AddInfo::where('trx_type', 'AQ')->first()->makeHidden(['trx_type', 'created_at', 'updated_at'])->toarray();
                $add_info =  collect($add_info)->filter(function ($value) {
                    return !is_null($value);
                });

                $data_info = [];
                foreach ($add_info as $key => $val) {
                    $test = str_replace('k', 'v', $key);
                    $data_info[$test] = $request->input($test) == "yes" ? true : $request->input($test);
                }
                unset($data_info['id']);

                if (!empty($data_info['vs1'])  || !empty($data_info['vs2']) || !empty($data_info['vs3']) || !empty($data_info['vs4']) || !empty($data_info['vn1']) || !empty($data_info['vn2']) || !empty($data_info['vt1']) || !empty($data_info['vt2']) || !empty($data_info['vb1']) || !empty($data_info['vb2']) || !empty($data_info['vd1']) || !empty($data_info['vd2']) || !empty($data_info['vdt1']) || !empty($data_info['vdt2'])) {
                    $add_info_d1 = AddInfoD1::where('trx_id', $air_quot->id)->first();
                    $add_info_d1->add_info_id = $add_info['id'];
                    $add_info_d1->trx_type = 'AQ';
                    $add_info_d1->trx_id = $air_quot->id;
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
                    $add_info_d1->update();
                }

                DB::commit();
                return to_route('air_quot.index')->with('success', 'Air Freight Quotation has been updated!');
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
    public function destroy(AirQuotation $air_quot)
    {
        if (Auth::user()->hasPermission('delete-air_quot')) {
            try {
                $air_quot->delete();

                $air_quot->quotation()->delete();

                return to_route('air_quot.index')->with('success', 'Air Freight Quotation has been deleted!');
            } catch (\Throwable $th) {
                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
        } else {
            abort(403);
        }
    }

    public function pdf($id)
    {
        $air_quot = AirQuotation::with(['quotation',  'air_quotation_d1', 'air_quotation_d2.vat.vat_code_detail_satu'])->where('id', $id)->first();
        $aq_d1 = AirQuotationD1::with('air_quotation_s_d2.vat.vat_code_detail_satu')->where('air_quotation_id', $id)->get()->toArray();
        $company = Company::with('company_detail_satu')->first();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('trx.air_quot.export_pdf', [
            'aq'    => $air_quot,
            'aq_d1' => $aq_d1,
            'company'   => $company
        ])->setPaper('a4', 'portrait');
        return $pdf->stream('laporan.pdf');
    }
}
