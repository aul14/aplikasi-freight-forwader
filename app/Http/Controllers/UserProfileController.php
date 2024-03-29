<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        $count =  History::where('user_id', auth()->user()->id)->count();
        if ($count >= 3) {
            $cek_double = History::where('user_id', auth()->user()->id)->where('menu', 'Profile')->count();
            if ($cek_double > 1) {
                History::where('user_id', auth()->user()->id)->where('menu', 'Profile')->limit(1)->delete();
            } else {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
            }
            History::insert([
                'user_id'   => auth()->user()->id,
                'menu'      => 'Profile',
                'url_menu'  => route('profile'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            History::insert([
                'user_id'   => auth()->user()->id,
                'menu'      => 'Profile',
                'url_menu'  => route('profile'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => ['required', 'max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]);

        auth()->user()->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about')
        ]);
        return back()->with('succes', 'Profile succesfully updated');
    }
}
