<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsers;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function get()
    {
        $users = Users::with("training", "diet", "coachexperience", "messages", "roles")->get();
        return response()->json($users);
    }
    public function getUser(int $userId) {
        $users = Users::with("training", "diet", "coachexperience", "messages", "roles")->get();
        foreach ($users as $user) {
            if ($user->id == $userId) {
                return response()->json($user);
            }
        }
        return response()->json("", 403);
    }
    public function getUserWithPass(String $name, String $pass) {
        $users = Users::with("training", "diet", "coachexperience", "messages", "roles")->get();
        foreach ($users as $user) {
            if ($user->UserName == $name && $user->Password == $pass) {
                return response()->json($user);
            }
        }
        return response()->json("", 401);
    }

    public function create(StoreUsers $request)
    {
        $request->validated();
        $requestArray = $request->all();
        $roles = $request->get("roles");
        unset($requestArray["roles"]);
        $requestArray["Password"] = Hash::make($request->newPassword);
        $created = Users::create($requestArray);
        $created->roles()->attach($roles);
        return response()->json($created);
    }

    public function update(Users $users, StoreUsers $request)
    {
        $post = $request->all();
        $roles = $request->get("roles");
        unset($post["roles"]);
        $users->update($post);
        $users->roles()->sync($roles);
        $users->save();
        return response()->json($users->load("roles"));
    }

    public function delete(Users $users)
    {
        $users->delete();
        return response()->json("", 204);
    }
}
