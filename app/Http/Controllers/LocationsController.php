<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocations;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function get()
    {
        $locations = Location::with("maps")->get();
        return response()->json($locations);
    }

    public function getLocation(int $locationId) {
        $locations = Location::with("maps")->get();
        foreach ($locations as $location) {
            if ($location->id == $locationId) {
                return response()->json($location);
            }
        }
        return response()->json("", 403);
    }

    public function create(StoreLocations $request)
    {
        $request->validated();
        $created = Location::insert($request->all());
        return response()->json($created);
    }

    public function update(Location $location, StoreLocations $request)
    {
        $location->update($request->all());
        return response()->json($location);
    }

    public function delete(Location $location)
    {
        $location->delete();
        return response()->json("", 204);
    }
}
