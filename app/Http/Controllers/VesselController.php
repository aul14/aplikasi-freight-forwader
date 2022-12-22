<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use App\Models\History;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VesselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-vessel')) {
            if ($request->ajax()) {
                $vessel = Vessel::all()->sortByDesc("id");
                return DataTables::of($vessel)
                    ->addColumn('action', function ($vessel) {
                        return view('datatable-modal._action', [
                            'row_id' => $vessel->id,
                            'edit_url' => route('vessel.edit', $vessel->id),
                            'delete_url' => route('vessel.destroy', $vessel->id),
                            'can_edit' => 'edit-vessel',
                            'can_delete' => 'delete-vessel'
                        ]);
                    })
                    ->editColumn('updated_at', function ($vessel) {
                        return !empty($vessel->updated_at) ? date("d-m-Y H:i", strtotime($vessel->updated_at)) : "-";
                    })
                    ->editColumn('nrt', function ($vessel) {
                        return number_format($vessel->nrt, 2, ".", ",");
                    })
                    ->editColumn('grt', function ($vessel) {
                        return number_format($vessel->grt, 2, ".", ",");
                    })
                    ->rawColumns(['updated_at', 'action', 'nrt', 'grt'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Vessel',
                    'url_menu'  => route('vessel.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Vessel',
                    'url_menu'  => route('vessel.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.vessel.index');
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
        if (Auth::user()->hasPermission('create-vessel')) {
            return view('master.vessel.create');
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
        if (Auth::user()->hasPermission('create-vessel')) {
            $request->validate(
                [
                    'code'    => 'required|max:12|unique:vessels,code',
                    'name'  => 'required|max:50|unique:vessels,name',
                    'short_name'  => 'max:20',
                    'nrt'     => 'max:17',
                    'grt'     => 'max:17',
                    'year_build'     => 'max:6',
                ],
                [
                    'nrt.max' => 'Max 11,2 digits',
                    'grt.max' => 'Max 11,2 digits',
                    'year_build.max' => 'Max 5,0 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $vessel = new Vessel();
                $vessel->code = $request->code;
                $vessel->name = $request->name;
                $vessel->short_name = $request->short_name;
                $vessel->type = $request->type;
                $vessel->classification = $request->classification;
                $vessel->imo = $request->imo;
                $vessel->shipping_line_id = $request->shipping_line_id;
                $vessel->bisnis_party_id = $request->bisnis_party_id;
                $vessel->nrt = ($request->nrt != null) ? str_replace(",", "", $request->nrt) : 0;
                $vessel->grt = ($request->grt != null) ? str_replace(",", "", $request->grt) : 0;
                $vessel->country_id = $request->country_id;
                $vessel->year_build = ($request->year_build != null) ? str_replace(",", "", $request->year_build) : 0;
                $vessel->save();

                DB::commit();
                return to_route('vessel.index')->with('success', 'New vessel has been added!');
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
    public function edit(Vessel $vessel)
    {
        if (Auth::user()->hasPermission('edit-vessel')) {
            $nrt = number_format($vessel->nrt, 2, ".", ",");
            $grt = number_format($vessel->grt, 2, ".", ",");
            $year_build = number_format($vessel->year_build, 0, ".", ",");
            return view('master.vessel.edit', compact('vessel', 'nrt', 'grt', 'year_build'));
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
        if (Auth::user()->hasPermission('edit-vessel')) {
            $request->validate(
                [
                    'code'    => 'required|max:12|unique:vessels,code,' . $id,
                    'name'  => 'required|max:50|unique:vessels,name,' . $id,
                    'short_name'  => 'max:20',
                    'nrt'     => 'max:17',
                    'grt'     => 'max:17',
                    'year_build'     => 'max:6',
                ],
                [
                    'nrt.max' => 'Max 11,2 digits',
                    'grt.max' => 'Max 11,2 digits',
                    'year_build.max' => 'Max 5,0 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $vessel = Vessel::find($id);
                $vessel->name = $request->name;
                $vessel->short_name = $request->short_name;
                $vessel->type = $request->type;
                $vessel->classification = $request->classification;
                $vessel->imo = $request->imo;
                $vessel->shipping_line_id = $request->shipping_line_id;
                $vessel->bisnis_party_id = $request->bisnis_party_id;
                $vessel->nrt = ($request->nrt != null) ? str_replace(",", "", $request->nrt) : 0;
                $vessel->grt = ($request->grt != null) ? str_replace(",", "", $request->grt) : 0;
                $vessel->country_id = $request->country_id;
                $vessel->year_build = ($request->year_build != null) ? str_replace(",", "", $request->year_build) : 0;
                $vessel->update();

                DB::commit();
                return to_route('vessel.index')->with('success', 'Vessel has been updated!');
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
    public function destroy(Vessel $vessel)
    {
        if (Auth::user()->hasPermission('delete-vessel')) {
            $vessel->delete();

            return to_route('vessel.index')->with('success', 'Vessel has been deleted!');
        } else {
            abort(403);
        }
    }
}
