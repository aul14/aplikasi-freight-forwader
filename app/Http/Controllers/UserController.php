<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\History;
use App\Models\RoleUser;
use Laratrust\Laratrust;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermission('manage-user')) {
            if ($request->ajax()) {
                $user = User::with('roles')->orderBy('users.id', 'DESC')->get();
                return DataTables::of($user)
                    ->addColumn('action', function ($user) {
                        return view('datatable-modal._action', [
                            'row_id' => $user->id,
                            'edit_url' => route('users.edit', $user->id),
                            'delete_url' => route('users.destroy', $user->id),
                            'can_edit' => 'edit-user',
                            'can_delete' => 'delete-user'
                        ]);
                    })
                    ->editColumn('last_login', function ($user) {
                        return !empty($user->last_login) ? date("d-M-Y H:i", strtotime($user->last_login)) : "-";
                    })
                    ->rawColumns(['last_login', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }

            $count =  History::where('user_id', auth()->user()->id)->count();
            if ($count == 3) {
                History::where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->limit(1)->delete();
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'User Management',
                    'url_menu'  => route('users.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                History::insert([
                    'user_id'   => auth()->user()->id,
                    'menu'      => 'User Management',
                    'url_menu'  => route('users.index'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return view('user.index');
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
        if (Auth::user()->hasPermission('create-user')) {
            $roles = Role::all();
            return view('user.create', compact('roles'));
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

        if (Auth::user()->hasPermission('create-user')) {
            $request->validate([
                'username'     => 'required|min:3|unique:users,username',
                'email'      => 'required|unique:users,email|email',
                'password'   => 'required|min:4',
                'role_id' => 'required'
            ]);

            // dd($request);
            DB::beginTransaction();
            try {
                $user = new User();
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->save();

                $role_user = new RoleUser();
                $role_user->user_id = $user->id;
                $role_user->role_id = $request->role_id;
                $role_user->user_type = 'App\Models\User';
                $role_user->save();

                DB::commit();
                return to_route('users.index')->with('success', 'New user has been added!');
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
    public function edit(User $user)
    {
        if (Auth::user()->hasPermission('edit-user')) {
            $roles = Role::all();
            $role_user = RoleUser::where('user_id', $user->id)->first();
            return view('user.edit', compact('user', 'roles', 'role_user'));
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
        if (Auth::user()->hasPermission('edit-user')) {
            $request->validate([
                'username'     => 'required|min:3|unique:users,username,' . $id,
                'email'      => 'required|email|unique:users,email,' . $id,
                'role_id' => 'required'
            ]);

            // dd($request);
            DB::beginTransaction();
            try {
                $user = User::find($id);
                $user->username = $request->username;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->update();

                DB::table('role_user')->where('user_id', '=', $id)
                    ->update(['role_id' => $request->role_id]);

                DB::commit();
                return to_route('users.index')->with('success', 'User has been updated!');
            } catch (\Throwable $th) {
                DB::rollback();

                return redirect()->back()->withInput()->with('error', $th->getMessage());
            }
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
    public function destroy(User $user)
    {
        if (Auth::user()->hasPermission('delete-user')) {
            $user->delete();
            return to_route('users.index')->with('success', 'User has been deleted!');
        } else {
            abort(403);
        }
    }

    public function reset_password($id)
    {
    }
}
