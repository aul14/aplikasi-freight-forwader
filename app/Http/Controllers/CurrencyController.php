<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Currency;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CurrencyDetailSatu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-currency')) {
            if ($request->ajax()) {
                $currency = Currency::select('*');
                return DataTables::of($currency)
                    ->addColumn('action', function ($currency) {
                        return view('datatable-modal._action', [
                            'row_id' => $currency->id,
                            'edit_url' => route('currency.edit', $currency->id),
                            'delete_url' => route('currency.destroy', $currency->id),
                            'can_edit' => 'edit-currency',
                            'can_delete' => 'delete-currency'
                        ]);
                    })
                    ->editColumn('updated_at', function ($currency) {
                        return !empty($currency->updated_at) ? date("d-m-Y H:i", strtotime($currency->updated_at)) : "-";
                    })
                    ->editColumn('variance_percent', function ($currency) {
                        return number_format($currency->variance_percent, 3, ".", ",");
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Currency Code')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Currency Code')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Currency Code',
                    'url_menu'  => route('currency.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Currency Code',
                    'url_menu'  => route('currency.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.currency.index');
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
        if (Auth::user()->hasPermission('create-currency')) {
            return view('master.currency.create');
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
        if (Auth::user()->hasPermission('create-currency')) {
            $request->validate(
                [
                    'code'    => 'required|max:3|unique:currency,code',
                    'description'  => 'max:30|unique:currency,description',
                    'large_name'  => 'max:30',
                    'small_name'  => 'max:30',
                    'markup_percent'     => 'max:17',
                    'variance_percent'     => 'max:17',
                ],
                [
                    'markup_percent.max' => 'Max 11,2 digits',
                    'variance_percent.max' => 'Max 10,3 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $currency = new Currency();
                $currency->code = $request->code;
                $currency->description = $request->description;
                $currency->large_name = $request->large_name;
                $currency->small_name = $request->small_name;
                $currency->markup_percent = ($request->markup_percent != null) ? str_replace(",", "", $request->markup_percent) : 0;
                $currency->variance_percent = ($request->variance_percent != null) ?  str_replace(",", "", $request->variance_percent) : 0;
                $currency->save();

                $result = [];
                if ($request->date != null) {
                    foreach ($request->date as $key => $val) {
                        $result[] = [
                            'currency_id' => $currency->id,
                            'date'       => $val,
                            'curr_rate'       => ($request->curr_rate[$key] != null) ? str_replace(",", "", $request->curr_rate[$key]) : 0,
                            'remark'       => ($request->remark[$key] != null) ? str_replace(",", "", $request->remark[$key]) : "",
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    CurrencyDetailSatu::insert($result);
                }

                DB::commit();
                return to_route('currency.index')->with('success', 'New currency has been added!');
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
    public function edit($id)
    {
        if (Auth::user()->hasPermission('edit-currency')) {
            $currency = Currency::with('currency_detail_satu')->where('id', $id)->first();
            $markup_percent = number_format($currency->markup_percent, 2, ".", ",");
            $variance_percent = number_format($currency->variance_percent, 3, ".", ",");
            $detail_cr = CurrencyDetailSatu::where('currency_id', $currency->id)->get();

            return view('master.currency.edit', compact('currency', 'variance_percent', 'markup_percent', 'detail_cr'));
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
        if (Auth::user()->hasPermission('edit-currency')) {
            $request->validate(
                [
                    'code'    => 'max:3|unique:currency,code,' . $id,
                    'description'  => 'max:30|unique:currency,description,' . $id,
                    'large_name'  => 'max:30',
                    'small_name'  => 'max:30',
                    'markup_percent'     => 'max:17',
                    'variance_percent'     => 'max:17',
                ],
                [
                    'markup_percent.max' => 'Max 11,2 digits',
                    'variance_percent.max' => 'Max 10,3 digits',
                ]
            );

            DB::beginTransaction();
            try {
                $currency = Currency::find($id);
                $currency->description = $request->description;
                $currency->large_name = $request->large_name;
                $currency->small_name = $request->small_name;
                $currency->markup_percent = ($request->markup_percent != null) ? str_replace(",", "", $request->markup_percent) : 0;
                $currency->variance_percent = ($request->variance_percent != null) ?  str_replace(",", "", $request->variance_percent) : 0;
                $currency->update();

                $currency->currency_detail_satu()->delete();
                $result = [];
                if ($request->date != null) {
                    foreach ($request->date as $key => $val) {
                        $result[] = [
                            'currency_id' => $currency->id,
                            'date'       => $val,
                            'curr_rate'       => ($request->curr_rate[$key] != null) ? str_replace(",", "", $request->curr_rate[$key]) : 0,
                            'remark'       => ($request->remark[$key] != null) ? str_replace(",", "", $request->remark[$key]) : "",
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    CurrencyDetailSatu::insert($result);
                }

                DB::commit();
                return to_route('currency.index')->with('success', 'Currency has been updated!');
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
    public function destroy(Currency $currency)
    {
        if (Auth::user()->hasPermission('delete-currency')) {
            $currency->delete();
            return to_route('currency.index')->with('success', 'Currency has been deleted!');
        } else {
            abort(403);
        }
    }
}
