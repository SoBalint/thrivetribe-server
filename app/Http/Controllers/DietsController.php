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

    public function create(StoreDiets $request)
    {
        $request->validated();
        $post = $request->all();
        $foods = $request->get("foods");
        unset($post["foods"]);
        $created = Diet::query()->create($post);
        $created->foods()->attach($foods);
        return response()->json($created);
    }

    public function update(Diet $diet, StoreDiets $request)
    {
        $post = $request->all();
        $foods = $request->get("foods");
        unset($post["foods"]);
        $diet->update($foods);
        $diet->foods()->sync($foods);
        $diet->save();
        return response()->json($diet);
    }

    public function delete(Diet $diet)
    {
        $diet->delete();
        return response()->json("", 204);
    }
}
