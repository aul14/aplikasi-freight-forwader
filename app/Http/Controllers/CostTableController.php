<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\History;
use App\Models\CostTable;
use App\Models\CostTableD1;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CostTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-cost_table')) {
            if ($request->ajax()) {
                $cost_table = CostTable::select('*');
                return DataTables::of($cost_table)
                    ->addColumn('action', function ($cost_table) {
                        return view('datatable-modal._action', [
                            'row_id' => $cost_table->id,
                            'edit_url' => route('cost_table.edit', $cost_table->id),
                            'delete_url' => route('cost_table.destroy', $cost_table->id),
                            'can_edit' => 'edit-cost_table',
                            'can_delete' => 'delete-cost_table'
                        ]);
                    })
                    ->editColumn('updated_at', function ($cost_table) {
                        return !empty($cost_table->updated_at) ? date("d-m-Y H:i", strtotime($cost_table->updated_at)) : "-";
                    })
                    ->editColumn('effective_date', function ($cost_table) {
                        return !empty($cost_table->effective_date) ? date("d-m-Y", strtotime($cost_table->effective_date)) : "-";
                    })
                    ->editColumn('exp_date', function ($cost_table) {
                        return !empty($cost_table->exp_date) ? date("d-m-Y", strtotime($cost_table->exp_date)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action', 'effective_date', 'exp_date'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Cost Table')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Cost Table')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Cost Table',
                    'url_menu'  => route('cost_table.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Cost Table',
                    'url_menu'  => route('cost_table.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.cost.index');
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
        if (Auth::user()->hasPermission('create-cost_table')) {
            return view('master.cost.create');
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
        if (Auth::user()->hasPermission('create-cost_table')) {
            $request->validate(
                [
                    'code'    => 'required|max:20|unique:cost_tables,code',
                    'description'  => 'max:50',
                ],
            );
            DB::beginTransaction();
            try {
                $table = new CostTable();
                $code = CodeNumbering::custom_code('20', $table, 'code');

                $cost_table = $table;
                $cost_table->code = $code;
                $cost_table->description = $request->description;
                $cost_table->job_type_id = $request->job_type_id;
                $cost_table->bisnis_party_id = $request->bisnis_party_id;
                $cost_table->port_loading_code = $request->port_loading_code;
                $cost_table->port_loading_name = $request->port_loading_name;
                $cost_table->port_discharge_code = $request->port_discharge_code;
                $cost_table->port_discharge_name = $request->port_discharge_name;
                $cost_table->city_id = $request->city_id;
                $cost_table->valid_flag = ($request->valid_flag == "yes") ? true : false;
                $cost_table->standard_flag = ($request->standard_flag == "yes") ? true : false;
                $cost_table->via_port_code = $request->via_port_code;
                $cost_table->via_port_name = $request->via_port_name;
                $cost_table->second_port_code = $request->second_port_code;
                $cost_table->second_port_name = $request->second_port_name;
                $cost_table->effective_date = $request->effective_date;
                $cost_table->exp_date = $request->exp_date;
                $cost_table->note = $request->note;
                $cost_table->save();


                $result = [];
                if ($request->charge_code_id[0] != null) {
                    foreach (array_unique($request->charge_code_id) as $key => $val) {
                        $result[] = [
                            'cost_table_id' => $cost_table->id,
                            'charge_code_id'       => $val,
                            'qty'       => !empty($request->qty[$key]) ? $request->qty[$key] : 0,
                            'cargo'       => !empty($request->cargo[$key]) ? $request->cargo[$key] : null,
                            'dg'       => !empty($request->dg[$key]) ? $request->dg[$key] : null,
                            'uom_id'       => !empty($request->uom_id[$key]) ? $request->uom_id[$key] : 0,
                            'chg'       => !empty($request->chg[$key]) ? $request->chg[$key] : null,
                            'vat_code_id'       => !empty($request->vat_code_id[$key]) ? $request->vat_code_id[$key] : null,
                            'p_c'       => !empty($request->p_c[$key]) ? $request->p_c[$key] : null,
                            'chg_unit'       => !empty($request->chg_unit[$key]) ? $request->chg_unit[$key] : null,
                            'container_id'       => !empty($request->container_id[$key]) ? $request->container_id[$key] : null,
                            'rate'       => !empty($request->rate[$key]) ? $request->rate[$key] : null,
                            'currency_id'       => !empty($request->currency_id[$key]) ? $request->currency_id[$key] : null,
                            'min_amt'       => ($request->min_amt[$key] != null) ?  str_replace(",", "", $request->min_amt[$key]) : 0,
                            'amt'       => ($request->amt[$key] != null) ?  str_replace(",", "", $request->amt[$key]) : 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    CostTableD1::insert($result);
                }

                DB::commit();
                return to_route('cost_table.index')->with('success', 'New cost table has been added!');
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
        if (Auth::user()->hasPermission('edit-cost_table')) {
            $cost_table = CostTable::with('cost_table_detail_satu')->where('id', $id)->first();

            $effective_date = ($cost_table->effective_date != null) ? date('d/m/Y', strtotime($cost_table->effective_date)) : null;
            $exp_date = ($cost_table->exp_date != null) ? date('d/m/Y', strtotime($cost_table->exp_date)) : null;
            $c_detail = CostTableD1::where('cost_table_id', $cost_table->id)->get();
            return view('master.cost.edit', compact('cost_table', 'effective_date', 'exp_date', 'c_detail'));
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
        if (Auth::user()->hasPermission('edit-cost_table')) {
            $request->validate(
                [
                    'code'    => 'required|max:20|unique:cost_tables,code,' . $id,
                    'description'  => 'max:50',
                ],
            );

            DB::beginTransaction();
            try {
                $cost_table = CostTable::find($id);
                $cost_table->description = $request->description;
                $cost_table->job_type_id = $request->job_type_id;
                $cost_table->bisnis_party_id = $request->bisnis_party_id;
                $cost_table->port_loading_code = $request->port_loading_code;
                $cost_table->port_loading_name = $request->port_loading_name;
                $cost_table->port_discharge_code = $request->port_discharge_code;
                $cost_table->port_discharge_name = $request->port_discharge_name;
                $cost_table->city_id = $request->city_id;
                $cost_table->valid_flag = ($request->valid_flag == "yes") ? true : false;
                $cost_table->standard_flag = ($request->standard_flag == "yes") ? true : false;
                $cost_table->via_port_code = $request->via_port_code;
                $cost_table->via_port_name = $request->via_port_name;
                $cost_table->second_port_code = $request->second_port_code;
                $cost_table->second_port_name = $request->second_port_name;
                $cost_table->effective_date = $request->effective_date;
                $cost_table->exp_date = $request->exp_date;
                $cost_table->note = $request->note;
                $cost_table->update();

                $cost_table->cost_table_detail_satu()->delete();
                $result = [];
                if ($request->charge_code_id[0] != null) {
                    foreach (array_unique($request->charge_code_id) as $key => $val) {
                        $result[] = [
                            'cost_table_id' => $cost_table->id,
                            'charge_code_id'       => $val,
                            'qty'       => !empty($request->qty[$key]) ? $request->qty[$key] : 0,
                            'cargo'       => !empty($request->cargo[$key]) ? $request->cargo[$key] : null,
                            'dg'       => !empty($request->dg[$key]) ? $request->dg[$key] : null,
                            'uom_id'       => !empty($request->uom_id[$key]) ? $request->uom_id[$key] : 0,
                            'chg'       => !empty($request->chg[$key]) ? $request->chg[$key] : null,
                            'vat_code_id'       => !empty($request->vat_code_id[$key]) ? $request->vat_code_id[$key] : null,
                            'p_c'       => !empty($request->p_c[$key]) ? $request->p_c[$key] : null,
                            'chg_unit'       => !empty($request->chg_unit[$key]) ? $request->chg_unit[$key] : null,
                            'container_id'       => !empty($request->container_id[$key]) ? $request->container_id[$key] : null,
                            'rate'       => !empty($request->rate[$key]) ? $request->rate[$key] : null,
                            'currency_id'       => !empty($request->currency_id[$key]) ? $request->currency_id[$key] : null,
                            'min_amt'       => ($request->min_amt[$key] != null) ?  str_replace(",", "", $request->min_amt[$key]) : 0,
                            'amt'       => ($request->amt[$key] != null) ?  str_replace(",", "", $request->amt[$key]) : 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    CostTableD1::insert($result);
                }

                DB::commit();
                return to_route('cost_table.index')->with('success', 'Cost table has been updated!');
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
    public function destroy(CostTable $cost_table)
    {
        if (Auth::user()->hasPermission('delete-cost_table')) {
            $cost_table->delete();

            return to_route('cost_table.index')->with('success', 'Cost table has been deleted!');
        } else {
            abort(403);
        }
    }
}
