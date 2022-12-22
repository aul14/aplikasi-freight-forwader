<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\ShippingLine;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShippingLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-shipline')) {
            if ($request->ajax()) {
                $shipline = ShippingLine::all()->sortByDesc("id");
                return DataTables::of($shipline)
                    ->addColumn('action', function ($shipline) {
                        return view('datatable-modal._action', [
                            'row_id' => $shipline->id,
                            'edit_url' => route('shipline.edit', $shipline->id),
                            'delete_url' => route('shipline.destroy', $shipline->id),
                            'can_edit' => 'edit-shipline',
                            'can_delete' => 'delete-shipline'
                        ]);
                    })
                    ->editColumn('updated_at', function ($shipline) {
                        return !empty($shipline->updated_at) ? date("d-m-Y H:i", strtotime($shipline->updated_at)) : "-";
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
                    'menu'      => 'Shipping Line',
                    'url_menu'  => route('shipline.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Shipping Line',
                    'url_menu'  => route('shipline.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.shipline.index');
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
        if (Auth::user()->hasPermission('create-shipline')) {
            return view('master.shipline.create');
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
        if (Auth::user()->hasPermission('create-shipline')) {
            $request->validate([
                'code'    => 'required|max:12|unique:shipping_lines,code',
                'name' => 'required|max:80|unique:shipping_lines,name',
            ]);

            DB::beginTransaction();
            try {
                $shipline = new ShippingLine();
                $shipline->code = strtoupper($request->code);
                $shipline->name = strtoupper($request->name);
                $shipline->bisnis_party_id = $request->bisnis_party_id;
                $shipline->is_vendor = $request->is_vendor == '1' ? true : false;
                $shipline->vendor_code = $request->is_vendor == '1' ? $this->custom_code_vendor(strtoupper(substr($request->name, 0, 1))) : '';
                $shipline->vendor_acc_code = $request->vendor_acc_code;
                $shipline->address_1 = $request->address_1;
                $shipline->address_2 = $request->address_2;
                $shipline->address_3 = $request->address_3;
                $shipline->address_4 = $request->address_4;
                $shipline->city_id = $request->city_id;
                $shipline->country_id = $request->country_id;
                $shipline->telp = $request->telp;
                $shipline->fax = $request->fax;
                $shipline->email = $request->email;
                $shipline->web_site = $request->web_site;
                $shipline->contact = $request->contact;
                $shipline->analysis_code = $request->analysis_code;
                $shipline->save();

                DB::commit();
                return to_route('shipline.index')->with('success', 'New Shipping line has been added!');
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
    public function edit(ShippingLine $shipline)
    {
        if (Auth::user()->hasPermission('edit-shipline')) {
            return view('master.shipline.edit', compact('shipline'));
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
        if (Auth::user()->hasPermission('edit-shipline')) {
            $request->validate([
                'code'    => 'required|max:12|unique:shipping_lines,code,' . $id,
                'name' => 'required|max:80|unique:shipping_lines,name,' . $id,
            ]);

            DB::beginTransaction();
            try {
                $shipline = ShippingLine::find($id);
                $shipline->name = strtoupper($request->name);
                $shipline->bisnis_party_id = $request->bisnis_party_id;
                $shipline->is_vendor = ($shipline->is_vendor == false && $request->is_vendor == '1') ? true : $shipline->is_vendor;
                $shipline->vendor_code = ($shipline->vendor_code == "" && $request->is_vendor == '1') ? $this->custom_code_vendor(strtoupper(substr($request->name, 0, 1))) : $shipline->vendor_code;
                $shipline->vendor_acc_code = $request->vendor_acc_code;
                $shipline->address_1 = $request->address_1;
                $shipline->address_2 = $request->address_2;
                $shipline->address_3 = $request->address_3;
                $shipline->address_4 = $request->address_4;
                $shipline->city_id = $request->city_id;
                $shipline->country_id = $request->country_id;
                $shipline->telp = $request->telp;
                $shipline->fax = $request->fax;
                $shipline->email = $request->email;
                $shipline->web_site = $request->web_site;
                $shipline->contact = $request->contact;
                $shipline->analysis_code = $request->analysis_code;
                $shipline->update();

                DB::commit();
                return to_route('shipline.index')->with('success', 'Shipping line has been updated!');
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
    public function destroy(ShippingLine $shipline)
    {
        if (Auth::user()->hasPermission('delete-shipline')) {
            $shipline->delete();

            return to_route('shipline.index')->with('success', 'Shipping line has been deleted!');
        } else {
            abort(403);
        }
    }

    public function custom_code_vendor($search)
    {
        $format = $search;
        $data_vendor = ShippingLine::select('vendor_code')->where('vendor_code', 'like', "%$format%")->count() + 1;

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
