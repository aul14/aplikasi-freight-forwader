<?php

namespace App\Http\Controllers;

use CodeNumbering;
use App\Models\History;
use App\Models\ChargeTable;
use App\Models\ChargeTableD1;
use Illuminate\Http\Request;
use App\Models\SystemNumbering;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChargeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(CodeNumbering::custom_code('19', new ChargeTable()));
        if (Auth::user()->hasPermission('manage-charge_table')) {
            if ($request->ajax()) {
                $charge_table = ChargeTable::all()->sortByDesc("id");
                return DataTables::of($charge_table)
                    ->addColumn('action', function ($charge_table) {
                        return view('datatable-modal._action', [
                            'row_id' => $charge_table->id,
                            'edit_url' => route('charge_table.edit', $charge_table->id),
                            'delete_url' => route('charge_table.destroy', $charge_table->id),
                            'can_edit' => 'edit-charge_table',
                            'can_delete' => 'delete-charge_table'
                        ]);
                    })
                    ->editColumn('updated_at', function ($charge_table) {
                        return !empty($charge_table->updated_at) ? date("d-m-Y H:i", strtotime($charge_table->updated_at)) : "-";
                    })
                    ->editColumn('effective_date', function ($charge_table) {
                        return !empty($charge_table->effective_date) ? date("d-m-Y", strtotime($charge_table->effective_date)) : "-";
                    })
                    ->editColumn('exp_date', function ($charge_table) {
                        return !empty($charge_table->exp_date) ? date("d-m-Y", strtotime($charge_table->exp_date)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action', 'effective_date', 'exp_date'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Charge Table',
                    'url_menu'  => route('charge_table.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Charge Table',
                    'url_menu'  => route('charge_table.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.table.index');
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
        if (Auth::user()->hasPermission('create-charge_table')) {
            return view('master.table.create');
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
        if (Auth::user()->hasPermission('create-charge_table')) {
            $request->validate(
                [
                    'code'    => 'required|max:20|unique:charge_tables,code',
                    'description'  => 'max:50',
                    'note_code'  => 'max:5',
                ],
            );

            DB::beginTransaction();
            try {
                $table = new ChargeTable();
                $code = CodeNumbering::custom_code('19', $table);

                $charge_table = $table;
                $charge_table->code = $code;
                $charge_table->description = $request->description;
                $charge_table->job_type_id = $request->job_type_id;
                $charge_table->module_code = $request->module_code;
                $charge_table->transit_time = $request->transit_time;
                $charge_table->frequency = $request->frequency;
                $charge_table->bisnis_party_id = $request->bisnis_party_id;
                $charge_table->port_loading_code = $request->port_loading_code;
                $charge_table->port_loading_name = $request->port_loading_name;
                $charge_table->port_discharge_code = $request->port_discharge_code;
                $charge_table->port_discharge_name = $request->port_discharge_name;
                $charge_table->city_id = $request->city_id;
                $charge_table->valid_flag = ($request->valid_flag == "yes") ? true : false;
                $charge_table->standard_flag = ($request->standard_flag == "yes") ? true : false;
                $charge_table->frt_collect = ($request->frt_collect == "yes") ? true : false;
                $charge_table->via_port_code = $request->via_port_code;
                $charge_table->via_port_name = $request->via_port_name;
                $charge_table->second_port_code = $request->second_port_code;
                $charge_table->second_port_name = $request->second_port_name;
                $charge_table->effective_date = $request->effective_date;
                $charge_table->exp_date = $request->exp_date;
                $charge_table->note = $request->note;
                $charge_table->note_code = $request->note_code;
                $charge_table->save();

                $result = [];
                if ($request->charge_code_id[0] != null) {
                    foreach ($request->charge_code_id as $key => $val) {
                        $result[] = [
                            'charge_table_id' => $charge_table->id,
                            'charge_code_id'       => $val,
                            'qty'       => $request->qty[$key],
                            'cargo'       => $request->cargo[$key],
                            'dg'       => $request->dg[$key],
                            'uom_id'       => $request->uom_id[$key],
                            'chg'       => $request->chg[$key],
                            'vat_code_id'       => $request->vat_code_id[$key],
                            'p_c'       => $request->p_c[$key],
                            'chg_unit'       => $request->chg_unit[$key],
                            'container_id'       => $request->container_id[$key],
                            'rate'       => $request->rate[$key],
                            'currency_id'       => $request->currency_id[$key],
                            'min_amt'       => ($request->min_amt[$key] != null) ?  str_replace(",", "", $request->min_amt[$key]) : 0,
                            'amt'       => ($request->amt[$key] != null) ?  str_replace(",", "", $request->amt[$key]) : 0,
                            'cost'       => ($request->cost[$key] != null) ?  str_replace(",", "", $request->cost[$key]) : 0,
                            'percent'       => ($request->percent[$key] != null) ?  str_replace(",", "", $request->percent[$key]) : 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    ChargeTableD1::insert($result);
                }

                DB::commit();
                return to_route('charge_table.index')->with('success', 'New charge table has been added!');
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
    public function edit(ChargeTable $charge_table)
    {
        if (Auth::user()->hasPermission('edit-charge_table')) {
            $effective_date = ($charge_table->effective_date != null) ? date('d/m/Y', strtotime($charge_table->effective_date)) : null;
            $exp_date = ($charge_table->exp_date != null) ? date('d/m/Y', strtotime($charge_table->exp_date)) : null;
            $c_detail = ChargeTableD1::where('charge_table_id', $charge_table->id)->get();
            return view('master.table.edit', compact('charge_table', 'effective_date', 'exp_date', 'c_detail'));
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
        if (Auth::user()->hasPermission('edit-charge_table')) {
            $request->validate(
                [
                    'description'  => 'max:50',
                    'note_code'  => 'max:5',
                ],
            );

            DB::beginTransaction();
            try {
                $charge_table = ChargeTable::find($id);
                $charge_table->description = $request->description;
                $charge_table->job_type_id = $request->job_type_id;
                $charge_table->module_code = $request->module_code;
                $charge_table->transit_time = $request->transit_time;
                $charge_table->frequency = $request->frequency;
                $charge_table->bisnis_party_id = $request->bisnis_party_id;
                $charge_table->port_loading_code = $request->port_loading_code;
                $charge_table->port_loading_name = $request->port_loading_name;
                $charge_table->port_discharge_code = $request->port_discharge_code;
                $charge_table->port_discharge_name = $request->port_discharge_name;
                $charge_table->city_id = $request->city_id;
                $charge_table->valid_flag = ($request->valid_flag == "yes") ? true : false;
                $charge_table->standard_flag = ($request->standard_flag == "yes") ? true : false;
                $charge_table->frt_collect = ($request->frt_collect == "yes") ? true : false;
                $charge_table->via_port_code = $request->via_port_code;
                $charge_table->via_port_name = $request->via_port_name;
                $charge_table->second_port_code = $request->second_port_code;
                $charge_table->second_port_name = $request->second_port_name;
                $charge_table->effective_date = $request->effective_date;
                $charge_table->exp_date = $request->exp_date;
                $charge_table->note = $request->note;
                $charge_table->note_code = $request->note_code;
                $charge_table->update();

                $charge_table->charge_table_detail_satu()->delete();
                $result = [];
                if ($request->charge_code_id[0] != null) {
                    foreach ($request->charge_code_id as $key => $val) {
                        $result[] = [
                            'charge_table_id' => $charge_table->id,
                            'charge_code_id'       => $val,
                            'qty'       => $request->qty[$key],
                            'cargo'       => $request->cargo[$key],
                            'dg'       => $request->dg[$key],
                            'uom_id'       => $request->uom_id[$key],
                            'chg'       => $request->chg[$key],
                            'vat_code_id'       => $request->vat_code_id[$key],
                            'p_c'       => $request->p_c[$key],
                            'chg_unit'       => $request->chg_unit[$key],
                            'container_id'       => $request->container_id[$key],
                            'rate'       => $request->rate[$key],
                            'currency_id'       => $request->currency_id[$key],
                            'min_amt'       => ($request->min_amt[$key] != null) ?  str_replace(",", "", $request->min_amt[$key]) : 0,
                            'amt'       => ($request->amt[$key] != null) ?  str_replace(",", "", $request->amt[$key]) : 0,
                            'cost'       => ($request->cost[$key] != null) ?  str_replace(",", "", $request->cost[$key]) : 0,
                            'percent'       => ($request->percent[$key] != null) ?  str_replace(",", "", $request->percent[$key]) : 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    ChargeTableD1::insert($result);
                }

                DB::commit();
                return to_route('charge_table.index')->with('success', 'Charge table has been updated!');
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
     * @param  int  $idx
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChargeTable $charge_table)
    {
        if (Auth::user()->hasPermission('delete-charge_table')) {
            $charge_table->delete();

            return to_route('charge_table.index')->with('success', 'Charge table has been deleted!');
        } else {
            abort(403);
        }
    }
}
