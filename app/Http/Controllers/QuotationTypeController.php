<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Models\QuotationType;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class QuotationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-quotation_type')) {
            if ($request->ajax()) {
                $quotation_type = QuotationType::select('*');
                return DataTables::of($quotation_type)
                    ->addColumn('action', function ($quotation_type) {
                        return view('datatable-modal._action', [
                            'row_id' => $quotation_type->id,
                            'edit_url' => route('quotation_type.edit', $quotation_type->id),
                            'delete_url' => route('quotation_type.destroy', $quotation_type->id),
                            'can_edit' => 'edit-quotation_type',
                            'can_delete' => 'delete-quotation_type'
                        ]);
                    })
                    ->editColumn('updated_at', function ($quotation_type) {
                        return !empty($quotation_type->updated_at) ? date("d-m-Y H:i", strtotime($quotation_type->updated_at)) : "-";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Quotation Type')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Quotation Type')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Quotation Type',
                    'url_menu'  => route('quotation_type.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Quotation Type',
                    'url_menu'  => route('quotation_type.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('master.quotation_type.index');
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
        if (Auth::user()->hasPermission('create-quotation_type')) {
            return view('master.quotation_type.create');
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
        if (Auth::user()->hasPermission('create-quotation_type')) {
            $validateData = $request->validate(
                [
                    'type'         => 'required|max:5|unique:quotation_type,type',
                    'description'  => 'required|max:50',
                ],
            );

            QuotationType::create($validateData);

            return to_route('quotation_type.index')->with('success', 'New Quotation Type has been added!');
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
    public function edit(QuotationType $quotation_type)
    {
        if (Auth::user()->hasPermission('edit-quotation_type')) {
            return view('master.quotation_type.edit', compact('quotation_type'));
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
        if (Auth::user()->hasPermission('edit-quotation_type')) {
            $validateData = $request->validate(
                [
                    'type'         => 'max:5|unique:quotation_type,type,' . $id,
                    'description'  => 'required|max:50',
                ],
            );

            QuotationType::where('id', $id)->update($validateData);

            return to_route('quotation_type.index')->with('success', 'Quotation Type has been updated!');
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
    public function destroy(QuotationType $quotation_type)
    {
        if (Auth::user()->hasPermission('delete-quotation_type')) {
            $quotation_type->delete();

            return to_route('quotation_type.index')->with('success', 'Quotation Type has been deleted!');
        } else {
            abort(403);
        }
    }
}
