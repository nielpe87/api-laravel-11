<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('/posts')->group(function(){
//     Route::controller(PostController::class)->group(function(){

//         Route::get("", 'index')->name('posts.index');
//         Route::get("/create", 'create')->name('posts.create');
//         Route::post("", 'store')->name('posts.store');
//         Route::put("/{post}", 'update')->name('posts.update');
//         Route::delete("/{post}", 'destroy')->name('posts.destroy');
//         Route::get("/{post}", 'edit')->name('posts.edit');
//     });
// });

