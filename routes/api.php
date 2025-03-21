<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("/login", [AuthController::class, "login"]);

Route::apiResource("posts", PostController::class)->middleware('auth:sanctum');
