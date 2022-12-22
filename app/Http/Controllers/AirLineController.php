<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\History;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AirLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-airline')) {
            if ($request->ajax()) {
                $airline = Airline::all()->sortByDesc("id");
                return DataTables::of($airline)
                    ->addColumn('action', function ($airline) {
                        return view('datatable-modal._action', [
                            'row_id' => $airline->id,
                            'edit_url' => route('airline.edit', $airline->id),
                            'delete_url' => route('airline.destroy', $airline->id),
                            'can_edit' => 'edit-airline',
                            'can_delete' => 'delete-airline'
                        ]);
                    })
                    ->editColumn('updated_at', function ($airline) {
                        return !empty($airline->updated_at) ? date("d-m-Y H:i", strtotime($airline->updated_at)) : "-";
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
                    'menu'      => 'Airline',
                    'url_menu'  => route('airline.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Airline',
                    'url_menu'  => route('airline.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.airline.index');
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
        if (Auth::user()->hasPermission('create-airline')) {
            return view('master.airline.create');
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
        if (Auth::user()->hasPermission('create-airline')) {
            $request->validate([
                'code'    => 'required|max:3|unique:airlines,code',
                'airline_id'    => 'required|max:3|unique:airlines,airline_id',
                'name' => 'required|max:50|unique:airlines,name',
                'image_country'     => 'image|max:1024|mimes:png,jpg',
            ]);


            DB::beginTransaction();
            try {
                $airline = new Airline();
                $airline->code = $request->code;
                $airline->name = strtoupper($request->name);
                $airline->airline_id = strtoupper($request->airline_id);
                $airline->bisnis_party_id = $request->bisnis_party_id;
                $airline->is_vendor = $request->is_vendor == '1' ? true : false;
                $airline->vendor_code = $request->is_vendor == '1' ? $this->custom_code_vendor(strtoupper(substr($request->name, 0, 1))) : '';
                $airline->vendor_acc_code = $request->vendor_acc_code;
                $airline->address_1 = $request->address_1;
                $airline->address_2 = $request->address_2;
                $airline->address_3 = $request->address_3;
                $airline->address_4 = $request->address_4;
                $airline->city_id = $request->city_id;
                $airline->country_id = $request->country_id;
                $airline->telp = $request->telp;
                $airline->fax = $request->fax;
                $airline->email = $request->email;
                $airline->web_site = $request->web_site;
                $airline->contact = $request->contact;
                $airline->comission = $request->comission != null ? str_replace(",", "", $request->comission) : 0;
                $airline->neutral = $request->neutral;
                $airline->ccn = $request->ccn;
                $airline->analysis_code = $request->analysis_code;
                $airline->terminal = $request->terminal;
                $airline->left_margin = $request->left_margin != null ? str_replace(",", "", $request->left_margin) : 0;
                $airline->top_margin = $request->top_margin != null ? str_replace(",", "", $request->top_margin) : 0;
                if ($request->file('image_airline')) {
                    $airline->image_airline = $request->file('image_airline')->store('airline-images');
                }
                $airline->save();

                DB::commit();
                return to_route('airline.index')->with('success', 'New Airline has been added!');
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
    public function edit(Airline $airline)
    {
        if (Auth::user()->hasPermission('edit-airline')) {
            $comission = number_format($airline->comission, 2, ".", ",");
            $left_margin = number_format($airline->left_margin, 3, ".", ",");
            $top_margin = number_format($airline->top_margin, 3, ".", ",");
            return view('master.airline.edit', compact('airline', 'comission', 'left_margin', 'top_margin'));
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
        if (Auth::user()->hasPermission('edit-airline')) {
            $request->validate([
                'code'    => 'required|max:3|unique:airlines,code,' . $id,
                'airline_id'    => 'required|max:3|unique:airlines,airline_id,' . $id,
                'name' => 'required|max:50|unique:airlines,name,' . $id,
                'image_country'     => 'image|max:1024|mimes:png,jpg',
            ]);


            DB::beginTransaction();
            try {
                $airline = Airline::find($id);
                $airline->code = $request->code;
                $airline->name = strtoupper($request->name);
                $airline->airline_id = strtoupper($request->airline_id);
                $airline->bisnis_party_id = $request->bisnis_party_id;
                $airline->is_vendor = ($airline->is_vendor == false && $request->is_vendor == '1') ? true : $airline->is_vendor;
                $airline->vendor_code = ($airline->vendor_code == "" && $request->is_vendor == '1') ? $this->custom_code_vendor(strtoupper(substr($request->name, 0, 1))) : $airline->vendor_code;
                $airline->vendor_acc_code = $request->vendor_acc_code;
                $airline->address_1 = $request->address_1;
                $airline->address_2 = $request->address_2;
                $airline->address_3 = $request->address_3;
                $airline->address_4 = $request->address_4;
                $airline->city_id = $request->city_id;
                $airline->country_id = $request->country_id;
                $airline->telp = $request->telp;
                $airline->fax = $request->fax;
                $airline->email = $request->email;
                $airline->web_site = $request->web_site;
                $airline->contact = $request->contact;
                $airline->comission = $request->comission != null ? str_replace(",", "", $request->comission) : 0;
                $airline->neutral = $request->neutral;
                $airline->ccn = $request->ccn;
                $airline->analysis_code = $request->analysis_code;
                $airline->terminal = $request->terminal;
                $airline->left_margin = $request->left_margin != null ? str_replace(",", "", $request->left_margin) : 0;
                $airline->top_margin = $request->top_margin != null ? str_replace(",", "", $request->top_margin) : 0;
                if ($request->file('image_airline')) {
                    if ($request->oldImage) {
                        Storage::delete($request->oldImage);
                    }
                    $airline->image_airline = $request->file('image_airline')->store('airline-images');
                }
                $airline->update();

                DB::commit();
                return to_route('airline.index')->with('success', 'Airline has been updated!');
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
    public function destroy(Airline $airline)
    {
        if (Auth::user()->hasPermission('delete-airline')) {
            if ($airline->image_airline) {
                Storage::delete($airline->image_airline);
            }
            $airline->delete();
            return to_route('airline.index')->with('success', 'Airline has been deleted!');
        } else {
            abort(403);
        }
    }

    public function custom_code_vendor($search)
    {
        $format = $search;
        $data_vendor = Airline::select('vendor_code')->where('vendor_code', 'like', "%$format%")->count() + 1;

        if (strlen($data_vendor) <= 1) {
            $format .= "000{$data_vendor}";
        } else if (strlen($data_vendor) <= 2) {
            $format .= "00{$data_vendor}";
        } else if (strlen($data_vendor) <= 3) {
            $format .= "0{$data_vendor}";
        } else {
            $format .= (string)$data_vendor;
        }

        $form = $format;

        return $form;
    }
}
