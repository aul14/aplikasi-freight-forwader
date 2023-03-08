<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\WebTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $count =  History::where('user_id', auth()->user()->id)->count();
        // if ($count >= 3) {
        //     $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Dashboard')->count();
        //     if ($cek_double > 1) {
        //         History::where('user_id', auth()->user()->id)->where('menu', 'Dashboard')->limit(1)->delete();
        //     } else {
        //         History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
        //     }
        //     History::insert([
        //         'user_id'   => auth()->user()->id,
        //         'menu'      => 'Dashboard',
        //         'url_menu'  => route('home'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // } else {
        //     History::insert([
        //         'user_id'   => auth()->user()->id,
        //         'menu'      => 'Dashboard',
        //         'url_menu'  => route('home'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        return view('pages.dashboard');
    }

    public function update_template(Request $request)
    {
        DB::beginTransaction();
        try {
            $cek_user = WebTemplate::where('user_id', auth()->user()->id)->first();
            if ($cek_user == null) {
                WebTemplate::insert([
                    'user_id'   => auth()->user()->id,
                    'sidebar_color' => $request->sidebar_color,
                    'sidebar_type' => $request->sidebar_type,
                    'mode' => ($request->mode == 'dark') ? 'dark' : 'light',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                WebTemplate::where('user_id', auth()->user()->id)->update([
                    'user_id'   => auth()->user()->id,
                    'sidebar_color' => $request->sidebar_color,
                    'sidebar_type' => $request->sidebar_type,
                    'mode' => ($request->mode == 'dark') ? 'dark' : 'light',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
}
