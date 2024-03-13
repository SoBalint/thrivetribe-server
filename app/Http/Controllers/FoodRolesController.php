<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRoles;
use App\Models\FoodRole;
use Illuminate\Http\Request;

class FoodRolesController extends Controller
{
    public function get()
    {
        $foodroles = FoodRole::get();
        return response()->json($foodroles);
    }
}
