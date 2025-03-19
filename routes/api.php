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
Route::post( "/updateani", [ AnimalController::class, "updateAnimal" ]);
Route::delete( "/deleteani", [ AnimalController::class, "deleteAnimal" ]);

Route::get( "/getdiet", [ DietController::class, "getDiets" ]);
Route::get( "/getdietid", [ DietController::class, "getDietId" ]);

Route::get( "/getspecies", [ SpeciesController::class, "getSpecies" ]);
Route::get( "/getspeciesid", [ SpeciesController::class, "getSpeciesId" ]);

