<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Port;
use App\Models\Country;
use App\Models\History;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-city')) {
            if ($request->ajax()) {
                $city = City::select('*');
                return DataTables::of($city)
                    ->addColumn('action', function ($city) {
                        return view('datatable-modal._action', [
                            'row_id' => $city->id,
                            'edit_url' => route('city.edit', $city->id),
                            'delete_url' => route('city.destroy', $city->id),
                            'can_edit' => 'edit-city',
                            'can_delete' => 'delete-city'
                        ]);
                    })
                    ->editColumn('updated_at', function ($city) {
                        return !empty($city->updated_at) ? date("d-m-Y H:i", strtotime($city->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            // INSERT TABLE HISTORY
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'City')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'City')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'City',
                    'url_menu'  => route('city.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'City',
                    'url_menu'  => route('city.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.city.index');
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
        if (Auth::user()->hasPermission('create-city')) {
            return view('master.city.create');
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
        if (Auth::user()->hasPermission('create-city')) {
            $request->validate([
                'code'           => 'required|max:3|unique:cities,code',
                'name'           => 'required|max:45|unique:cities,name',
                'country_id'     => 'required',
            ]);
            $city = new City();
            $city->code = strtoupper($request->code);
            $city->name = strtoupper($request->name);
            $city->country_id   = ($request->country_id) ? $request->country_id : 0;
            $city->port_id   = ($request->port_id) ? $request->port_id : 0;
            $city->save();

            return to_route('city.index')->with('success', 'New city has been added!');
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
    public function edit(City $city)
    {
        if (Auth::user()->hasPermission('edit-city')) {
            return view('master.city.edit', compact('city'));
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
        if (Auth::user()->hasPermission('edit-city')) {
            $request->validate([
                'code'           => 'max:3|unique:cities,code,' . $id,
                'name'           => 'required|max:45|unique:cities,name,' . $id,
                'country_id'     => 'required',
            ]);
            $city = City::find($id);
            $city->name = strtoupper($request->name);
            $city->country_id   = ($request->country_id) ? $request->country_id : 0;
            $city->port_id   = ($request->port_id) ? $request->port_id : 0;
            $city->update();

            return to_route('city.index')->with('success', 'City has been updated!');
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
    public function destroy(City $city)
    {
        if (Auth::user()->hasPermission('delete-city')) {
            $city->delete();

            return to_route('city.index')->with('success', 'City has been deleted!');
        } else {
            abort(403);
        }
    }
}
