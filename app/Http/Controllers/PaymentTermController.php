<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\PaymentTerm;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentTermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-pay_term')) {
            if ($request->ajax()) {
                $pay_term = PaymentTerm::all()->sortByDesc("id");
                return DataTables::of($pay_term)
                    ->addColumn('action', function ($pay_term) {
                        return view('datatable-modal._action', [
                            'row_id' => $pay_term->id,
                            'edit_url' => route('pay_term.edit', $pay_term->id),
                            'delete_url' => route('pay_term.destroy', $pay_term->id),
                            'can_edit' => 'edit-pay_term',
                            'can_delete' => 'delete-pay_term'
                        ]);
                    })
                    ->editColumn('updated_at', function ($pay_term) {
                        return !empty($pay_term->updated_at) ? date("d-m-Y H:i", strtotime($pay_term->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Payment Term',
                    'url_menu'  => route('pay_term.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Payment Term',
                    'url_menu'  => route('pay_term.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.payment.index');
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
        if (Auth::user()->hasPermission('create-pay_term')) {
            return view('master.payment.create');
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
        if (Auth::user()->hasPermission('create-pay_term')) {
            $request->validate(
                [
                    'code'    => 'required|max:3|unique:currency,code',
                    'description'  => 'required|max:50',
                    'net_days'  => 'required|max:6',
                    'discount_days'  => 'max:6',
                    'discount_percent'     => 'max:7',
                    'service_charge_percent'     => 'max:7',
                    'service_charge_min'     => 'max:17',
                ],
                [
                    'net_days.max' => 'Max 5,0 digits',
                    'discount_days.max' => 'Max 5,0 digits',
                    'discount_percent.max' => 'Max 3,3 digits',
                    'service_charge_percent.max' => 'Max 3,3 digits',
                    'service_charge_min.max' => 'Max 11,2 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $pay = new PaymentTerm();
                $pay->code = $request->code;
                $pay->description = $request->description;
                $pay->net_days = ($request->net_days != null) ? str_replace(",", "", $request->net_days) : 0;
                $pay->net_date = ($request->net_date == "yes") ? true : false;
                $pay->discount_days = ($request->discount_days != null) ? str_replace(",", "", $request->discount_days) : 0;
                $pay->discount_date = ($request->discount_date == "yes") ? true : false;
                $pay->shipment_date_flag = ($request->shipment_date_flag == "yes") ? true : false;
                $pay->discount_percent = ($request->discount_percent != null) ? str_replace(",", "", $request->discount_percent) : 0;
                $pay->service_charge_min = ($request->service_charge_min != null) ? str_replace(",", "", $request->service_charge_min) : 0;
                $pay->service_charge_percent = ($request->service_charge_percent != null) ? str_replace(",", "", $request->service_charge_percent) : 0;
                $pay->save();

                DB::commit();
                return to_route('pay_term.index')->with('success', 'New payment term has been added!');
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
    public function edit(PaymentTerm $pay_term)
    {
        if (Auth::user()->hasPermission('edit-pay_term')) {
            $net_days = number_format($pay_term->net_days, 0, ".", ",");
            $discount_days = number_format($pay_term->discount_days, 0, ".", ",");
            $discount_percent = number_format($pay_term->discount_percent, 3, ".", ",");
            $service_charge_percent = number_format($pay_term->service_charge_percent, 3, ".", ",");
            $service_charge_min = number_format($pay_term->service_charge_min, 2, ".", ",");
            return view('master.payment.edit', compact('pay_term', 'net_days', 'discount_days', 'discount_percent', 'service_charge_min', 'service_charge_percent'));
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
        if (Auth::user()->hasPermission('edit-pay_term')) {
            $request->validate(
                [
                    'code'    => 'required|max:3|unique:currency,code,' . $id,
                    'description'  => 'required|max:50',
                    'net_days'  => 'required|max:6',
                    'discount_days'  => 'max:6',
                    'discount_percent'     => 'max:7',
                    'service_charge_percent'     => 'max:7',
                    'service_charge_min'     => 'max:17',
                ],
                [
                    'net_days.max' => 'Max 5,0 digits',
                    'discount_days.max' => 'Max 5,0 digits',
                    'discount_percent.max' => 'Max 3,3 digits',
                    'service_charge_percent.max' => 'Max 3,3 digits',
                    'service_charge_min.max' => 'Max 11,2 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $pay = PaymentTerm::find($id);
                $pay->description = $request->description;
                $pay->net_days = ($request->net_days != null) ? str_replace(",", "", $request->net_days) : 0;
                $pay->net_date = ($request->net_date == "yes") ? true : false;
                $pay->discount_days = ($request->discount_days != null) ? str_replace(",", "", $request->discount_days) : 0;
                $pay->discount_date = ($request->discount_date == "yes") ? true : false;
                $pay->shipment_date_flag = ($request->shipment_date_flag == "yes") ? true : false;
                $pay->discount_percent = ($request->discount_percent != null) ? str_replace(",", "", $request->discount_percent) : 0;
                $pay->service_charge_min = ($request->service_charge_min != null) ? str_replace(",", "", $request->service_charge_min) : 0;
                $pay->service_charge_percent = ($request->service_charge_percent != null) ? str_replace(",", "", $request->service_charge_percent) : 0;
                $pay->update();

                DB::commit();
                return to_route('pay_term.index')->with('success', 'Payment term has been updated!');
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
    public function destroy(PaymentTerm $pay_term)
    {
        if (Auth::user()->hasPermission('delete-pay_term')) {
            $pay_term->delete();

            return to_route('pay_term.index')->with('success', 'Payment term has been deleted!');
        } else {
            abort(403);
        }
    }
}
