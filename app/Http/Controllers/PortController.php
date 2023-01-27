<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Port;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\DetailPortCity;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-port')) {
            if ($request->ajax()) {
                $port = Port::select('*');
                return DataTables::of($port)
                    ->addColumn('action', function ($port) {
                        return view('datatable-modal._action', [
                            'row_id' => $port->id,
                            'edit_url' => route('port.edit', $port->id),
                            'delete_url' => route('port.destroy', $port->id),
                            'can_edit' => 'edit-port',
                            'can_delete' => 'delete-port'
                        ]);
                    })
                    ->editColumn('updated_at', function ($port) {
                        return !empty($port->updated_at) ? date("d-m-Y H:i", strtotime($port->updated_at)) : "-";
                    })
                    ->editColumn('dg_cargo', function ($port) {
                        return ($port->dg_cargo == true) ? "yes" : "no";
                    })
                    ->rawColumns(['updated_at', 'action', 'dg_cargo'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Sea Port')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Sea Port')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Port',
                    'url_menu'  => route('port.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Sea Port',
                    'url_menu'  => route('port.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.port.index');
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
        if (Auth::user()->hasPermission('create-port')) {
            return view('master.port.create');
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
        if (Auth::user()->hasPermission('create-port')) {
            $request->validate([
                'code'    => 'required|max:5|unique:ports,code',
                'name'           => 'required|max:45|unique:ports,name',
                'symbol'        => 'max:10',
                'group_code'    => 'max:50',
                'country_id'     => 'required',
            ]);

            // dd($request);
            DB::beginTransaction();
            try {
                $port = new Port();
                $port->code = strtoupper($request->code);
                $port->name = strtoupper($request->name);
                $port->country_id = $request->country_id;
                $port->dg_cargo = ($request->dg_cargo == "yes") ? true : false;
                $port->symbol = $request->symbol;
                $port->group_code = $request->group_code;
                $port->via_port = $request->via_port;
                $port->save();

                $result = [];
                if ($request->city_id[0] != null) {
                    foreach ($request->city_id as $key => $val) {
                        $result[] = [
                            'port_id'    => $port->id,
                            'city_id'       => $val,
                            'no_of_day'       => ($request->no_of_day[$key] != null) ? $request->no_of_day[$key] : 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    DetailPortCity::insert($result);
                }

                DB::commit();
                return to_route('port.index')->with('success', 'New port has been added!');
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
    public function edit(Port $port)
    {
        if (Auth::user()->hasPermission('edit-port')) {
            $detail_pc = DetailPortCity::with(['port', 'city'])->where('port_id', $port->id)->get();
            return view('master.port.edit', compact('port', 'detail_pc'));
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
        if (Auth::user()->hasPermission('edit-port')) {
            $request->validate([
                'code'    => 'max:5|unique:ports,code,' . $id,
                'name'           => 'required|max:45|unique:ports,name,' . $id,
                'symbol'        => 'max:10',
                'group_code'    => 'max:50',
                'country_id'     => 'required',
            ]);

            // dd($request);
            DB::beginTransaction();
            try {
                $port = Port::find($id);
                $port->name = strtoupper($request->name);
                $port->country_id = $request->country_id;
                $port->dg_cargo = ($request->dg_cargo == "yes") ? true : false;
                $port->symbol = $request->symbol;
                $port->group_code = $request->group_code;
                $port->via_port = $request->via_port;
                $port->update();

                $port->detail_port_city()->delete();
                $result = [];
                if ($request->city_id[0] != null) {
                    foreach ($request->city_id as $key => $val) {
                        $result[] = [
                            'port_id'    => $port->id,
                            'city_id'       => $val,
                            'no_of_day'       => ($request->no_of_day[$key] != null) ? $request->no_of_day[$key] : 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    DetailPortCity::insert($result);
                }

                DB::commit();
                return to_route('port.index')->with('success', 'Port has been updated!');
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
    public function destroy(Port $port)
    {
        if (Auth::user()->hasPermission('delete-port')) {
            $port->delete();

            return to_route('port.index')->with('success', 'Port has been deleted!');
        } else {
            abort(403);
        }
    }
}
