<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainings;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function get()
    {
        $trainings = Training::with("users")->get();
        return response()->json($trainings);
    }

    public function create(StoreTrainings $request)
    {
        $request->validated();
        $created = Training::insert($request->all());
        return response()->json($created);
    }

    public function update(Training $training, StoreTrainings $request)
    {
        $training->update($request->all());
        return response()->json($training);
    }

    public function delete(Training $training)
    {
        $training->delete();
        return response()->json("", 204);
    }
}
