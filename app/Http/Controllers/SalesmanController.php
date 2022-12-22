<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Salesman;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalesmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-salesman')) {
            if ($request->ajax()) {
                $salesman = Salesman::all()->sortByDesc("id");
                return DataTables::of($salesman)
                    ->addColumn('action', function ($salesman) {
                        return view('datatable-modal._action', [
                            'row_id' => $salesman->id,
                            'edit_url' => route('salesman.edit', $salesman->id),
                            'delete_url' => route('salesman.destroy', $salesman->id),
                            'can_edit' => 'edit-salesman',
                            'can_delete' => 'delete-salesman'
                        ]);
                    })
                    ->editColumn('updated_at', function ($salesman) {
                        return !empty($salesman->updated_at) ? date("d-m-Y H:i", strtotime($salesman->updated_at)) : "-";
                    })
                    ->editColumn('join_date', function ($salesman) {
                        return !empty($salesman->join_date) ? date("d-m-Y", strtotime($salesman->join_date)) : "-";
                    })
                    ->editColumn('resign_date', function ($salesman) {
                        return !empty($salesman->resign_date) ? date("d-m-Y", strtotime($salesman->resign_date)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action', 'join_date', 'resign_date'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Salesman',
                    'url_menu'  => route('salesman.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Salesman',
                    'url_menu'  => route('salesman.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.salesman.index');
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
        if (Auth::user()->hasPermission('create-salesman')) {
            return view('master.salesman.create');
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
        if (Auth::user()->hasPermission('create-salesman')) {
            $request->validate(
                [
                    'code'         => 'required|max:10',
                    'name'  => 'max:50',
                    'employee_code' => 'max:10',
                    'password' => 'max:8',
                    'area' => 'max:5',
                    'division' => 'max:10',
                ],
            );

            DB::beginTransaction();
            try {
                $salesman = new Salesman();
                $salesman->code = $request->code;
                $salesman->name = $request->name;
                $salesman->employee_code = $request->employee_code;
                $salesman->password = $request->password;
                $salesman->area = $request->area;
                $salesman->division = $request->division;
                $salesman->title = $request->title;
                $salesman->email = $request->email;
                $salesman->telp = $request->telp;
                $salesman->hanphone = $request->hanphone;
                $salesman->join_date = $request->join_date;
                $salesman->resign_date = $request->resign_date;
                $salesman->save();

                DB::commit();
                return to_route('salesman.index')->with('success', 'Salesman has been added!');
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
    public function edit(Salesman $salesman)
    {
        if (Auth::user()->hasPermission('edit-salesman')) {
            $join_date = ($salesman->join_date != null) ? date('d/m/Y', strtotime($salesman->join_date)) : null;
            $resign_date = ($salesman->resign_date != null) ? date('d/m/Y', strtotime($salesman->resign_date)) : null;
            return view('master.salesman.edit', compact('salesman', 'join_date', 'resign_date'));
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
        if (Auth::user()->hasPermission('edit-salesman')) {
            $request->validate(
                [
                    'code'         => 'required|max:10',
                    'name'  => 'max:50',
                    'employee_code' => 'max:10',
                    'password' => 'max:8',
                    'area' => 'max:5',
                    'division' => 'max:10',
                ],
            );

            DB::beginTransaction();
            try {
                $salesman = Salesman::find($id);
                $salesman->name = $request->name;
                $salesman->employee_code = $request->employee_code;
                $salesman->password = $request->password;
                $salesman->area = $request->area;
                $salesman->division = $request->division;
                $salesman->title = $request->title;
                $salesman->email = $request->email;
                $salesman->telp = $request->telp;
                $salesman->hanphone = $request->hanphone;
                $salesman->join_date = $request->join_date;
                $salesman->resign_date = $request->resign_date;
                $salesman->update();

                DB::commit();
                return to_route('salesman.index')->with('success', 'Salesman has been updated!');
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
    public function destroy(Salesman $salesman)
    {
        if (Auth::user()->hasPermission('delete-salesman')) {
            $salesman->delete();

            return to_route('salesman.index')->with('success', 'Salesman has been deleted!');
        } else {
            abort(403);
        }
    }
}
