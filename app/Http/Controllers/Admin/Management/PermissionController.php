<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.management.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.management.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);
        Permission::create($validated);

        return to_route('permissions.index')->with('message', 'Permission created.');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.management.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => 'required']);
        $permission->update($validated);

        return to_route('permissions.index')->with('message', 'Permission updated.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back()->with('message', 'Permission deleted.');
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }
}
