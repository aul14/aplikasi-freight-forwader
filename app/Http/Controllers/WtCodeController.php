<?php

namespace App\Http\Controllers;

use App\Models\WtCode;
use App\Models\History;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class WtCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-wt_code')) {
            if ($request->ajax()) {
                $wt_code = WtCode::all()->sortByDesc("id");
                return DataTables::of($wt_code)
                    ->addColumn('action', function ($wt_code) {
                        return view('datatable-modal._action_no_role', [
                            'row_id' => $wt_code->id,
                            'edit_url' => route('wt_code.edit', $wt_code->id),
                            'delete_url' => route('wt_code.destroy', $wt_code->id),
                            'can_edit' => 'edit-wt_code',
                            'can_delete' => 'delete-wt_code'
                        ]);
                    })
                    ->editColumn('updated_at', function ($wt_code) {
                        return !empty($wt_code->updated_at) ? date("d-m-Y H:i", strtotime($wt_code->updated_at)) : "-";
                    })
                    ->editColumn('tax_rate', function ($wt_code) {
                        return number_format($wt_code->tax_rate, 3, ".", ",");
                    })
                    ->rawColumns(['updated_at', 'action', 'tax_rate'])
                    ->addIndexColumn()
                    ->make(true);
            }

            // INSERT TABLE HISTORY
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Withholding Tax',
                    'url_menu'  => route('wt_code.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Withholding Tax',
                    'url_menu'  => route('wt_code.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.wt_code.index');
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
        if (Auth::user()->hasPermission('create-wt_code')) {
            return view('master.wt_code.create');
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
        if (Auth::user()->hasPermission('create-wt_code')) {
            $request->validate(
                [
                    'code'    => 'required|max:3',
                    'description'  => 'required|max:50',
                    'tax_rate'     => 'max:11',
                    'wht_c_acc_code'     => 'max:15',
                    'wht_p_acc_code'     => 'max:15',
                ],
                [
                    'tax_rate.max' => 'Max 6,3 digits',
                ]
            );

            $wt_code = new WtCode();
            $wt_code->code = $request->code;
            $wt_code->description = $request->description;
            $wt_code->tax_rate = $request->tax_rate;
            $wt_code->vendor_type_id = $request->vendor_type_id;
            $wt_code->wht_c_acc_code = $request->wht_c_acc_code;
            $wt_code->wht_p_acc_code = $request->wht_p_acc_code;
            $wt_code->save();

            return to_route('wt_code.index')->with('success', 'New W/T code has been added!');
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
    public function edit(WtCode $wt_code)
    {
        if (Auth::user()->hasPermission('edit-wt_code')) {
            $tax_rate = number_format($wt_code->tax_rate, 3, ".", ",");
            return view('master.wt_code.edit', compact('wt_code', 'tax_rate'));
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
        if (Auth::user()->hasPermission('edit-wt_code')) {
            $request->validate(
                [
                    'code'    => 'required|max:3',
                    'description'  => 'required|max:50',
                    'tax_rate'     => 'max:11',
                    'wht_c_acc_code'     => 'max:15',
                    'wht_p_acc_code'     => 'max:15',
                ],
                [
                    'tax_rate.max' => 'Max 6,3 digits',
                ]
            );

            $wt_code = WtCode::find($id);
            $wt_code->code = $request->code;
            $wt_code->description = $request->description;
            $wt_code->tax_rate = $request->tax_rate;
            $wt_code->vendor_type_id = $request->vendor_type_id;
            $wt_code->wht_c_acc_code = $request->wht_c_acc_code;
            $wt_code->wht_p_acc_code = $request->wht_p_acc_code;
            $wt_code->update();

            return to_route('wt_code.index')->with('success', 'W/T code has been updated!');
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
    public function destroy(WtCode $wt_code)
    {
        if (Auth::user()->hasPermission('delete-wt_code')) {
            $wt_code->delete();

            return to_route('wt_code.index')->with('success', 'W/T code has been deleted!');
        } else {
            abort(403);
        }
    }
}
