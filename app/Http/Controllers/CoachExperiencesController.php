<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoachExperiences;
use App\Models\CoachExperience;
use Illuminate\Http\Request;

class CoachExperiencesController extends Controller
{
    public function get()
    {
        $coachEs = CoachExperience::with("users")->get();
        return response()->json($coachEs);
    }

    public function create(StoreCoachExperiences $request)
    {
        $request->validated();
        $created = CoachExperience::insert($request->all());
        return response()->json($created);
    }

    public function update(CoachExperience $coachE, StoreCoachExperiences $request)
    {
        $coachE->update($request->all());
        return response()->json($coachE);
    }

    public function delete(CoachExperience $coachE)
    {
        $coachE->delete();
        return response()->json("", 204);
    }
}
