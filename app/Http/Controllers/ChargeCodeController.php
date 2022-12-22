<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use App\Models\WtCode;
use App\Models\History;
use App\Models\JobType;
use App\Models\VatCode;
use App\Models\Currency;
use App\Models\ChargeCode;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\ChargeCodeDetail1;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChargeCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-charge_code')) {
            if ($request->ajax()) {
                $charge_code = ChargeCode::all()->sortByDesc("charge_code.id");
                return DataTables::of($charge_code)
                    ->addColumn('action', function ($charge_code) {
                        return view('datatable-modal._action', [
                            'row_id' => $charge_code->id,
                            'edit_url' => route('charge_code.edit', $charge_code->id),
                            'delete_url' => route('charge_code.destroy', $charge_code->id),
                            'can_edit' => 'edit-charge_code',
                            'can_delete' => 'delete-charge_code'
                        ]);
                    })
                    ->editColumn('updated_at', function ($charge_code) {
                        return !empty($charge_code->updated_at) ? date("d-m-Y H:i", strtotime($charge_code->updated_at)) : "-";
                    })
                    // ->editColumn('job_type', function ($charge_code) {
                    //     return $charge_code->job_type->type;
                    // })
                    // ->editColumn('vat_code', function ($charge_code) {
                    //     return $charge_code->vat_code->code;
                    // })
                    // ->editColumn('curr_code', function ($charge_code) {
                    //     return $charge_code->currency->code;
                    // })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Charge Code',
                    'url_menu'  => route('charge_code.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Charge Code',
                    'url_menu'  => route('charge_code.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.charge.index');
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
        if (Auth::user()->hasPermission('create-charge_code')) {
            return view('master.charge.create');
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
        if (Auth::user()->hasPermission('create-charge_code')) {
            $request->validate(
                [
                    'item_code'    => 'required|max:30|unique:charge_code,item_code',
                    'item_description'  => 'max:50',
                    'cost_ammount'     => 'max:17',
                    'cost_percent'     => 'max:17',
                    'sales_acc_code'     => 'max:15',
                    'cost_acc_code'     => 'max:15',
                    'sales_provision_acc_code'     => 'max:15',
                    'provision_acc_code'     => 'max:15',
                    'sales_analysis_code'     => 'max:10',
                    'item_short_code'     => 'max:10',
                    'cost_analysis_code'     => 'max:10',
                    'site_code'     => 'max:20',
                ],
                [
                    'cost_ammount.max' => 'Max 11,2 digits',
                    'cost_percent.max' => 'Max 11,2 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $charge_code = new ChargeCode();
                $charge_code->item_code = $request->item_code;
                $charge_code->item_description = $request->item_description;
                $charge_code->local_name = $request->local_name;
                $charge_code->charge_type = $request->charge_type;
                $charge_code->job_type_id = $request->job_type_id;
                $charge_code->dept_code = $request->dept_code;
                $charge_code->sales_acc_code = $request->sales_acc_code;
                $charge_code->sales_acc_desc = $request->sales_acc_desc;
                $charge_code->cost_acc_code = $request->cost_acc_code;
                $charge_code->cost_acc_desc = $request->cost_acc_desc;
                $charge_code->sales_provision_acc_code = $request->sales_provision_acc_code;
                $charge_code->sales_provision_acc_desc = $request->sales_provision_acc_desc;
                $charge_code->provision_acc_code = $request->provision_acc_code;
                $charge_code->provision_acc_desc = $request->provision_acc_desc;
                $charge_code->currency_id = $request->currency_id;
                $charge_code->uom_id = $request->uom_id;
                $charge_code->consolidation_item_code = $request->consolidation_item_code;
                $charge_code->consolidation_item_desc = $request->consolidation_item_desc;
                $charge_code->sales_analysis_code = $request->sales_analysis_code;
                $charge_code->wt_code_id = $request->wt_code_id;
                $charge_code->cost_ammount = ($request->cost_ammount != null) ?  str_replace(",", "", $request->cost_ammount) : 0;
                $charge_code->cost_percent = ($request->cost_percent != null) ?  str_replace(",", "", $request->cost_percent) : 0;
                $charge_code->item_short_code = $request->item_short_code;
                $charge_code->recoverable =  ($request->recoverable == "yes") ? true : false;
                $charge_code->split_by_method = $request->split_by_method;
                $charge_code->charge_unit = $request->charge_unit;
                $charge_code->cost_center_code = $request->cost_center_code;
                $charge_code->vat_code_id = $request->vat_code_id;
                $charge_code->cost_code = $request->cost_code;
                $charge_code->cost_code_desc = $request->cost_code_desc;
                $charge_code->lock = ($request->lock == "yes") ? true : false;
                $charge_code->cost_analysis_code = $request->cost_analysis_code;
                $charge_code->sales_cost = $request->sales_cost;
                $charge_code->site_code = $request->site_code;
                $charge_code->save();

                $result = [];
                if ($request->module != null) {
                    foreach ($request->module as $key => $val) {
                        $result[] = [
                            'charge_code_id' => $charge_code->id,
                            'module'       => $val,
                            'job_type'       => $request->job_type[$key],
                            'sales_acc_code'       => $request->sales_acc_code_detail[$key],
                            'sales_desc'       => $request->sales_desc[$key],
                            'cost_acc_code'       => $request->cost_acc_code_detail[$key],
                            'cost_desc'       => $request->cost_desc[$key],
                            'adv_acc_code'       => $request->adv_acc_code[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    ChargeCodeDetail1::insert($result);
                }

                DB::commit();
                return to_route('charge_code.index')->with('success', 'New charge code has been added!');
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
    public function edit(ChargeCode $charge_code)
    {
        if (Auth::user()->hasPermission('edit-charge_code')) {
            $cost_percent = number_format($charge_code->cost_percent, 2, ".", ",");
            $cost_ammount = number_format($charge_code->cost_ammount, 2, ".", ",");
            $c_detail = ChargeCodeDetail1::where('charge_code_id', $charge_code->id)->get();

            return view('master.charge.edit', compact('charge_code', 'cost_percent', 'cost_ammount', 'c_detail'));
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
        if (Auth::user()->hasPermission('edit-charge_code')) {
            $request->validate(
                [
                    'item_code'    => 'required|max:30|unique:charge_code,item_code,' . $id,
                    'item_description'  => 'max:50',
                    'cost_ammount'     => 'max:17',
                    'cost_percent'     => 'max:17',
                    'sales_acc_code'     => 'max:15',
                    'cost_acc_code'     => 'max:15',
                    'sales_provision_acc_code'     => 'max:15',
                    'provision_acc_code'     => 'max:15',
                    'sales_analysis_code'     => 'max:10',
                    'item_short_code'     => 'max:10',
                    'cost_analysis_code'     => 'max:10',
                    'site_code'     => 'max:20',
                ],
                [
                    'cost_ammount.max' => 'Max 11,2 digits',
                    'cost_percent.max' => 'Max 11,2 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $charge_code = ChargeCode::find($id);
                $charge_code->item_code = $request->item_code;
                $charge_code->item_description = $request->item_description;
                $charge_code->local_name = $request->local_name;
                $charge_code->charge_type = $request->charge_type;
                $charge_code->job_type_id = $request->job_type_id;
                $charge_code->dept_code = $request->dept_code;
                $charge_code->sales_acc_code = $request->sales_acc_code;
                $charge_code->sales_acc_desc = $request->sales_acc_desc;
                $charge_code->cost_acc_code = $request->cost_acc_code;
                $charge_code->cost_acc_desc = $request->cost_acc_desc;
                $charge_code->sales_provision_acc_code = $request->sales_provision_acc_code;
                $charge_code->sales_provision_acc_desc = $request->sales_provision_acc_desc;
                $charge_code->provision_acc_code = $request->provision_acc_code;
                $charge_code->provision_acc_desc = $request->provision_acc_desc;
                $charge_code->currency_id = $request->currency_id;
                $charge_code->uom_id = $request->uom_id;
                $charge_code->consolidation_item_code = $request->consolidation_item_code;
                $charge_code->consolidation_item_desc = $request->consolidation_item_desc;
                $charge_code->sales_analysis_code = $request->sales_analysis_code;
                $charge_code->wt_code_id = $request->wt_code_id;
                $charge_code->cost_ammount = ($request->cost_ammount != null) ?  str_replace(",", "", $request->cost_ammount) : 0;
                $charge_code->cost_percent = ($request->cost_percent != null) ?  str_replace(",", "", $request->cost_percent) : 0;
                $charge_code->item_short_code = $request->item_short_code;
                $charge_code->recoverable =  ($request->recoverable == "yes") ? true : false;
                $charge_code->split_by_method = $request->split_by_method;
                $charge_code->charge_unit = $request->charge_unit;
                $charge_code->cost_center_code = $request->cost_center_code;
                $charge_code->vat_code_id = $request->vat_code_id;
                $charge_code->cost_code = $request->cost_code;
                $charge_code->cost_code_desc = $request->cost_code_desc;
                $charge_code->lock = ($request->lock == "yes") ? true : false;
                $charge_code->cost_analysis_code = $request->cost_analysis_code;
                $charge_code->sales_cost = $request->sales_cost;
                $charge_code->site_code = $request->site_code;
                $charge_code->update();

                $charge_code->charge_code_detail_satu()->delete();
                $result = [];
                if ($request->module != null) {
                    foreach ($request->module as $key => $val) {
                        $result[] = [
                            'charge_code_id' => $charge_code->id,
                            'module'       => $val,
                            'job_type'       => $request->job_type[$key],
                            'sales_acc_code'       => $request->sales_acc_code_detail[$key],
                            'sales_desc'       => $request->sales_desc[$key],
                            'cost_acc_code'       => $request->cost_acc_code_detail[$key],
                            'cost_desc'       => $request->cost_desc[$key],
                            'adv_acc_code'       => $request->adv_acc_code[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    ChargeCodeDetail1::insert($result);
                }

                DB::commit();
                return to_route('charge_code.index')->with('success', 'Charge code has been updated!');
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
    public function destroy(ChargeCode $charge_code)
    {
        if (Auth::user()->hasPermission('delete-charge_code')) {
            $charge_code->delete();

            return to_route('charge_code.index')->with('success', 'Charge code has been deleted!');
        } else {
            abort(403);
        }
    }
}
