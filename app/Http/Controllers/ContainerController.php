<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Container;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-container')) {
            if ($request->ajax()) {
                $container = Container::select('*');
                return DataTables::of($container)
                    ->addColumn('action', function ($container) {
                        return view('datatable-modal._action', [
                            'row_id' => $container->id,
                            'edit_url' => route('container.edit', $container->id),
                            'delete_url' => route('container.destroy', $container->id),
                            'can_edit' => 'edit-container',
                            'can_delete' => 'delete-container'
                        ]);
                    })
                    ->editColumn('updated_at', function ($container) {
                        return !empty($container->updated_at) ? date("d-m-Y H:i", strtotime($container->updated_at)) : "-";
                    })
                    ->editColumn('no_of_teu', function ($container) {
                        return number_format($container->no_of_teu, 2, ".", ",");
                    })
                    ->editColumn('max_cubic', function ($container) {
                        return number_format($container->max_cubic, 4, ".", ",");
                    })
                    ->editColumn('max_volume', function ($container) {
                        return number_format($container->max_volume, 4, ".", ",");
                    })
                    ->editColumn('max_weight', function ($container) {
                        return number_format($container->max_weight, 4, ".", ",");
                    })
                    ->rawColumns(['updated_at', 'action', 'no_of_teu', 'max_cubic', 'max_volume', 'max_weight'])
                    ->addIndexColumn()
                    ->make(true);
            }

            // INSERT TABLE HISTORY
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Container')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'Container')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Container',
                    'url_menu'  => route('container.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'Container',
                    'url_menu'  => route('container.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            return view('master.container.index');
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
        if (Auth::user()->hasPermission('create-container')) {
            return view('master.container.create');
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
        if (Auth::user()->hasPermission('create-container')) {
            $validateData =  $request->validate(
                [
                    'type'    => 'required|max:5',
                    'description'  => 'required|max:50|unique:container,description',
                    'size'  => 'required',
                    'iso_size'  => 'max:2',
                    'no_of_teu'     => 'max:17',
                    'max_cubic'     => 'max:16',
                    'max_volume'     => 'max:16',
                    'max_weight'     => 'max:16',
                    'temp_degree'     => 'max:20',
                ],
                [
                    'no_of_teu.max' => 'Max 11,2 digits',
                    'max_cubic.max' => 'Max 9,4 digits',
                    'max_volume.max' => 'Max 9,4 digits',
                    'max_weight.max' => 'Max 9,4 digits',
                ]
            );


            $validateData['temp_flag'] = ($request->temp_flag == "yes") ? true : false;
            $validateData['no_of_teu'] = ($request->no_of_teu != null) ? str_replace(",", "", $request->no_of_teu) : 0;
            $validateData['max_cubic'] = ($request->max_cubic != null) ? str_replace(",", "", $request->max_cubic) : 0;
            $validateData['max_volume'] = ($request->max_volume != null) ? str_replace(",", "", $request->max_volume) : 0;
            $validateData['max_weight'] = ($request->max_weight != null) ? str_replace(",", "", $request->max_weight) : 0;
            // $validateData['no_of_teu'] = ($request->no_of_teu != null) ? preg_replace("/[^0-9]/", "", substr($request->no_of_teu, 0, 15)) : 0;
            // $validateData['max_cubic'] = ($request->max_cubic != null) ? preg_replace("/[^0-9]/", "", substr($request->max_cubic, 0, 12)) : 0;
            // $validateData['max_volume'] = ($request->max_volume != null) ? preg_replace("/[^0-9]/", "", substr($request->max_volume, 0, 12)) : 0;
            // $validateData['max_weight'] = ($request->max_weight != null) ? preg_replace("/[^0-9]/", "", substr($request->max_weight, 0, 12)) : 0;

            Container::create($validateData);

            return to_route('container.index')->with('success', 'New container has been added!');
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
    public function edit(Container $container)
    {
        if (Auth::user()->hasPermission('edit-container')) {
            $no_of_teu = number_format($container->no_of_teu, 2, ".", ",");

            $max_cubic = number_format($container->max_cubic, 4, ".", ",");

            $max_volume = number_format($container->max_volume, 4, ".", ",");

            $max_weight =  number_format($container->max_weight, 4, ".", ",");


            return view('master.container.edit', compact('container', 'no_of_teu', 'max_cubic', 'max_volume', 'max_weight'));
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
        if (Auth::user()->hasPermission('edit-container')) {
            $validateData =  $request->validate(
                [
                    'type'    => 'required|max:5',
                    'description'  => 'required|max:50|unique:container,description,' . $id,
                    'size'  => 'required',
                    'iso_size'  => 'max:2',
                    'no_of_teu'     => 'max:17',
                    'max_cubic'     => 'max:16',
                    'max_volume'     => 'max:16',
                    'max_weight'     => 'max:16',
                    'temp_degree'     => 'max:20',
                ],
                [
                    'no_of_teu.max' => 'Max 11,2 digits',
                    'max_cubic.max' => 'Max 9,4 digits',
                    'max_volume.max' => 'Max 9,4 digits',
                    'max_weight.max' => 'Max 9,4 digits',
                ]
            );


            $validateData['temp_flag'] = ($request->temp_flag == "yes") ? true : false;
            $validateData['no_of_teu'] = ($request->no_of_teu != null) ? str_replace(",", "", $request->no_of_teu) : 0;
            $validateData['max_cubic'] = ($request->max_cubic != null) ? str_replace(",", "", $request->max_cubic) : 0;
            $validateData['max_volume'] = ($request->max_volume != null) ? str_replace(",", "", $request->max_volume) : 0;
            $validateData['max_weight'] = ($request->max_weight != null) ? str_replace(",", "", $request->max_weight) : 0;
            // $validateData['no_of_teu'] = ($request->no_of_teu != null) ? preg_replace("/[^0-9]/", "", substr($request->no_of_teu, 0, 15)) : 0;
            // $validateData['max_cubic'] = ($request->max_cubic != null) ? preg_replace("/[^0-9]/", "", substr($request->max_cubic, 0, 12)) : 0;
            // $validateData['max_volume'] = ($request->max_volume != null) ? preg_replace("/[^0-9]/", "", substr($request->max_volume, 0, 12)) : 0;
            // $validateData['max_weight'] = ($request->max_weight != null) ? preg_replace("/[^0-9]/", "", substr($request->max_weight, 0, 12)) : 0;

            Container::where('id', $id)->update($validateData);
            return to_route('container.index')->with('success', 'Container has been updated!');
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
    public function destroy(Container $container)
    {
        if (Auth::user()->hasPermission('delete-container')) {
            $container->delete();

            return to_route('container.index')->with('success', 'Container has been deleted!');
        } else {
            abort(403);
        }
    }
}
