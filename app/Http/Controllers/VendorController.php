<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\History;
use App\Models\Customer;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-vendor')) {
            if ($request->ajax()) {
                $vendor = Vendor::select('*');
                return DataTables::of($vendor)
                    ->addColumn('action', function ($vendor) {
                        return view('datatable-modal._action', [
                            'row_id' => $vendor->id,
                            'edit_url' => route('vendors.edit', $vendor->id),
                            'delete_url' => route('vendors.destroy', $vendor->id),
                            'can_edit' => 'edit-vendor',
                            'can_delete' => 'delete-vendor'
                        ]);
                    })
                    ->editColumn('updated_at', function ($vendor) {
                        return !empty($vendor->updated_at) ? date("d-m-Y H:i", strtotime($vendor->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Vendor',
                    'url_menu'  => route('vendors.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Vendor',
                    'url_menu'  => route('vendors.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.vendor.index');
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
        if (Auth::user()->hasPermission('create-vendor')) {
            return view('master.vendor.create');
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
        if (Auth::user()->hasPermission('create-vendor')) {
            $request->validate(
                [
                    'code'         => 'required|max:10|unique:vendors,code',
                    'name'          => 'required|max:80',
                    'currency_id'  => 'required',
                    'payment_term_id'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $vendor = new Vendor();
                $vendor->code = $request->code === 'NEW' ? $this->custom_code(strtoupper(substr($request->name, 0, 1))) : $request->code;
                $vendor->name = $request->name;
                $vendor->vendor_type_id = $request->vendor_type_id;
                $vendor->acc_code = $request->acc_code;
                $vendor->acc_desc = $request->acc_desc;
                $vendor->customer_id = $request->customer_id;
                $vendor->currency_id = $request->currency_id;
                $vendor->payment_term_id = $request->payment_term_id;
                $vendor->vat_code_id = $request->vat_code_id;
                $vendor->local_name = $request->local_name;
                $vendor->address_1 = $request->address_1;
                $vendor->address_2 = $request->address_2;
                $vendor->address_3 = $request->address_3;
                $vendor->address_4 = $request->address_4;
                $vendor->postal_code = $request->postal_code;
                $vendor->city_id = $request->city_id;
                $vendor->country_id = $request->country_id;
                $vendor->province = $request->province;
                $vendor->place = $request->place;
                $vendor->telp = $request->telp;
                $vendor->fax = $request->fax;
                $vendor->telex = $request->telex;
                $vendor->email = $request->email;
                $vendor->web_site = $request->web_site;
                $vendor->save();

                DB::commit();
                return to_route('vendors.index')->with('success', 'New vendor has been added!');
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
    public function edit(Vendor $vendor)
    {
        if (Auth::user()->hasPermission('edit-vendor')) {
            return view('master.vendor.edit', compact('vendor'));
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
        if (Auth::user()->hasPermission('edit-vendor')) {
            $request->validate(
                [
                    'code'         => 'required|max:10|unique:vendors,code,' . $id,
                    'name'          => 'required|max:80',
                    'currency_id'  => 'required',
                    'payment_term_id'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $vendor = Vendor::find($id);
                $vendor->name = $request->name;
                $vendor->vendor_type_id = $request->vendor_type_id;
                $vendor->acc_code = $request->acc_code;
                $vendor->acc_desc = $request->acc_desc;
                $vendor->customer_id = $request->customer_id;
                $vendor->currency_id = $request->currency_id;
                $vendor->payment_term_id = $request->payment_term_id;
                $vendor->vat_code_id = $request->vat_code_id;
                $vendor->local_name = $request->local_name;
                $vendor->address_1 = $request->address_1;
                $vendor->address_2 = $request->address_2;
                $vendor->address_3 = $request->address_3;
                $vendor->address_4 = $request->address_4;
                $vendor->postal_code = $request->postal_code;
                $vendor->city_id = $request->city_id;
                $vendor->country_id = $request->country_id;
                $vendor->province = $request->province;
                $vendor->place = $request->place;
                $vendor->telp = $request->telp;
                $vendor->fax = $request->fax;
                $vendor->telex = $request->telex;
                $vendor->email = $request->email;
                $vendor->web_site = $request->web_site;
                $vendor->update();

                DB::commit();
                return to_route('vendors.index')->with('success', 'Vendor has been updated!');
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
    public function destroy(Vendor $vendor)
    {
        if (Auth::user()->hasPermission('delete-vendor')) {
            $vendor->delete();

            return to_route('vendors.index')->with('success', 'Vendor has been deleted!');
        } else {
            abort(403);
        }
    }

    public function custom_code($search)
    {
        $format = $search;
        $data_vendor = Vendor::select('code')->where('code', 'like', "%$format%")->count() + 1;

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
