<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\History;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class AirPortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-airport')) {
            if ($request->ajax()) {
                $airport = Airport::select('*');
                return DataTables::of($airport)
                    ->addColumn('action', function ($airport) {
                        return view('datatable-modal._action', [
                            'row_id' => $airport->id,
                            'edit_url' => route('airport.edit', $airport->id),
                            'delete_url' => route('airport.destroy', $airport->id),
                            'can_edit' => 'edit-airport',
                            'can_delete' => 'delete-airport'
                        ]);
                    })
                    ->editColumn('updated_at', function ($airport) {
                        return !empty($airport->updated_at) ? date("d-m-Y H:i", strtotime($airport->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            // INSERT TABLE HISTORY
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Airport')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Airport')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Airport',
                    'url_menu'  => route('airport.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Airport',
                    'url_menu'  => route('airport.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.airport.index');
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
        if (Auth::user()->hasPermission('create-airport')) {
            return view('master.airport.create');
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
        if (Auth::user()->hasPermission('create-airport')) {
            $request->validate([
                'code'           => 'required|max:3|unique:airports,code',
                'name'           => 'required|max:45|unique:airports,name',
                'country_id'     => 'required',
            ]);

            $airport = new Airport();
            $airport->code = strtoupper($request->code);
            $airport->name = strtoupper($request->name);
            $airport->country_id   = ($request->country_id) ? $request->country_id : 0;
            $airport->save();

            return to_route('airport.index')->with('success', 'New airport has been added!');
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
    public function edit(Airport $airport)
    {
        if (Auth::user()->hasPermission('edit-airport')) {
            return view('master.airport.edit', compact('airport'));
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
        if (Auth::user()->hasPermission('edit-airport')) {
            $request->validate([
                'name'           => 'required|max:45|unique:airports,name,' . $id,
                'country_id'     => 'required',
            ]);

            $airport = Airport::find($id);
            $airport->name = strtoupper($request->name);
            $airport->country_id   = ($request->country_id) ? $request->country_id : 0;
            $airport->update();

            return to_route('airport.index')->with('success', 'Airport has been updated!');
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
    public function destroy(Airport $airport)
    {
        if (Auth::user()->hasPermission('delete-airport')) {
            $airport->delete();

            return to_route('airport.index')->with('success', 'Airport has been deleted!');
        } else {
            abort(403);
        }
    }
}
