<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\AddInfo;
use App\Models\Company;
use App\Models\History;
use Barryvdh\DomPDF\PDF;
use App\Models\AddInfoD1;
use App\Models\Quotation;
use App\Models\ChargeTable;
use App\Models\SeaQuotation;
use Illuminate\Http\Request;
use App\Models\SeaQuotationD1;
use App\Models\SeaQuotationD2;
use App\Models\SeaQuotationSD1;
use Yajra\DataTables\DataTables;
use App\Models\CompanyDetailSatu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class SeaQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-sea_quot')) {
            if ($request->ajax()) {
                if (!empty(auth()->user()->salesman_code)) {
                    $sea_quot = SeaQuotation::with('quotation')->whereHas('quotation', function ($query) {
                        $query->whereIn('salesman_code', explode(",", auth()->user()->salesman_code));
                    })->orderBy('sea_quotations.id', 'DESC')->select('*');
                } else {
                    $sea_quot = SeaQuotation::with('quotation')->orderBy('sea_quotations.id', 'DESC')->select('*');
                }
                return DataTables::of($sea_quot)
                    ->addColumn('action', function ($sea_quot) {
                        return view('datatable-modal._action_trx', [
                            'row_id' => $sea_quot->id,
                            'edit_url' => route('sea_quot.edit', $sea_quot->id),
                            'delete_url' => route('sea_quot.destroy', $sea_quot->id),
                            'pdf_url' => route('pdf.sea', $sea_quot->id),
                            'can_edit' => 'edit-sea_quot',
                            'can_delete' => 'delete-sea_quot'
                        ]);
                    })
                    ->editColumn('updated_at', function ($sea_quot) {
                        return !empty($sea_quot->updated_at) ? date("d-m-Y H:i", strtotime($sea_quot->updated_at)) : "-";
                    })
                    ->editColumn('effective_date', function ($sea_quot) {
                        return !empty($sea_quot->effective_date) ? date("d-m-Y", strtotime($sea_quot->effective_date)) : "-";
                    })
                    ->editColumn('expiry_date', function ($sea_quot) {
                        return !empty($sea_quot->expiry_date) ? date("d-m-Y", strtotime($sea_quot->expiry_date)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action', 'effective_date', 'expiry_date'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Sea Freight Quotation')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Sea Freight Quotation')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Freight Quotation',
                    'url_menu'  => route('sea_quot.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Freight Quotation',
                    'url_menu'  => route('sea_quot.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('trx.sea_quot.index');
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
        if (Auth::user()->hasPermission('create-sea_quot')) {
            $add_info = AddInfo::where('trx_type', 'SQ')->first()->makeHidden(['id', 'trx_type', 'created_at', 'updated_at'])->toarray();
            $add_info =  collect($add_info)->filter(function ($value) {
                return !is_null($value);
            });
            return view('trx.sea_quot.create', compact('add_info'));
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
        if (Auth::user()->hasPermission('create-sea_quot')) {
            $request->validate(
                [
                    'sea_quot_no'    => 'required|max:15|unique:sea_quotations,sea_quot_no',
                    'quotation_type_id'  => 'required',
                    'salesman_code'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $sea_quot = new SeaQuotation();
                $sea_quot_no = CodeNumbering::custom_code('31', $sea_quot, 'sea_quot_no');

                // SAVE TO TABLE QUOTATION
                $quot = new Quotation();
                $quot->sea_quot_no = $sea_quot_no;
                $quot->title = !empty($request->title) ? $request->title : null;
                $quot->effective_date = !empty($request->effective_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->effective_date))) : null;
                $quot->expiry_date = !empty($request->expiry_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->expiry_date))) : null;
                $quot->validity_day = !empty($request->validity_day) ? $request->validity_day : null;
                $quot->quotation_type_id = !empty($request->quotation_type_id) ? $request->quotation_type_id : 0;
                $quot->job_type_id = !empty($request->job_type_id) ? $request->job_type_id : 0;
                $quot->salesman = !empty($request->salesman) ? $request->salesman : null;
                $quot->customer_code = !empty($request->customer_code) ? $request->customer_code : null;
                $quot->customer = !empty($request->customer) ? $request->customer : null;
                $quot->commodity_code = !empty($request->commodity_code_name) ? $request->commodity_code_name : null;
                $quot->commodity = !empty($request->commodity) ? $request->commodity : null;
                $quot->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $quot->delivery_type = !empty($request->delivery_type_name) ? $request->delivery_type_name : null;
                $quot->term_code = !empty($request->term_code) ? $request->term_code : null;
                $quot->term = !empty($request->term) ? $request->term : null;
                $quot->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $quot->uom = !empty($request->uom_name) ? $request->uom_name : null;
                $quot->address_1 = !empty($request->address_1) ? $request->address_1 : null;
                $quot->address_2 = !empty($request->address_2) ? $request->address_2 : null;
                $quot->address_3 = !empty($request->address_3) ? $request->address_3 : null;
                $quot->address_4 = !empty($request->address_4) ? $request->address_4 : null;
                $quot->contact_name = !empty($request->contact_name) ? $request->contact_name : null;
                $quot->telp = !empty($request->telp) ? $request->telp : null;
                $quot->fax = !empty($request->fax) ? $request->fax : null;
                $quot->email = !empty($request->email) ? $request->email : null;
                $quot->salesman_code = !empty($request->salesman_code) ? $request->salesman_code : null;
                $quot->currency_id = !empty($request->currency_id) ? $request->currency_id : null;
                $quot->delivery_type_id = !empty($request->delivery_type_id) ? $request->delivery_type_id : null;
                $quot->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $quot->commodity_id = !empty($request->commodity_id) ? $request->commodity_id : null;
                $quot->pcs = !empty($request->pcs) ? $request->pcs : null;
                $quot->uom_id = !empty($request->uom_id) ? $request->uom_id : null;
                $quot->total_gross = !empty($request->total_gross) ? str_replace(",", "", $request->total_gross)  : null;
                $quot->total_volume = !empty($request->total_volume) ? str_replace(",", "", $request->total_volume) : null;
                $quot->create_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $quot->save();

                // SAVE TO TABLE SEA QUOTATION
                $sea_quot->quotation_id = $quot->id;
                $sea_quot->sea_quot_no = $sea_quot_no;
                $sea_quot->jml_container_type_1 = !empty($request->jml_container_type_1) ? $request->jml_container_type_1 : null;
                $sea_quot->container_type_1 = !empty($request->container_type_1) ? $request->container_type_1 : null;
                $sea_quot->jml_container_type_2 = !empty($request->jml_container_type_2) ? $request->jml_container_type_2 : null;
                $sea_quot->container_type_2 = !empty($request->container_type_2) ? $request->container_type_2 : null;
                $sea_quot->jml_container_type_3 = !empty($request->jml_container_type_3) ? $request->jml_container_type_3 : null;
                $sea_quot->container_type_3 = !empty($request->container_type_3) ? $request->container_type_3 : null;
                $sea_quot->jml_container_type_4 = !empty($request->jml_container_type_4) ? $request->jml_container_type_4 : null;
                $sea_quot->container_type_4 = !empty($request->container_type_4) ? $request->container_type_4 : null;
                $sea_quot->agent_code = !empty($request->agent_code) ? $request->agent_code : null;
                $sea_quot->agent_name = !empty($request->agent_name) ? $request->agent_name : null;
                $sea_quot->agent_address_1 = !empty($request->agent_address_1) ? $request->agent_address_1 : null;
                $sea_quot->agent_address_2 = !empty($request->agent_address_2) ? $request->agent_address_2 : null;
                $sea_quot->agent_address_3 = !empty($request->agent_address_3) ? $request->agent_address_3 : null;
                $sea_quot->agent_address_4 = !empty($request->agent_address_4) ? $request->agent_address_4 : null;
                $sea_quot->shipper_code = !empty($request->shipper_code) ? $request->shipper_code : null;
                $sea_quot->shipper_name = !empty($request->shipper_name) ? $request->shipper_name : null;
                $sea_quot->shipper_address_1 = !empty($request->shipper_address_1) ? $request->shipper_address_1 : null;
                $sea_quot->shipper_address_2 = !empty($request->shipper_address_2) ? $request->shipper_address_2 : null;
                $sea_quot->shipper_address_3 = !empty($request->shipper_address_3) ? $request->shipper_address_3 : null;
                $sea_quot->shipper_address_4 = !empty($request->shipper_address_4) ? $request->shipper_address_4 : null;
                $sea_quot->consignee_code = !empty($request->consignee_code) ? $request->consignee_code : null;
                $sea_quot->consignee_name = !empty($request->consignee_name) ? $request->consignee_name : null;
                $sea_quot->consignee_address_1 = !empty($request->consignee_address_1) ? $request->consignee_address_1 : null;
                $sea_quot->consignee_address_2 = !empty($request->consignee_address_2) ? $request->consignee_address_2 : null;
                $sea_quot->consignee_address_3 = !empty($request->consignee_address_3) ? $request->consignee_address_3 : null;
                $sea_quot->consignee_address_4 = !empty($request->consignee_address_4) ? $request->consignee_address_4 : null;
                $sea_quot->save();

                //SAVE TO TABLE SEA QUOTATION D1 AND SUB D1
                $result_sd1 = [];
                $result_d1 = [];
                if ($request->port_loading_code[0] != null) {
                    foreach ($request->fch_code as $key => $val) {
                        $result_d1[] = [
                            'sea_quotation_id' => $sea_quot->id,
                            'code'  => $val,
                            'port_loading_code' => !empty($request->port_loading_code[$key]) ? $request->port_loading_code[$key] : null,
                            'port_loading_name'       => !empty($request->port_loading_name[$key]) ? $request->port_loading_name[$key] : null,
                            'port_discharge_code'       => !empty($request->port_discharge_code[$key]) ? $request->port_discharge_code[$key] : null,
                            'port_discharge_name'       => !empty($request->port_discharge_name[$key]) ? $request->port_discharge_name[$key] : null,
                            'via_port_code'       => !empty($request->via_port_code[$key]) ? $request->via_port_code[$key] : null,
                            'via_port_name'       => !empty($request->via_port_name[$key]) ? $request->via_port_name[$key] : null,
                            'second_port_code'       => !empty($request->second_port_code[$key]) ? $request->second_port_code[$key] : null,
                            'second_port_name'       => !empty($request->second_port_name[$key]) ? $request->second_port_name[$key] : null,
                            'third_port_code'       => !empty($request->third_port_code[$key]) ? $request->third_port_code[$key] : null,
                            'third_port_name'       => !empty($request->third_port_name[$key]) ? $request->third_port_name[$key] : null,
                            'shipping_line_code'       => !empty($request->shipping_line_code[$key]) ? $request->shipping_line_code[$key] : null,
                            'shipping_line_name'       => !empty($request->shipping_line_name[$key]) ? $request->shipping_line_name[$key] : null,
                            'transit_time'       => !empty($request->transit_time[$key]) ? $request->transit_time[$key] : null,
                            'frequency'       => !empty($request->frequency[$key]) ? $request->frequency[$key] : null,
                            'note_code'       => !empty($request->note_code[$key]) ? $request->note_code[$key] : null,
                            'note'       => !empty($request->note[$key]) ? $request->note[$key] : null,
                            'origin_code'       => !empty($request->origin_code[$key]) ? $request->origin_code[$key] : null,
                            'origin_name'       => !empty($request->origin_name[$key]) ? $request->origin_name[$key] : null,
                            'dest_code'       => !empty($request->dest_code[$key]) ? $request->dest_code[$key] : null,
                            'dest_name'       => !empty($request->dest_name[$key]) ? $request->dest_name[$key] : null,
                            'frt_collect'       => !empty($request->frt_collect[$key]) ? $request->frt_collect[$key] : null,
                            'commodity_code'       => !empty($request->commodity_code[$key]) ? $request->commodity_code[$key] : null,
                            'commodity_name'       => !empty($request->commodity_name[$key]) ? $request->commodity_name[$key] : null,
                            'delivery_type'       => !empty($request->delivery_type[$key]) ? $request->delivery_type[$key] : null,
                            'delivery_name'       => !empty($request->delivery_name[$key]) ? $request->delivery_name[$key] : null,
                            'total_amt'       => !empty($request->total_amt[$key]) ? str_replace(",", "", $request->total_amt[$key])  : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        $result_sd1 = [];
                        if ($request->item_code[0] != null) {
                            foreach ($request->fchsub_code as $key2 => $val2) {
                                $result_sd1[] = [
                                    'sea_quotation_id'    =>   $sea_quot->id,
                                    'sea_quotation_d1_code' => $val2,
                                    'item_code'     => !empty($request->item_code[$key2]) ? $request->item_code[$key2] : null,
                                    'item_desc'     => !empty($request->item_desc[$key2]) ? $request->item_desc[$key2] : null,
                                    'qty'     => !empty($request->qty[$key2]) ? $request->qty[$key2] : null,
                                    'cargo'     => !empty($request->cargo[$key2]) ? $request->cargo[$key2] : null,
                                    'dg'     => !empty($request->dg[$key2]) ? $request->dg[$key2] : null,
                                    'uom'     => !empty($request->uom_sub[$key2]) ? $request->uom_sub[$key2] : null,
                                    'chg'     => !empty($request->chg[$key2]) ? $request->chg[$key2] : null,
                                    'vat_code'     => !empty($request->vat_code[$key2]) ? $request->vat_code[$key2] : null,
                                    'p_c'     => !empty($request->p_c[$key2]) ? $request->p_c[$key2] : null,
                                    'chg_unit'     => !empty($request->chg_unit[$key2]) ? $request->chg_unit[$key2] : null,
                                    'container'     => !empty($request->container[$key2]) ? $request->container[$key2] : null,
                                    'rate'     => !empty($request->rate[$key2]) ? $request->rate[$key2] : null,
                                    'currency'     => !empty($request->currency[$key2]) ? $request->currency[$key2] : null,
                                    'curr_rate'     => !empty($request->curr_rate[$key2]) ? str_replace(",", "", $request->curr_rate[$key2])  : null,
                                    'min_amt'     => !empty($request->min_amt[$key2]) ? str_replace(",", "", $request->min_amt[$key2])  : null,
                                    'unit_rate'     => !empty($request->unit_rate[$key2]) ?  str_replace(",", "", $request->unit_rate[$key2])  : null,
                                    'idr_amt'     => !empty($request->idr_amt[$key2]) ?  str_replace(",", "", $request->idr_amt[$key2])  : null,
                                    'amt'     => !empty($request->amt[$key2]) ?  str_replace(",", "", $request->amt[$key2])  : null,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ];
                            }
                        }
                    }
                    SeaQuotationD1::insert($result_d1);
                    SeaQuotationSD1::insert($result_sd1);
                }

                //SAVE TO TABLE SEA QUOTATION D2
                $result_d2 = [];
                if ($request->item_code_d2[0] !=  null) {
                    foreach (array_unique($request->item_code_d2) as $key3 => $val3) {
                        $result_d2[] = [
                            'sea_quotation_id'    =>   $sea_quot->id,
                            'item_code'     => $val3,
                            'item_desc'     => !empty($request->item_desc_d2[$key3]) ? $request->item_desc_d2[$key3] : null,
                            'qty'     => !empty($request->qty_d2[$key3]) ? $request->qty_d2[$key3] : null,
                            'cargo'     => !empty($request->cargo_d2[$key3]) ? $request->cargo_d2[$key3] : null,
                            'dg'     => !empty($request->dg_d2[$key3]) ? $request->dg_d2[$key3] : null,
                            'uom'     => !empty($request->uom_d2[$key3]) ? $request->uom_d2[$key3] : null,
                            'chg'     => !empty($request->chg_d2[$key3]) ? $request->chg_d2[$key3] : null,
                            'vat_code'     => !empty($request->vat_code_d2[$key3]) ? $request->vat_code_d2[$key3] : null,
                            'p_c'     => !empty($request->p_c_d2[$key3]) ? $request->p_c_d2[$key3] : null,
                            'chg_unit'     => !empty($request->chg_unit_d2[$key3]) ? $request->chg_unit_d2[$key3] : null,
                            'container'     => !empty($request->container_d2[$key3]) ? $request->container_d2[$key3] : null,
                            'rate'     => !empty($request->rate_d2[$key3]) ? $request->rate_d2[$key3] : null,
                            'currency'     => !empty($request->currency_d2[$key3]) ? $request->currency_d2[$key3] : null,
                            'curr_rate'     => !empty($request->curr_rate_d2[$key3]) ? str_replace(",", "", $request->curr_rate_d2[$key3])  : null,
                            'unit_rate'     => !empty($request->unit_rate_d2[$key3]) ? str_replace(",", "", $request->unit_rate_d2[$key3])  : null,
                            'min_amt'     => !empty($request->min_amt_d2[$key3]) ? str_replace(",", "", $request->min_amt_d2[$key3])  : null,
                            'idr_amt'     => !empty($request->idr_amt_d2[$key3]) ? str_replace(",", "", $request->idr_amt_d2[$key3])  : null,
                            'amt'     => !empty($request->amt_d2[$key3]) ? str_replace(",", "", $request->amt_d2[$key3])  : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    SeaQuotationD2::insert($result_d2);
                }

                //SAVE TO TABLE ADDITIONAL INFO OR Extra Info OR REMARK
                $add_info = AddInfo::where('trx_type', 'SQ')->first()->makeHidden(['trx_type', 'created_at', 'updated_at'])->toarray();
                $add_info =  collect($add_info)->filter(function ($value) {
                    return !is_null($value);
                });

                $data_info = [];
                foreach ($add_info as $key => $val) {
                    $test = str_replace('k', 'v', $key);
                    $data_info[$test] = $request->input($test) == "yes" ? true : $request->input($test);
                }
                unset($data_info['id']);

                $cek_info_d1 = AddInfoD1::where('trx_id', $sea_quot->id)->first();
                if ($cek_info_d1 == null) {
                    $add_info_d1 = new AddInfoD1();
                } else {
                    $add_info_d1 = AddInfoD1::where('trx_id', $sea_quot->id)->first();
                }
                $add_info_d1->add_info_id = $add_info['id'];
                $add_info_d1->trx_type = 'SQ';
                $add_info_d1->trx_id = $sea_quot->id;
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
                return to_route('sea_quot.index')->with('success', 'New Sea Freight Quotation has been added!');
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
        if (Auth::user()->hasPermission('edit-sea_quot')) {
            $sea_quot = SeaQuotation::with(['quotation', 'sea_quotation_d1', 'sea_quotation_d2'])->where('id', $id)->first();
            $sq_d1 = SeaQuotationD1::with('sea_quotation_s_d1')->where('sea_quotation_id', $id)->get();
            $sq = $sea_quot;
            $add_info_d1 = AddInfoD1::where('trx_id', $id)->first();
            $add_info = AddInfo::where('trx_type', 'SQ')->first()->makeHidden(['id', 'trx_type', 'created_at', 'updated_at'])->toarray();
            $add_info =  collect($add_info)->filter(function ($value) {
                return !is_null($value);
            });
            return view('trx.sea_quot.edit', compact('add_info', 'sq', 'sq_d1', 'add_info_d1'));
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
        if (Auth::user()->hasPermission('edit-sea_quot')) {
            $request->validate(
                [
                    'sea_quot_no'    => 'required|max:15|unique:sea_quotations,sea_quot_no,' . $id,
                    'quotation_type_id'  => 'required',
                    'salesman_code'  => 'required',
                ],
            );

            try {
                $sea_quot = SeaQuotation::find($id);

                // SAVE TO TABLE QUOTATION
                $quot = Quotation::where('sea_quot_no', $sea_quot->sea_quot_no)->first();
                $quot->title = !empty($request->title) ? $request->title : null;
                $quot->effective_date = !empty($request->effective_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->effective_date)))  : null;
                $quot->expiry_date = !empty($request->expiry_date) ? date('Y-m-d', strtotime(str_replace('/', '-', $request->expiry_date))) : null;
                $quot->validity_day = !empty($request->validity_day) ? $request->validity_day : null;
                $quot->quotation_type_id = !empty($request->quotation_type_id) ? $request->quotation_type_id : 0;
                $quot->job_type_id = !empty($request->job_type_id) ? $request->job_type_id : 0;
                $quot->salesman = !empty($request->salesman) ? $request->salesman : null;
                $quot->customer_code = !empty($request->customer_code) ? $request->customer_code : null;
                $quot->customer = !empty($request->customer) ? $request->customer : null;
                $quot->commodity_code = !empty($request->commodity_code_name) ? $request->commodity_code_name : null;
                $quot->commodity = !empty($request->commodity) ? $request->commodity : null;
                $quot->delivery_type_code = !empty($request->delivery_type_code) ? $request->delivery_type_code : null;
                $quot->delivery_type = !empty($request->delivery_type_name) ? $request->delivery_type_name : null;
                $quot->term_code = !empty($request->term_code) ? $request->term_code : null;
                $quot->term = !empty($request->term) ? $request->term : null;
                $quot->uom_code = !empty($request->uom_code) ? $request->uom_code : null;
                $quot->uom = !empty($request->uom_name) ? $request->uom_name : null;
                $quot->address_1 = !empty($request->address_1) ? $request->address_1 : null;
                $quot->address_2 = !empty($request->address_2) ? $request->address_2 : null;
                $quot->address_3 = !empty($request->address_3) ? $request->address_3 : null;
                $quot->address_4 = !empty($request->address_4) ? $request->address_4 : null;
                $quot->contact_name = !empty($request->contact_name) ? $request->contact_name : null;
                $quot->telp = !empty($request->telp) ? $request->telp : null;
                $quot->fax = !empty($request->fax) ? $request->fax : null;
                $quot->email = !empty($request->email) ? $request->email : null;
                $quot->salesman_code = !empty($request->salesman_code) ? $request->salesman_code : null;
                $quot->currency_id = !empty($request->currency_id) ? $request->currency_id : null;
                $quot->delivery_type_id = !empty($request->delivery_type_id) ? $request->delivery_type_id : null;
                $quot->reference_no = !empty($request->reference_no) ? $request->reference_no : null;
                $quot->commodity_id = !empty($request->commodity_id) ? $request->commodity_id : null;
                $quot->pcs = !empty($request->pcs) ? $request->pcs : null;
                $quot->uom_id = !empty($request->uom_id) ? $request->uom_id : null;
                $quot->total_gross = !empty($request->total_gross) ? str_replace(",", "", $request->total_gross)  : null;
                $quot->total_volume = !empty($request->total_volume) ? str_replace(",", "", $request->total_volume) : null;
                $quot->update_by = auth()->user()->firstname . " " . auth()->user()->lastname;
                $quot->update();

                // SAVE TO TABLE SEA QUOTATION
                $sea_quot->quotation_id = $quot->id;

                $sea_quot->jml_container_type_1 = !empty($request->jml_container_type_1) ? $request->jml_container_type_1 : null;
                $sea_quot->container_type_1 = !empty($request->container_type_1) ? $request->container_type_1 : null;
                $sea_quot->jml_container_type_2 = !empty($request->jml_container_type_2) ? $request->jml_container_type_2 : null;
                $sea_quot->container_type_2 = !empty($request->container_type_2) ? $request->container_type_2 : null;
                $sea_quot->jml_container_type_3 = !empty($request->jml_container_type_3) ? $request->jml_container_type_3 : null;
                $sea_quot->container_type_3 = !empty($request->container_type_3) ? $request->container_type_3 : null;
                $sea_quot->jml_container_type_4 = !empty($request->jml_container_type_4) ? $request->jml_container_type_4 : null;
                $sea_quot->container_type_4 = !empty($request->container_type_4) ? $request->container_type_4 : null;
                $sea_quot->agent_code = !empty($request->agent_code) ? $request->agent_code : null;
                $sea_quot->agent_name = !empty($request->agent_name) ? $request->agent_name : null;
                $sea_quot->agent_address_1 = !empty($request->agent_address_1) ? $request->agent_address_1 : null;
                $sea_quot->agent_address_2 = !empty($request->agent_address_2) ? $request->agent_address_2 : null;
                $sea_quot->agent_address_3 = !empty($request->agent_address_3) ? $request->agent_address_3 : null;
                $sea_quot->agent_address_4 = !empty($request->agent_address_4) ? $request->agent_address_4 : null;
                $sea_quot->shipper_code = !empty($request->shipper_code) ? $request->shipper_code : null;
                $sea_quot->shipper_name = !empty($request->shipper_name) ? $request->shipper_name : null;
                $sea_quot->shipper_address_1 = !empty($request->shipper_address_1) ? $request->shipper_address_1 : null;
                $sea_quot->shipper_address_2 = !empty($request->shipper_address_2) ? $request->shipper_address_2 : null;
                $sea_quot->shipper_address_3 = !empty($request->shipper_address_3) ? $request->shipper_address_3 : null;
                $sea_quot->shipper_address_4 = !empty($request->shipper_address_4) ? $request->shipper_address_4 : null;
                $sea_quot->consignee_code = !empty($request->consignee_code) ? $request->consignee_code : null;
                $sea_quot->consignee_name = !empty($request->consignee_name) ? $request->consignee_name : null;
                $sea_quot->consignee_address_1 = !empty($request->consignee_address_1) ? $request->consignee_address_1 : null;
                $sea_quot->consignee_address_2 = !empty($request->consignee_address_2) ? $request->consignee_address_2 : null;
                $sea_quot->consignee_address_3 = !empty($request->consignee_address_3) ? $request->consignee_address_3 : null;
                $sea_quot->consignee_address_4 = !empty($request->consignee_address_4) ? $request->consignee_address_4 : null;
                $sea_quot->update();

                //SAVE TO TABLE SEA QUOTATION D1 AND SUB D1
                $result_sd1 = [];
                $result_d1 = [];
                $sea_quot->sea_quotation_d1()->forceDelete();
                $sea_quot->sea_quotation_s_d1()->forceDelete();
                if ($request->port_loading_code[0] != null) {
                    foreach ($request->fch_code as $key => $val) {
                        $result_d1[] = [
                            'sea_quotation_id' => $sea_quot->id,
                            'code'  => $val,
                            'port_loading_code' => !empty($request->port_loading_code[$key]) ? $request->port_loading_code[$key] : null,
                            'port_loading_name'       => !empty($request->port_loading_name[$key]) ? $request->port_loading_name[$key] : null,
                            'port_discharge_code'       => !empty($request->port_discharge_code[$key]) ? $request->port_discharge_code[$key] : null,
                            'port_discharge_name'       => !empty($request->port_discharge_name[$key]) ? $request->port_discharge_name[$key] : null,
                            'via_port_code'       => !empty($request->via_port_code[$key]) ? $request->via_port_code[$key] : null,
                            'via_port_name'       => !empty($request->via_port_name[$key]) ? $request->via_port_name[$key] : null,
                            'second_port_code'       => !empty($request->second_port_code[$key]) ? $request->second_port_code[$key] : null,
                            'second_port_name'       => !empty($request->second_port_name[$key]) ? $request->second_port_name[$key] : null,
                            'third_port_code'       => !empty($request->third_port_code[$key]) ? $request->third_port_code[$key] : null,
                            'third_port_name'       => !empty($request->third_port_name[$key]) ? $request->third_port_name[$key] : null,
                            'shipping_line_code'       => !empty($request->shipping_line_code[$key]) ? $request->shipping_line_code[$key] : null,
                            'shipping_line_name'       => !empty($request->shipping_line_name[$key]) ? $request->shipping_line_name[$key] : null,
                            'transit_time'       => !empty($request->transit_time[$key]) ? $request->transit_time[$key] : null,
                            'frequency'       => !empty($request->frequency[$key]) ? $request->frequency[$key] : null,
                            'note_code'       => !empty($request->note_code[$key]) ? $request->note_code[$key] : null,
                            'note'       => !empty($request->note[$key]) ? $request->note[$key] : null,
                            'origin_code'       => !empty($request->origin_code[$key]) ? $request->origin_code[$key] : null,
                            'origin_name'       => !empty($request->origin_name[$key]) ? $request->origin_name[$key] : null,
                            'dest_code'       => !empty($request->dest_code[$key]) ? $request->dest_code[$key] : null,
                            'dest_name'       => !empty($request->dest_name[$key]) ? $request->dest_name[$key] : null,
                            'frt_collect'       => !empty($request->frt_collect[$key]) ? $request->frt_collect[$key] : null,
                            'commodity_code'       => !empty($request->commodity_code[$key]) ? $request->commodity_code[$key] : null,
                            'commodity_name'       => !empty($request->commodity_name[$key]) ? $request->commodity_name[$key] : null,
                            'delivery_type'       => !empty($request->delivery_type[$key]) ? $request->delivery_type[$key] : null,
                            'delivery_name'       => !empty($request->delivery_name[$key]) ? $request->delivery_name[$key] : null,
                            'total_amt'       => !empty($request->total_amt[$key]) ? str_replace(",", "", $request->total_amt[$key])  : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        $result_sd1 = [];
                        if ($request->item_code[0] != null) {
                            foreach ($request->fchsub_code as $key2 => $val2) {
                                $result_sd1[] = [
                                    'sea_quotation_id'    =>   $sea_quot->id,
                                    'sea_quotation_d1_code' => $val2,
                                    'item_code'     => !empty($request->item_code[$key2]) ? $request->item_code[$key2] : null,
                                    'item_desc'     => !empty($request->item_desc[$key2]) ? $request->item_desc[$key2] : null,
                                    'qty'     => !empty($request->qty[$key2]) ? $request->qty[$key2] : null,
                                    'cargo'     => !empty($request->cargo[$key2]) ? $request->cargo[$key2] : null,
                                    'dg'     => !empty($request->dg[$key2]) ? $request->dg[$key2] : null,
                                    'uom'     => !empty($request->uom_sub[$key2]) ? $request->uom_sub[$key2] : null,
                                    'chg'     => !empty($request->chg[$key2]) ? $request->chg[$key2] : null,
                                    'vat_code'     => !empty($request->vat_code[$key2]) ? $request->vat_code[$key2] : null,
                                    'p_c'     => !empty($request->p_c[$key2]) ? $request->p_c[$key2] : null,
                                    'chg_unit'     => !empty($request->chg_unit[$key2]) ? $request->chg_unit[$key2] : null,
                                    'container'     => !empty($request->container[$key2]) ? $request->container[$key2] : null,
                                    'rate'     => !empty($request->rate[$key2]) ? $request->rate[$key2] : null,
                                    'currency'     => !empty($request->currency[$key2]) ? $request->currency[$key2] : null,
                                    'curr_rate'     => !empty($request->curr_rate[$key2]) ? str_replace(",", "", $request->curr_rate[$key2])  : null,
                                    'min_amt'     => !empty($request->min_amt[$key2]) ? str_replace(",", "", $request->min_amt[$key2])  : null,
                                    'unit_rate'     => !empty($request->unit_rate[$key2]) ?  str_replace(",", "", $request->unit_rate[$key2])  : null,
                                    'idr_amt'     => !empty($request->idr_amt[$key2]) ?  str_replace(",", "", $request->idr_amt[$key2])  : null,
                                    'amt'     => !empty($request->amt[$key2]) ?  str_replace(",", "", $request->amt[$key2])  : null,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ];
                            }
                        }
                    }
                    SeaQuotationD1::insert($result_d1);
                    SeaQuotationSD1::insert($result_sd1);
                }

                //SAVE TO TABLE SEA QUOTATION D2
                $result_d2 = [];
                $sea_quot->sea_quotation_d2()->forceDelete();
                if ($request->item_code_d2[0] !=  null) {
                    foreach (array_unique($request->item_code_d2) as $key3 => $val3) {
                        $result_d2[] = [
                            'sea_quotation_id'    =>   $sea_quot->id,
                            'item_code'     => $val3,
                            'item_desc'     => !empty($request->item_desc_d2[$key3]) ? $request->item_desc_d2[$key3] : null,
                            'qty'     => !empty($request->qty_d2[$key3]) ? $request->qty_d2[$key3] : null,
                            'cargo'     => !empty($request->cargo_d2[$key3]) ? $request->cargo_d2[$key3] : null,
                            'dg'     => !empty($request->dg_d2[$key3]) ? $request->dg_d2[$key3] : null,
                            'uom'     => !empty($request->uom_d2[$key3]) ? $request->uom_d2[$key3] : null,
                            'chg'     => !empty($request->chg_d2[$key3]) ? $request->chg_d2[$key3] : null,
                            'vat_code'     => !empty($request->vat_code_d2[$key3]) ? $request->vat_code_d2[$key3] : null,
                            'p_c'     => !empty($request->p_c_d2[$key3]) ? $request->p_c_d2[$key3] : null,
                            'chg_unit'     => !empty($request->chg_unit_d2[$key3]) ? $request->chg_unit_d2[$key3] : null,
                            'container'     => !empty($request->container_d2[$key3]) ? $request->container_d2[$key3] : null,
                            'rate'     => !empty($request->rate_d2[$key3]) ? $request->rate_d2[$key3] : null,
                            'currency'     => !empty($request->currency_d2[$key3]) ? $request->currency_d2[$key3] : null,
                            'curr_rate'     => !empty($request->curr_rate_d2[$key3]) ? str_replace(",", "", $request->curr_rate_d2[$key3])  : null,
                            'unit_rate'     => !empty($request->unit_rate_d2[$key3]) ? str_replace(",", "", $request->unit_rate_d2[$key3])  : null,
                            'min_amt'     => !empty($request->min_amt_d2[$key3]) ? str_replace(",", "", $request->min_amt_d2[$key3])  : null,
                            'idr_amt'     => !empty($request->idr_amt_d2[$key3]) ? str_replace(",", "", $request->idr_amt_d2[$key3])  : null,
                            'amt'     => !empty($request->amt_d2[$key3]) ? str_replace(",", "", $request->amt_d2[$key3])  : null,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    SeaQuotationD2::insert($result_d2);
                }

                //SAVE TO TABLE ADDITIONAL INFO OR Extra Info OR REMARK
                $add_info = AddInfo::where('trx_type', 'SQ')->first()->makeHidden(['trx_type', 'created_at', 'updated_at'])->toarray();
                $add_info =  collect($add_info)->filter(function ($value) {
                    return !is_null($value);
                });

                $data_info = [];
                foreach ($add_info as $key => $val) {
                    $test = str_replace('k', 'v', $key);
                    $data_info[$test] = $request->input($test) == "yes" ? true : $request->input($test);
                }
                unset($data_info['id']);

                $cek_info_d1 = AddInfoD1::where('trx_id', $sea_quot->id)->first();
                if ($cek_info_d1 == null) {
                    $add_info_d1 = new AddInfoD1();
                } else {
                    $add_info_d1 = AddInfoD1::where('trx_id', $sea_quot->id)->first();
                }
                $add_info_d1->add_info_id = $add_info['id'];
                $add_info_d1->trx_type = 'SQ';
                $add_info_d1->trx_id = $sea_quot->id;
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
                return to_route('sea_quot.index')->with('success', 'Sea Freight Quotation has been updated!');
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
    public function destroy(SeaQuotation $sea_quot)
    {
        if (Auth::user()->hasPermission('delete-sea_quot')) {
            try {
                $sea_quot->delete();

                $sea_quot->quotation()->delete();

                return to_route('sea_quot.index')->with('success', 'Sea Freight Quotation has been deleted!');
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

    public function pdf($id)
    {
        $sea_quot = SeaQuotation::with(['quotation', 'sea_quotation_d1', 'sea_quotation_d2.vat.vat_code_detail_satu'])->where('id', $id)->first();
        $sq_d1 = SeaQuotationD1::with('sea_quotation_s_d1.vat.vat_code_detail_satu')->where('sea_quotation_id', $id)->get()->toArray();
        $company = Company::first();
        $company_detail = CompanyDetailSatu::where('company_id', $company->id)->where('type', 'Head Office')->first();
        $add_info_d1 = AddInfoD1::where('trx_id', $id)->first();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('trx.sea_quot.export_pdf', [
            'sq'    => $sea_quot,
            'sq_d1' => $sq_d1,
            'company'   => $company,
            'company_detail'   => $company_detail,
            'add_info_d1' => $add_info_d1,
        ])->setPaper('a4', 'portrait');
        return $pdf->stream('laporan.pdf');
    }
}
