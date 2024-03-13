<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRoles;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;


class UserRolesController extends Controller
{
    public function get()
    {
        $userRoles = UserRole::get();
        return response()->json($userRoles);
    }
}
