<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoles;
use App\Models\Role;


class RolesController extends Controller
{
    public function get()
    {
        $roles = Role::with("users")->get();
        return response()->json($roles);
    }

    public function create(StoreRoles $request)
    {
        $request->validated();
        $created = Role::insert($request->all());
        return response()->json($created);
    }

    public function update(Role $role, StoreRoles $request)
    {
        $role->update($request->all());
        return response()->json($role);
    }

    public function delete(Role $role)
    {
        if ($role->delete()) {
            return response()->json("", 200);
        }
        return response()->json("", 400);
    }
}
