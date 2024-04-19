<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityCentrumsController;
use App\Http\Controllers\CoachExperiencesController;
use App\Http\Controllers\DietsController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\UserRolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FoodRolesController;



Route::get("/ping", function() {
    return "pong";
});

Route::group(["prefix" => "citycentrums"], function() {
    Route::get("/", [CityCentrumsController::class, "get"]);
    Route::get("/getCT/{ctId}", [CityCentrumsController::class, "getCT"]);
    Route::get("/search/{key}", [CityCentrumsController::class, "search"]);
    Route::post("/create", [CityCentrumsController::class, "create"]);
    Route::put("/update/{cityC}", [CityCentrumsController::class, "update"]);
    Route::delete("/delete/{cityC}", [CityCentrumsController::class, "delete"]);
});

Route::group(["prefix" => "coachexperiences"], function() {
    Route::get("/", [CoachExperiencesController::class, "get"]);
    Route::get("/getCoach/{coachId}", [CoachExperiencesController::class, "getCoach"]);
    Route::post("/create", [CoachExperiencesController::class, "create"]);
    Route::put("/update/{coachE}", [CoachExperiencesController::class, "update"]);
    Route::delete("/delete/{coachE}", [CoachExperiencesController::class, "delete"]);
});

    Route::group(["prefix" => "diets"], function() {
    Route::get("/", [DietsController::class, "get"]);
    Route::get("/getDiet/{dietId}", [DietsController::class, "getDiet"]);
    Route::post("/create", [DietsController::class, "create"]);
    Route::put("/update/{diet}", [DietsController::class, "update"]);
    Route::delete("/delete/{diet}", [DietsController::class, "delete"]);
});

Route::group(["prefix" => "foods"], function() {
    Route::get("/", [FoodsController::class, "get"]);
    Route::get("/getFood/{foodId}", [FoodsController::class, "getFood"]);
    Route::post("/create", [FoodsController::class, "create"]);
    Route::put("/update/{food}", [FoodsController::class, "update"]);
    Route::delete("/delete/{food}", [FoodsController::class, "delete"]);
});

Route::group(["prefix" => "locations"], function() {
    Route::get("/", [LocationsController::class, "get"]);
    Route::get("/getLocation/{locationId}", [LocationsController::class, "getLocation"]);
    Route::post("/create", [LocationsController::class, "create"]);
    Route::put("/update/{location}", [LocationsController::class, "update"]);
    Route::delete("/delete/{location}", [LocationsController::class, "delete"]);
});

Route::group(["prefix" => "maps"], function() {
    Route::get("/", [MapsController::class, "get"]);
    Route::get("/getMap/{mapId}", [MapsController::class, "getMap"]);
    Route::post("/create", [MapsController::class, "create"]);
    Route::put("/update/{map}", [MapsController::class, "update"]);
    Route::delete("/delete/{map}", [MapsController::class, "delete"]);
});

Route::group(["prefix" => "messages"], function() {
    Route::get("/", [MessagesController::class, "get"]);
    Route::post("/create", [MessagesController::class, "create"]);
    Route::put("/update/{message}", [MessagesController::class, "update"]);
    Route::delete("/delete/{message}", [MessagesController::class, "delete"]);
});

Route::group(["prefix" => "roles"], function() {
    Route::get("/", [RolesController::class, "get"]);
    Route::get("/getRole/{roleId}", [RolesController::class, "getRole"]);
    Route::post("/create", [RolesController::class, "create"]);
    Route::put("/update/{role}", [RolesController::class, "update"]);
    Route::delete("/delete/{role}", [RolesController::class, "delete"]);
});

Route::group(["prefix" => "trainings"], function() {
    Route::get("/", [TrainingsController::class, "get"]);
    Route::get("/getTraining/{trainingId}", [TrainingsController::class, "getTraining"]);
    Route::get("/getTopFour", [TrainingsController::class, "getTopFour"]);
    Route::post("/create", [TrainingsController::class, "create"]);
    Route::put("/update/{training}", [TrainingsController::class, "update"]);
    Route::delete("/delete/{training}", [TrainingsController::class, "delete"]);
});

Route::group(["prefix" => "userRoles"], function() {
    Route::get("/", [UserRolesController::class, "get"]);
    Route::post("/create", [UserRolesController::class, "create"]);
    Route::put("/update/{userId}/{roleId}", [UserRolesController::class, "update"]);
    Route::delete("/delete/{userId}/{roleId}", [UserRolesController::class, "delete"]);
});

Route::group(["prefix" => "users"], function() {
    Route::get("/", [UsersController::class, "get"]);
    Route::get("/getUser/{userId}", [UsersController::class, "getUser"]);
    Route::get("/getUserWithPass/{name}/{pass}", [UsersController::class, "getUserWithPass"]);
    Route::post("/create", [UsersController::class, "create"]);
    Route::put("/update/{users}", [UsersController::class, "update"]);
    Route::delete("/delete/{users}", [UsersController::class, "delete"]);
    Route::post("/login", [UsersController::class, "Login"]);
    Route::put("/PasswordChange/{user}", [UsersController::class, "PasswordChange"]);
});

Route::group(["prefix" => "foodRoles"], function() {
    Route::get("/", [FoodRolesController::class, "get"]);
    Route::post("/create", [FoodRolesController::class, "create"]);
    Route::put("/update/{foodrole}", [FoodRolesController::class, "update"]);
    Route::delete("/delete/{foodrole}", [FoodRolesController::class, "delete"]);
});
