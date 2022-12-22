<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        $list_db =  DB::select(DB::raw("SELECT datname from pg_database where datname not in ('postgres', 'template1', 'template0')"));
        return view('auth.login', compact('list_db'));
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'datname' => ['required'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        $request->session()->regenerate();

        auth()->user()->update([
            'last_login' => now(),
        ]);

        return redirect()->intended('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function change_db_connection(Request $request)
    {
        Cache::put('db-connection', $request->connection, now()->addYears(100));
    }
}
