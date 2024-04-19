<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityCentrums;
use App\Models\CityCentrum;
use Illuminate\Http\Request;

class CityCentrumsController extends Controller
{
    public function get()
    {
        $cityCs = CityCentrum::get();
        return response()->json($cityCs);
    }
    public function search($key)
    {
        return CityCentrum::where('Name','LIKE', '%'.$key.'%')->get();
    }

    public function getCT(int $ctId) {
        $cts = CityCentrum::get();
        foreach ($cts as $ct) {
            if ($ct->id == $ctId) {
                return response()->json($ct);
            }
        }
        return response()->json("", 403);
    }

    public function create(StoreCityCentrums $request)
    {
        $request->validated();
        $created = CityCentrum::insert($request->all());
        return response()->json($created);
    }

    public function update(CityCentrum $cityC, StoreCityCentrums $request)
    {
        $cityC->update($request->all());
        return response()->json($cityC);
    }

    public function delete(CityCentrum $cityC)
    {
        $cityC->delete();
        return response()->json("", 204);
    }
}
