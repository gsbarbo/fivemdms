<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Permission::create(['title' => $request->title]);

        return redirect()->route('portal.admin.permissions.index')->with('alert', ['message' => ['Permission saved.'], 'level' => "success"]);
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        // $undo = "<a href='" . route('portal.admin.permissions.restore', $permission->id) . "'>Undo</a>";
        $undo = "";

        return redirect()->route('portal.admin.permissions.index')->with('alert', ['message' => ['Permission deleted.', $undo], 'level' => "success"]);
    }

    public function restore(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->restore();

        return redirect()->route('portal.admin.permissions.index')->with('alert', ['message' => ['Permission restored.'], 'level' => "success"]);
    }
}
