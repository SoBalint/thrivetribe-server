<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiets;
use App\Models\Diet;
use Illuminate\Http\Request;

class DietsController extends Controller
{
    public function get()
    {
        $diets = Diet::with("foods")->get();
        return response()->json($diets);
    }

    public function getDiet(int $dietId) {
        $diets = Diet::with("foods")->get();
        foreach ($diets as $diet) {
            if ($diet->id == $dietId) {
                return response()->json($diet);
            }
        }
        return response()->json("", 403);
    }

    public function create(StoreDiets $request)
    {
        $request->validated();
        $post = $request->all();
        $foods = $request->get("foods");
        unset($post["foods"]);
        $created = Diet::create($post);
        $created->foods()->attach($foods);
        return response()->json($created);
    }

    public function update(Diet $diet, StoreDiets $request)
    {
        $post = $request->all();
        //$foods = $request->get("foods");
        //unset($post["foods"]);
        $diet->update($post);
        //$diet->foods()->sync($foods);
        $diet->save();
        return response()->json($diet->load("foods"));
    }

    public function delete(Diet $diet)
    {
        $diet->delete();
        return response()->json("", 204);
    }
}
