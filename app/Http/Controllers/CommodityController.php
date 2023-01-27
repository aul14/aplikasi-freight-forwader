<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Commodity;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-commodity')) {
            if ($request->ajax()) {
                $commodity = Commodity::select('*');
                return DataTables::of($commodity)
                    ->addColumn('action', function ($commodity) {
                        return view('datatable-modal._action', [
                            'row_id' => $commodity->id,
                            'edit_url' => route('commodity.edit', $commodity->id),
                            'delete_url' => route('commodity.destroy', $commodity->id),
                            'can_edit' => 'edit-commodity',
                            'can_delete' => 'delete-commodity'
                        ]);
                    })
                    ->editColumn('updated_at', function ($commodity) {
                        return !empty($commodity->updated_at) ? date("d-m-Y H:i", strtotime($commodity->updated_at)) : "-";
                    })
                    ->editColumn('dutiable', function ($commodity) {
                        return ($commodity->dutiable == true) ? "yes" : "no";
                    })
                    ->rawColumns(['updated_at', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            // INSERT TABLE HISTORY
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Commodity')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Commodity')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Commodity',
                    'url_menu'  => route('commodity.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Commodity',
                    'url_menu'  => route('commodity.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.commodity.index');
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
        if (Auth::user()->hasPermission('create-commodity')) {
            return view('master.commodity.create');
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
        if (Auth::user()->hasPermission('create-commodity')) {
            $request->validate([
                'code'    => 'required|max:10|unique:commodity,code',
                'description'           => 'required|max:50|unique:commodity,description',
            ]);

            $commodity = new Commodity();
            $commodity->code = $request->code;
            $commodity->description = $request->description;
            $commodity->dutiable = ($request->dutiable == "yes") ? true : false;
            $commodity->save();

            return to_route('commodity.index')->with('success', 'New commodity has been added!');
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
    public function edit(Commodity $commodity)
    {
        if (Auth::user()->hasPermission('edit-commodity')) {
            return view('master.commodity.edit', compact('commodity'));
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
        if (Auth::user()->hasPermission('edit-commodity')) {
            $request->validate([
                'code'    => 'max:10|unique:commodity,code,' . $id,
                'description'           => 'required|max:50|unique:commodity,description,' . $id,
            ]);

            $commodity = Commodity::find($id);
            $commodity->description = $request->description;
            $commodity->dutiable = ($request->dutiable == "yes") ? true : false;
            $commodity->update();

            return to_route('commodity.index')->with('success', 'Commodity has been updated!');
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
    public function destroy(Commodity  $commodity)
    {
        if (Auth::user()->hasPermission('delete-commodity')) {
            $commodity->delete();

            return to_route('commodity.index')->with('success', 'Commodity has been deleted!');
        } else {
            abort(403);
        }
    }
}
