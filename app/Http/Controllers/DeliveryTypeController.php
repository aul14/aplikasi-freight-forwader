<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\DeliveryType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class DeliveryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-del_type')) {
            if ($request->ajax()) {
                $del_type = DeliveryType::select('*');
                return DataTables::of($del_type)
                    ->addColumn('action', function ($del_type) {
                        return view('datatable-modal._action', [
                            'row_id' => $del_type->id,
                            'edit_url' => route('del_type.edit', $del_type->id),
                            'delete_url' => route('del_type.destroy', $del_type->id),
                            'can_edit' => 'edit-del_type',
                            'can_delete' => 'delete-del_type'
                        ]);
                    })
                    ->editColumn('updated_at', function ($del_type) {
                        return !empty($del_type->updated_at) ? date("d-m-Y H:i", strtotime($del_type->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Delivery Type')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Delivery Type')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Delivery Type',
                    'url_menu'  => route('del_type.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Delivery Type',
                    'url_menu'  => route('del_type.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.delivery_type.index');
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
        if (Auth::user()->hasPermission('create-del_type')) {
            return view('master.delivery_type.create');
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
        if (Auth::user()->hasPermission('create-del_type')) {
            $validateData = $request->validate(
                [
                    'type'         => 'required|max:5|unique:delivery_types,type',
                    'description'  => 'required|max:50',
                ],
            );

            DeliveryType::create($validateData);

            return to_route('del_type.index')->with('success', 'New Delivery Type has been added!');
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
    public function edit(DeliveryType $del_type)
    {
        if (Auth::user()->hasPermission('edit-del_type')) {
            return view('master.delivery_type.edit', compact('del_type'));
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
        if (Auth::user()->hasPermission('edit-del_type')) {
            $validateData = $request->validate(
                [
                    'type'         => 'max:5|unique:delivery_types,type,' . $id,
                    'description'  => 'required|max:50',
                ],
            );

            DeliveryType::where('id', $id)->update($validateData);

            return to_route('del_type.index')->with('success', 'Delivery Type has been updated!');
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
    public function destroy(DeliveryType $del_type)
    {
        if (Auth::user()->hasPermission('delete-del_type')) {
            $del_type->delete();

            return to_route('del_type.index')->with('success', 'Delivery Type has been deleted!');
        } else {
            abort(403);
        }
    }
}
