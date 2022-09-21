<?php

namespace App\Http\Controllers\Admin\Management;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $users = User::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
        } else {
            $users = User::all();
        }

        return view('admin.management.users.index', compact('users', 'search'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.management.users.edit', compact('user', 'roles', 'permissions'));
    }

    // public function profile()
    // {
    //     dd('stop');
    //     return view('admin.users.profile');
    // }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $user->update($validated);
        $role = $request->role;
        foreach ($role as $role) {
            $user->assignRole($role);
        }
        return redirect()->route('users.index')->with('message', 'User Data Updated Successfully.');
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'You are admin.');
        }
        $user->delete();
        return back()->with('message', 'User deleted.');
    }
}
