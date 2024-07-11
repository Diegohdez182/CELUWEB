<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\RedirectIfNotAuthenticated;

Route::get('/', function () {
    return view('principal');
});

#Definicion de rutas siguiendo el esquema de diseño de software MVC

//Rutas para el registro
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

//Rutas para el login y logout
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::get('/logout',[LogAuthController::class, 'index'])->name('logout');

//Ruta de la pagina principal del aplicativo
Route::get('/dashboard/wall', [PostController::class, 'index'])->name('post.index')->middleware(RedirectIfNotAuthenticated::class);

