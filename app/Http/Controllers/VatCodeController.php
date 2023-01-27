<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\VatCode;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\VatCodeDetailSatu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VatCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-vat')) {
            if ($request->ajax()) {
                $vat = VatCode::select('*');
                return DataTables::of($vat)
                    ->addColumn('action', function ($vat) {
                        return view('datatable-modal._action', [
                            'row_id' => $vat->id,
                            'edit_url' => route('vat_code.edit', $vat->id),
                            'delete_url' => route('vat_code.destroy', $vat->id),
                            'can_edit' => 'edit-vat',
                            'can_delete' => 'delete-vat'
                        ]);
                    })
                    ->editColumn('updated_at', function ($vat) {
                        return !empty($vat->updated_at) ? date("d-m-Y H:i", strtotime($vat->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'VAT Code')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'VAT Code')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'VAT Code',
                    'url_menu'  => route('vat_code.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'VAT Code',
                    'url_menu'  => route('vat_code.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.vat.index');
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
        if (Auth::user()->hasPermission('create-vat')) {
            return view('master.vat.create');
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
        if (Auth::user()->hasPermission('create-vat')) {
            $request->validate(
                [
                    'code'    => 'required|max:10|unique:vat_code,code',
                    'description'  => 'max:50',
                    'input_ta_code'  => 'max:15',
                    'output_ta_code'  => 'max:15',
                    'paid_in_ta_code'  => 'max:15',
                    'paid_out_ta_code'  => 'max:15',
                ]
            );

            DB::beginTransaction();
            try {
                $vat_code = new VatCode();
                $vat_code->code = $request->code;
                $vat_code->description = $request->description;
                $vat_code->type = $request->type;
                $vat_code->sales_cost = $request->sales_cost;
                $vat_code->inclusice = $request->inclusice;
                $vat_code->input_ta_code = $request->input_ta_code;
                $vat_code->output_ta_code = $request->output_ta_code;
                $vat_code->paid_in_ta_code = $request->paid_in_ta_code;
                $vat_code->paid_out_ta_code = $request->paid_out_ta_code;
                $vat_code->save();

                $result = [];
                if ($request->date[0] != null) {
                    foreach ($request->date as $key => $val) {
                        $result[] = [
                            'vat_code_id' => $vat_code->id,
                            'date'       => $val,
                            'vat_rate'  => ($request->vat_rate_detail[$key] != null) ? str_replace(",", "", $request->vat_rate_detail[$key]) : 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    VatCodeDetailSatu::insert($result);
                }

                DB::commit();
                return to_route('vat_code.index')->with('success', 'New VAT Code has been added!');
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
    public function edit(VatCode $vat_code)
    {
        if (Auth::user()->hasPermission('edit-vat')) {
            $detail_vat = VatCodeDetailSatu::where('vat_code_id', $vat_code->id)->get();
            return view('master.vat.edit', compact('vat_code', 'detail_vat'));
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
        if (Auth::user()->hasPermission('edit-vat')) {
            $request->validate(
                [
                    'code'    => 'required|max:10|unique:vat_code,code,' . $id,
                    'description'  => 'max:50',
                    'input_ta_code'  => 'max:15',
                    'output_ta_code'  => 'max:15',
                    'paid_in_ta_code'  => 'max:15',
                    'paid_out_ta_code'  => 'max:15',
                ]
            );

            DB::beginTransaction();
            try {
                $vat_code = VatCode::find($id);
                $vat_code->description = $request->description;
                $vat_code->type = $request->type;
                $vat_code->sales_cost = $request->sales_cost;
                $vat_code->inclusice = $request->inclusice;
                $vat_code->input_ta_code = $request->input_ta_code;
                $vat_code->output_ta_code = $request->output_ta_code;
                $vat_code->paid_in_ta_code = $request->paid_in_ta_code;
                $vat_code->paid_out_ta_code = $request->paid_out_ta_code;
                $vat_code->update();

                $vat_code->vat_code_detail_satu()->delete();
                $result = [];
                if ($request->date[0] != null) {
                    foreach ($request->date as $key => $val) {
                        $result[] = [
                            'vat_code_id' => $vat_code->id,
                            'date'       => $val,
                            'vat_rate'  => ($request->vat_rate_detail[$key] != null) ? str_replace(",", "", $request->vat_rate_detail[$key]) : 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    VatCodeDetailSatu::insert($result);
                }

                DB::commit();
                return to_route('vat_code.index')->with('success', 'VAT Code has been updated!');
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
    public function destroy(VatCode $vat_code)
    {
        if (Auth::user()->hasPermission('delete-vat')) {
            $vat_code->delete();

            return to_route('vat_code.index')->with('success', 'VAT Code has been deleted!');
        } else {
            abort(403);
        }
    }
}
