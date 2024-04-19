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

    public function getTraining(int $trainingId)
    {
        $trainings = Training::with("users")->get();
        foreach ($trainings as $training) {
            if ($training->id == $trainingId) {
                return response()->json($training);
            }
        }
    }

    public function getTopFour()
    {
        $trainings = Training::with("users")->get();
        $tops = Training::orderBy("Like", "desc")->limit(4)->get();
        return response()->json($tops);
    }

    public function create(StoreTrainings $request)
    {
        $request->validated();
        $post = $request->all();
        $post["Text"] = strip_tags($post["Text"]);
        $created = Training::insert($post);
        return response()->json($created);
    }

    public function update(Training $training, StoreTrainings $request)
    {
        $posts = $request->all();
        $posts["Text"] = strip_tags($posts["Text"]);
        $training->update($posts);
        return response()->json($training);
    }

    public function delete(Training $training)
    {
        $training->delete();
        return response()->json("", 204);
    }
}
