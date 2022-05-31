<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleCreateRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(RoleCreateRequest $request)
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::create(['title' => $request->title]);

        $role->permissions()->sync($request->permissions);
        return redirect()->route('portal.admin.roles.index')->with('alert', ['message' => ['Role created.'], 'level' => "success"]);
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        $rolePermissions = $role->permissions->toArray();

        foreach ($rolePermissions as $key => $value) {
            $role_permissions[] = $value['id'];
        }

        return view('admin.roles.edit', compact('role', 'permissions', 'role_permissions'));
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->permissions()->sync($request->permissions);
        return redirect()->route('portal.admin.roles.index')->with('alert', ['message' => ['Role updated.'], 'level' => "success"]);
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        // $undo = "<a href='" . route('portal.admin.roles.restore', $role->id) . "'>Undo</a>";
        $undo = "";

        return redirect()->route('portal.admin.roles.index')->with('alert', ['message' => ['Role deleted.', $undo], 'level' => "success"]);
    }
}
