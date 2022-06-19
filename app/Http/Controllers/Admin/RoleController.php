<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required_without_all'
        ]);

        $roles = Role::create($request->only('name'));

        $roles->syncPermissions([$request->permissions]);

        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $permissions = Permission::all();
        $permissionCollection = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        $role = Role::findOrFail($id);

        return view('roles.edit', compact('role', 'permissions', 'permissionCollection'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required_without_all'
        ]);

        $role = Role::findOrFail($id);

        $role->update($request->only('name'));

        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index');
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('role.index');
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added');
    }


}
