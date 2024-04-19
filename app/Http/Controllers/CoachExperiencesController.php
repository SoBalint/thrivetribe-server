<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoachExperiences;
use App\Models\CoachExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoachExperiencesController extends Controller
{
    public function get()
    {
        $coachEs = CoachExperience::with("users")->get();
        return response()->json($coachEs);
    }

    public function getCoach(int $caochId) {
        $coachs = CoachExperience::with("users")->get();
        foreach ($coachs as $coach) {
            if ($coach->id == $caochId) {
                return response()->json($coach);
            }
        }
        return response()->json("", 403);
    }

    public function create(StoreCoachExperiences $request)
    {
        $request->validated();
        $created = CoachExperience::insert($request->all());
        $lastid =DB::getPdo()->lastInsertId();
        return response()->json(array('success' => true, 'last_insert_id' => $lastid), 200);
        //return response()->json($created);
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
