<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaps;
use App\Models\Map;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function get()
    {
        $maps = Map::with("location")->get();
        return response()->json($maps);
    }

    public function create(StoreMaps $request)
    {
        $request->validated();
        $created = Map::insert($request->all());
        return response()->json($created);
    }

    public function update(Map $map, StoreMaps $request)
    {
        $map->update($request->all());
        return response()->json($map);
    }

    public function delete(Map $map)
    {
        $map->delete();
        return response()->json("", 204);
    }
}
