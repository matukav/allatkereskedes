<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
