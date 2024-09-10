<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::resource('post', PostController::class);
Route::get("/post/create", [PostController::class, "create"])->name("post.create")->middleware("auth");

// Autenticação
Route::get("/login", [AuthController::class, "loginIndex"])->name("login");
Route::post("/login", [AuthController::class, "login"])->name("loginPost");

Route::get("/register", [AuthController::class, "registerIndex"])->name("register");
Route::post("/register", [AuthController::class, "register"])->name("registerPost");

Route::get("/logout", [AuthController::class, "logout"])->name("auth.logout");