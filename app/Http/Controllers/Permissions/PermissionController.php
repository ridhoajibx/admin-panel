<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        $permission = new Permission;
        return view('permission.permissions.index', compact('permissions', 'permission'));   
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);
        Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name'),
        ]);
        return back();
    }

    public function edit(Permission $permission)
    {
        return view('permission.permissions.edit', [
            'permission' => $permission, 
            'submit' => 'Update'
        ]);
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required',
        ]);
        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name'),
        ]);
        return redirect()->route('permissions.index');
    }
}
