<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Incoterms;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class IncotermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-incoterms')) {
            if ($request->ajax()) {
                $incoterms = Incoterms::select('*');
                return DataTables::of($incoterms)
                    ->addColumn('action', function ($incoterms) {
                        return view('datatable-modal._action', [
                            'row_id' => $incoterms->id,
                            'edit_url' => route('incoterms.edit', $incoterms->id),
                            'delete_url' => route('incoterms.destroy', $incoterms->id),
                            'can_edit' => 'edit-incoterms',
                            'can_delete' => 'delete-incoterms'
                        ]);
                    })
                    ->editColumn('updated_at', function ($incoterms) {
                        return !empty($incoterms->updated_at) ? date("d-m-Y H:i", strtotime($incoterms->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Incoterms')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Incoterms')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Incoterms',
                    'url_menu'  => route('incoterms.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Incoterms',
                    'url_menu'  => route('incoterms.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.incoterms.index');
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
        if (Auth::user()->hasPermission('create-incoterms')) {
            return view('master.incoterms.create');
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
        if (Auth::user()->hasPermission('create-incoterms')) {
            $validateData = $request->validate(
                [
                    'code'         => 'required|max:3|unique:incoterms,code',
                    'description'  => 'required|max:50',
                ],
            );

            Incoterms::create($validateData);

            return to_route('incoterms.index')->with('success', 'New incoterms has been added!');
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
    public function edit(Incoterms $incoterm)
    {
        if (Auth::user()->hasPermission('edit-incoterms')) {
            return view('master.incoterms.edit', compact('incoterm'));
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
        if (Auth::user()->hasPermission('edit-incoterms')) {
            $validateData = $request->validate(
                [
                    'code'         => 'required|max:3|unique:incoterms,code,' . $id,
                    'description'  => 'required|max:50'
                ],
            );

            Incoterms::where('id', $id)->update($validateData);

            return to_route('incoterms.index')->with('success', 'Incoterms has been updated!');
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
    public function destroy(Incoterms $incoterm)
    {
        if (Auth::user()->hasPermission('edit-incoterms')) {
            $incoterm->delete();

            return to_route('incoterms.index')->with('success', 'Incoterms has been deleted!');
        } else {
            abort(403);
        }
    }
}
