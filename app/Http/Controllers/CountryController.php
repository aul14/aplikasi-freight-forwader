<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Port;
use App\Models\Country;
use App\Models\History;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\DetailCountryPort;
use Illuminate\Support\Facades\DB;
use App\Models\DetailCountrySymbol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-country')) {
            if ($request->ajax()) {
                $country = Country::all()->sortByDesc("countries.id");
                return DataTables::of($country)
                    ->addColumn('action', function ($country) {
                        return view('datatable-modal._action', [
                            'row_id' => $country->id,
                            'edit_url' => route('country.edit', $country->id),
                            'delete_url' => route('country.destroy', $country->id),
                            'can_edit' => 'edit-country',
                            'can_delete' => 'delete-country'
                        ]);
                    })
                    ->editColumn('updated_at', function ($country) {
                        return !empty($country->updated_at) ? date("d-m-Y H:i", strtotime($country->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            // INSERT TABLE HISTORY
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Country',
                    'url_menu'  => route('country.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Country',
                    'url_menu'  => route('country.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.country.index');
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
        if (Auth::user()->hasPermission('create-country')) {
            return view('master.country.create');
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
        if (Auth::user()->hasPermission('create-country')) {
            $request->validate([
                'code'    => 'required|max:2|unique:countries,code',
                'name' => 'required|max:45|unique:countries,name',
                'image_country'     => 'image|max:1024|mimes:png,jpg',
            ]);


            DB::beginTransaction();
            try {
                $country = new Country();
                $country->code = strtoupper($request->code);
                $country->name = strtoupper($request->name);
                $country->idd = $request->idd;
                $country->region_code = strtoupper($request->region_code);
                $country->zone_code = strtoupper($request->zone_code);
                $country->handling_instructions = $request->handling_instructions;
                $country->handling_instructions_port = $request->handling_instructions_port;
                $country->handling_instructions_symbol = $request->handling_instructions_symbol;
                $country->special_instructions = $request->special_instructions;
                if ($request->file('image_country')) {
                    $country->image_country = $request->file('image_country')->store('country-images');
                }
                $country->save();

                $result_port = [];
                if ($request->port_id != null) {
                    foreach ($request->port_id as $key => $val) {
                        $result_port[] = [
                            'country_id'    => $country->id,
                            'port_id'       => $val,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    DetailCountryPort::insert($result_port);
                }

                $result_symbol = [];
                if ($request->symbol != null) {
                    foreach ($request->symbol as $key2 => $val2) {
                        $result_symbol[] = [
                            'country_id'    => $country->id,
                            'symbol'        => $val2,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    DetailCountrySymbol::insert($result_symbol);
                }

                DB::commit();
                return to_route('country.index')->with('success', 'New country has been added!');
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
    public function edit(Country $country)
    {
        if (Auth::user()->hasPermission('edit-country')) {
            $detail_cp = DetailCountryPort::with('port')->where('country_id', $country->id)->get();
            $detail_s = DetailCountrySymbol::where('country_id', $country->id)->get();

            return view('master.country.edit', compact('country', 'detail_cp', 'detail_s'));
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
        if (Auth::user()->hasPermission('edit-country')) {
            $request->validate([
                'code'    => 'required|max:2|unique:countries,code,' . $id,
                'name' => 'required|max:45|unique:countries,name,' . $id,
                'image_country'     => 'image|max:1024|mimes:png,jpg',
            ]);


            DB::beginTransaction();
            try {
                $country = Country::find($id);
                $country->code = strtoupper($request->code);
                $country->name = strtoupper($request->name);
                $country->idd = $request->idd;
                $country->region_code = strtoupper($request->region_code);
                $country->zone_code = strtoupper($request->zone_code);
                $country->handling_instructions = $request->handling_instructions;
                $country->handling_instructions_port = $request->handling_instructions_port;
                $country->handling_instructions_symbol = $request->handling_instructions_symbol;
                $country->special_instructions = $request->special_instructions;
                if ($request->file('image_country')) {
                    if ($request->oldImage) {
                        Storage::delete($request->oldImage);
                    }
                    $country->image_country = $request->file('image_country')->store('country-images');
                }
                $country->update();

                $country->detail_country_port()->delete();
                $result_port = [];
                if ($request->port_id != null) {
                    foreach ($request->port_id as $key => $val) {
                        $result_port[] = [
                            'country_id'    => $country->id,
                            'port_id'       => $val,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    DetailCountryPort::insert($result_port);
                }

                $country->detail_country_symbol()->delete();
                $result_symbol = [];
                if ($request->symbol != null) {
                    foreach ($request->symbol as $key2 => $val2) {
                        $result_symbol[] = [
                            'country_id'    => $country->id,
                            'symbol'        => $val2,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    DetailCountrySymbol::insert($result_symbol);
                }

                DB::commit();
                return to_route('country.index')->with('success', 'Country has been added!');
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
    public function destroy(Country $country)
    {
        if (Auth::user()->hasPermission('delete-country')) {
            if ($country->image_country) {
                Storage::delete($country->image_country);
            }

            $country->delete();

            return to_route('country.index')->with('success', 'Country has been deleted!');
        } else {
            abort(403);
        }
    }
}
