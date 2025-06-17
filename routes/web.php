<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware('verifica.usuario');


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

    // login routes
Route::get('/login', [HomeController::class, 'login'])
    ->name('login');

// register routes
Route::get('/register', [HomeController::class, 'register'])
    ->name('register');

    //  postRegister route
Route::post('/postRegister', [HomeController::class, 'postRegister'])
    ->name('postRegister');
