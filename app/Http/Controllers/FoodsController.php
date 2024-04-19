<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoods;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function get()
    {
        $foods = Food::with("diets")->get();
        return response()->json($foods);
    }

    public function getFood(int $foodId) {
        $foods = Food::with("diets")->get();
        foreach ($foods as $food) {
            if ($food->id == $foodId) {
                return response()->json($food);
            }
        }
        return response()->json("", 403);
    }

    public function create(StoreFoods $request)
    {
        $request->validated();
        $created = Food::insert($request->all());
        return response()->json($created);
    }

    public function update(Food $food, StoreFoods $request)
    {
        $food->update($request->all());
        return response()->json($food);
    }

    public function delete(Food $food)
    {
        $food->delete();
        return response()->json("", 204);
    }
}
