<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("/login", [AuthController::class, "login"]);

Route::middleware("auth:sanctum")->group(function () {
    Route::apiResource("posts", PostController::class);
    Route::apiResource("categories", CategoryController::class);
    Route::get("/logout", [AuthController::class,"logout"]);
});
