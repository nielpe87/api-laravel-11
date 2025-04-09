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



// Route::middleware('auth')->group(function(){
//     Route::resource('/posts', PostController::class);
//     Route::get("/users", function(){

//         echo "Listar usuários";
//         echo auth()->user()->id;
//     });

// });

// Route::get('/formLogin', function(){
//     echo "Formulario de login";
// })->name('login');

// Route::get('/testemid', function(){
//     echo "rota teste";
// })->name("teste");

// Route::get('/login', function(){
//     //if (Auth::attempt(['email' => 'emanuel@teste.com', "password" => "123456"]) ) {
//     if (Auth::attempt(['email' => 'ana@teste.com', "password" => "123456"]) ) {
//         echo "Logado!";
//     } else {
//         echo "Erro";
//     }
// });

// Route::get("/logout", function(){
//     Auth::logout();

//     echo "deslogado!";
// });
