<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsers;
use App\Models\Users;
use Illuminate\Http\Request;
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
        $requestArray["Password"] = Hash::make($request->Password);
        $created = Users::create($requestArray);
        $created->roles()->attach($roles);
        return response()->json($created);
    }

    public function update(Users $users, StoreUsers $request)
    {
        $post = $request->all();
        //$roles = $request->get("roles");
        //print $request->get("roles");
        //unset($post["roles"]);
        //$post["Password"] = Hash::make($request->Password);
        $users->UserName = $post["UserName"];
        $users->Email = $post["Email"];
        $users->FirstName = $post["FirstName"];
        $users->LastName = $post["LastName"];
        if ($request->has("Height")) {
            $users->Height = $post["Height"];
        }
        if ($request->has("Weight")) {
            $users->Weight = $post["Weight"];
        }
        if ($request->has("Age")) {
            $users->Age = $post["Age"];
        }
        if ($request->has("Phone")) {
            $users->Phone = $post["Phone"];
        }
        if ($request->has("CoachExperienceId")) {
            $users->CoachExperienceId = $post["CoachExperienceId"];
        }
        if ($request->has("LastLogin")) {
            $users->CoachExperienceId = $post["LastLogin"];
        }
        //$users->roles()->sync($roles);
        $users->save();
        return response()->json($users->load("roles"));
    }

    public function delete(Users $users)
    {
        $users->delete();
        return response()->json("", 204);
    }

    public function Login(Request $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $log = $request->all();
        $user_pass = Users::query()->where("UserName", "=", $log["UserName"])->first();

        if(Hash::check($log["Password"], $user_pass->Password)){
            return response()->json($user_pass->load("roles"),202);
        } else {
            return response("", 400);
        }
    }

    public function PasswordChange(Users $user, Request $request)
    {
        $log = $request->all();
        $newPassword1 = $log["newPassword1"];
        $newPassword2 = $log["newPassword2"];

        //$random = Hash::make($newPassword1);
        //$user->Password = $random;

        if(Hash::check($log["Password"], $user->Password)){
            if($newPassword1 == $newPassword2){
                $pass = Hash::make($newPassword1);
                $user->Password = $pass;
                $user->save();
                return response()->json("OK", 204);
            } else {
                return response()->json("A két jelszó NEM egyezik!", 401);
            }
        } else {
            return response()->json("Nem az a régi jelszód!", 400);
    }
    }
}
