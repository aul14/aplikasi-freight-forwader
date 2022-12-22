<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\History;
use App\Models\Customer;
use App\Models\Salesman;
use App\Models\PaymentTerm;
use App\Models\CustomerType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-customer')) {
            if ($request->ajax()) {
                $customer = Customer::all()->sortByDesc("customer.id");
                return DataTables::of($customer)
                    ->addColumn('action', function ($customer) {
                        return view('datatable-modal._action', [
                            'row_id' => $customer->id,
                            'edit_url' => route('customer.edit', $customer->id),
                            'delete_url' => route('customer.destroy', $customer->id),
                            'can_edit' => 'edit-customer',
                            'can_delete' => 'delete-customer'
                        ]);
                    })
                    ->editColumn('updated_at', function ($customer) {
                        return !empty($customer->updated_at) ? date("d-m-Y H:i", strtotime($customer->updated_at)) : "-";
                    })
                    ->editColumn('credit_limit', function ($customer) {
                        return number_format($customer->credit_limit, 2, ".", ",");
                    })
                    ->rawColumns(['updated_at', 'action', 'credit_limit'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Customer',
                    'url_menu'  => route('customer.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Customer',
                    'url_menu'  => route('customer.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.customer.index');
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
        if (Auth::user()->hasPermission('create-customer')) {
            return view('master.customer.create');
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
        if (Auth::user()->hasPermission('create-customer')) {
            $request->validate(
                [
                    'code'         => 'required|max:10|unique:customers,code',
                    'name'          => 'required|max:80',
                    'currency_id'  => 'required',
                    'payment_term_id'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $customer = new Customer();
                $customer->code = $request->code === 'NEW' ? $this->custom_code(strtoupper(substr($request->name, 0, 1))) : $request->code;
                $customer->name = $request->name;
                $customer->customer_type_id = $request->customer_type_id;
                $customer->acc_code = $request->acc_code;
                $customer->acc_desc = $request->acc_desc;
                $customer->vendor_id = $request->vendor_id;
                $customer->currency_id = $request->currency_id;
                $customer->payment_term_id = $request->payment_term_id;
                $customer->local_name = $request->local_name;
                $customer->address_1 = $request->address_1;
                $customer->address_2 = $request->address_2;
                $customer->address_3 = $request->address_3;
                $customer->address_4 = $request->address_4;
                $customer->postal_code = $request->postal_code;
                $customer->city_id = $request->city_id;
                $customer->country_id = $request->country_id;
                $customer->province = $request->province;
                $customer->place = $request->place;
                $customer->telp = $request->telp;
                $customer->fax = $request->fax;
                $customer->telex = $request->telex;
                $customer->email = $request->email;
                $customer->web_site = $request->web_site;
                $customer->salesman_id = $request->salesman_id;
                $customer->credit_limit =  ($request->credit_limit != null) ? str_replace(",", "", $request->credit_limit) : 0;
                $customer->save();

                DB::commit();
                return to_route('customer.index')->with('success', 'New Customer has been added!');
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
    public function edit(Customer $customer)
    {
        if (Auth::user()->hasPermission('edit-customer')) {
            return view('master.customer.edit', compact('customer'));
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
        if (Auth::user()->hasPermission('edit-customer')) {
            $request->validate(
                [
                    'code'         => 'required|max:10|unique:customers,code,' . $id,
                    'name'          => 'required|max:80',
                    'currency_id'  => 'required',
                    'payment_term_id'  => 'required',
                ],
            );

            DB::beginTransaction();
            try {
                $customer = Customer::find($id);
                $customer->name = $request->name;
                $customer->customer_type_id = $request->customer_type_id;
                $customer->acc_code = $request->acc_code;
                $customer->acc_desc = $request->acc_desc;
                $customer->vendor_id = $request->vendor_id;
                $customer->currency_id = $request->currency_id;
                $customer->payment_term_id = $request->payment_term_id;
                $customer->local_name = $request->local_name;
                $customer->address_1 = $request->address_1;
                $customer->address_2 = $request->address_2;
                $customer->address_3 = $request->address_3;
                $customer->address_4 = $request->address_4;
                $customer->postal_code = $request->postal_code;
                $customer->city_id = $request->city_id;
                $customer->country_id = $request->country_id;
                $customer->province = $request->province;
                $customer->place = $request->place;
                $customer->telp = $request->telp;
                $customer->fax = $request->fax;
                $customer->telex = $request->telex;
                $customer->email = $request->email;
                $customer->web_site = $request->web_site;
                $customer->salesman_id = $request->salesman_id;
                $customer->credit_limit =  ($request->credit_limit != null) ? str_replace(",", "", $request->credit_limit) : 0;
                $customer->update();

                DB::commit();
                return to_route('customer.index')->with('success', 'Customer has been updated!');
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
    public function destroy(Customer $customer)
    {
        if (Auth::user()->hasPermission('delete-customer')) {
            $customer->delete();

            return to_route('customer.index')->with('success', 'Customer has been deleted!');
        } else {
            abort(403);
        }
    }

    public function custom_code($search)
    {
        $format = $search;
        $data_customer = Customer::select('code')->where('code', 'like', "%$format%")->count() + 1;

        if (strlen($data_customer) <= 1) {
            $format .= "00{$data_customer}";
        } else if (strlen($data_customer) <= 2) {
            $format .= "0{$data_customer}";
        } else {
            $format .= (string)$data_customer;
        }

        $form = $format;

        return $form;
    }
}
