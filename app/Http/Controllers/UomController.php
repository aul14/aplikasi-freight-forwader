<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use App\Models\History;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-uom')) {
            if ($request->ajax()) {
                $uom = Uom::select('*');
                return DataTables::of($uom)
                    ->addColumn('action', function ($uom) {
                        return view('datatable-modal._action', [
                            'row_id' => $uom->id,
                            'edit_url' => route('uom.edit', $uom->id),
                            'delete_url' => route('uom.destroy', $uom->id),
                            'can_edit' => 'edit-uom',
                            'can_delete' => 'delete-uom'
                        ]);
                    })
                    ->editColumn('updated_at', function ($uom) {
                        return !empty($uom->updated_at) ? date("d-m-Y H:i", strtotime($uom->updated_at)) : "-";
                    })
                    ->editColumn('conversion_factor', function ($uom) {
                        return number_format($uom->conversion_factor, 6, ".", ",");
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Unit Of Measurement')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Unit Of Measurement')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Unit Of Measurement',
                    'url_menu'  => route('uom.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Unit Of Measurement',
                    'url_menu'  => route('uom.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.uom.index');
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
        if (Auth::user()->hasPermission('create-uom')) {
            return view('master.uom.create');
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
        if (Auth::user()->hasPermission('create-uom')) {
            $request->validate(
                [
                    'code'    => 'required|max:3|unique:uom,code',
                    'description'  => 'max:50',
                    'conversion_factor'  => 'max:16',
                ],
                [
                    'conversion_factor.max' => 'Max 7,6 digits',
                ]
            );

            $uom = new Uom();
            $uom->code = $request->code;
            $uom->description = $request->description;
            $uom->type = $request->type;
            $uom->conversion_factor = ($request->conversion_factor != null) ? str_replace(",", "", $request->conversion_factor) : 0;
            $uom->save();

            return to_route('uom.index')->with('success', 'New uom has been added!');
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
    public function edit(Uom $uom)
    {
        if (Auth::user()->hasPermission('edit-uom')) {
            $conversion_factor = number_format($uom->conversion_factor, 6, ".", ",");

            return view('master.uom.edit', compact('uom', 'conversion_factor'));
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
        if (Auth::user()->hasPermission('edit-uom')) {
            $request->validate(
                [
                    'code'    => 'max:3|unique:uom,code,' . $id,
                    'description'  => 'max:50',
                    'conversion_factor'  => 'max:16',
                ],
                [
                    'conversion_factor.max' => 'Max 7,6 digits',
                ]
            );

            $uom = Uom::find($id);
            $uom->description = $request->description;
            $uom->type = $request->type;
            $uom->conversion_factor = ($request->conversion_factor != null) ? str_replace(",", "", $request->conversion_factor) : 0;
            $uom->update();

            return to_route('uom.index')->with('success', 'Uom has been updated!');
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
    public function destroy(Uom $uom)
    {
        if (Auth::user()->hasPermission('delete-uom')) {
            $uom->delete();

            return to_route('uom.index')->with('success', 'Uom has been deleted!');
        } else {
            abort(403);
        }
    }
}
