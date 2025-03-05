<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\SpeciesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware( "auth:sanctum" )->group( function(){
    Route::post("/logout", [ UserController::class, "logout" ]);
    Route::put("/admin", [ AdminController::class, "setAdmin" ]);
    Route::get("/users", [ AdminController::class, "getUsers" ]);

});

Route::post("/register", [ UserController::class, "register" ]);
Route::post("/login", [ UserController::class, "login" ]);

Route::get( "/getani", [ AnimalController::class, "getAnimals" ]);
Route::post( "/addani", [ AnimalController::class, "addAnimal" ]);
Route::get( "/updateani", [ AnimalController::class, "updateAnimal" ]);
Route::get( "/deleteani", [ AnimalController::class, "deleteAnimal" ]);

Route::get( "/getdiet", [ DietController::class, "getDiets" ]);
Route::post( "/adddiet", [ DietController::class, "addDiet" ]);
Route::get( "/updatediet", [ DietController::class, "updateDiet" ]);
Route::get( "/deletediet", [ DietController::class, "deleteDiet" ]);

Route::get( "/getspecies", [ SpeciesController::class, "getDiets" ]);
Route::post( "/addspecies", [ SpeciesController::class, "addDiet" ]);
Route::get( "/updatespecies", [ SpeciesController::class, "updateDiet" ]);
Route::get( "/deletespecies", [ SpeciesController::class, "deleteDiet" ]);
