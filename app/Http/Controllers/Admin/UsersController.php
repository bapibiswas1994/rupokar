<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of Admin User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $users = Admin::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new Admin User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created Admin User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = Admin::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing Admin User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update Admin User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, Admin $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->update($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    public function show(Admin $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove Admin User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected Admin User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        Admin::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
