<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\PartyType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class PartyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-party_type')) {
            if ($request->ajax()) {
                $party_type = PartyType::select('*');
                return DataTables::of($party_type)
                    ->addColumn('action', function ($party_type) {
                        return view('datatable-modal._action', [
                            'row_id' => $party_type->id,
                            'edit_url' => route('party_type.edit', $party_type->id),
                            'delete_url' => route('party_type.destroy', $party_type->id),
                            'can_edit' => 'edit-party_type',
                            'can_delete' => 'delete-party_type'
                        ]);
                    })
                    ->editColumn('updated_at', function ($party_type) {
                        return !empty($party_type->updated_at) ? date("d-m-Y H:i", strtotime($party_type->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Party Type')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Party Type')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Party Type',
                    'url_menu'  => route('party_type.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Party Type',
                    'url_menu'  => route('party_type.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.party.index');
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
        if (Auth::user()->hasPermission('create-party_type')) {
            return view('master.party.create');
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
        if (Auth::user()->hasPermission('create-party_type')) {
            $validateData = $request->validate(
                [
                    'code'         => 'required|max:3',
                    'description'  => 'required|max:50',
                ],
            );

            PartyType::create($validateData);

            return to_route('party_type.index')->with('success', 'New party type has been added!');
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
    public function edit(PartyType $party_type)
    {
        if (Auth::user()->hasPermission('edit-party_type')) {
            return view('master.party.edit', compact('party_type'));
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
        if (Auth::user()->hasPermission('edit-party_type')) {
            $validateData = $request->validate(
                [
                    'code'         => 'max:3',
                    'description'  => 'required|max:50',
                ],
            );

            PartyType::where('id', $id)->update($validateData);

            return to_route('party_type.index')->with('success', 'Party type has been updated!');
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
    public function destroy(PartyType $party_type)
    {
        if (Auth::user()->hasPermission('delete-party_type')) {
            $party_type->delete();

            return to_route('party_type.index')->with('success', 'Party type has been deleted!');
        } else {
            abort(403);
        }
    }
}
