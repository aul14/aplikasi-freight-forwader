<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\SystemNumbering;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SystemNumberingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermission('manage-sys_numbering')) {
            // INSERT TABLE HISTORY
            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count >= 3) {
                $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'System Numbering')->count();
                if ($cek_double > 1) {
                    History::where('user_id', auth()->user()->id)->where('menu', 'System Numbering')->limit(1)->delete();
                } else {
                    History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                }
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'System Numbering',
                    'url_menu'  => route('sys_numbering.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'System Numbering',
                    'url_menu'  => route('sys_numbering.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $sys_num = SystemNumbering::get('*');
            return view('sys_numbering.index', compact('sys_num'));
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
        //
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasPermission('edit-sys_numbering')) {
            DB::beginTransaction();
            try {
                SystemNumbering::truncate();
                $result = [];
                if ($request->module_id != null) {
                    foreach ($request->module_id as $key => $val) {
                        $count_hide = (int)$request->count_hide[$key];
                        $result[] = [
                            'cycle'      => $request->cycle[$key],
                            'description'   => $request->description[$key],
                            'job_type'   => !empty($request->input("job_type_{$count_hide}")) ? implode(",", $request->input("job_type_{$count_hide}")) : "",
                            'next_number'   => $request->next_number[$key],
                            'length_number'   => $request->length_number[$key],
                            'prefix'   => $request->prefix[$key],
                            'module_id'   => $val,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                    SystemNumbering::insert($result);
                }

                DB::commit();
                return to_route('sys_numbering.index')->with('success', 'System numbering has been updated!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
