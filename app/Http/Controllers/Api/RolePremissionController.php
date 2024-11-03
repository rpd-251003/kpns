<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    // Mendapatkan semua role
    public function indexRoles()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    // Menambahkan role baru
    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->name]);
        return response()->json($role, 201);
    }

    // Mengupdate role
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        return response()->json($role);
    }

    // Menghapus role
    public function destroyRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Role deleted successfully']);
    }

    // Mendapatkan semua permission
    public function indexPermissions()
    {
        $permissions = Permission::all();
        return response()->json($permissions);
    }

    // Menambahkan permission baru
    public function storePermission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
        ]);

        $permission = Permission::create(['name' => $request->name]);
        return response()->json($permission, 201);
    }

    // Mengupdate permission
    public function updatePermission(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->save();

        return response()->json($permission);
    }

    // Menghapus permission
    public function destroyPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json(['message' => 'Permission deleted successfully']);
    }

    // Memberikan permission secara massal ke role
    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permissions' => 'required|array', // Memastikan ini adalah array
            'permissions.*' => 'string', // Setiap elemen dalam array harus string
        ]);

        $role = Role::findOrFail($roleId);
        $role->givePermissionTo($request->permissions); // Memberikan semua permission yang diberikan

        return response()->json(['message' => 'Permissions granted to role successfully']);
    }

    // Memperbarui permission untuk role secara massal
    public function updatePermissionsForRole(Request $request, $roleId)
    {
        $request->validate([
            'permissions' => 'required|array', // Memastikan ini adalah array
            'permissions.*' => 'string', // Setiap elemen dalam array harus string
        ]);

        $role = Role::findOrFail($roleId);

        // Menghapus semua permission yang ada
        $role->syncPermissions($request->permissions); // Memperbarui permission dengan yang baru

        return response()->json(['message' => 'Permissions updated for role successfully']);
    }
}
