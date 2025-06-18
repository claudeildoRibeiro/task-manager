<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\UserIsLogged;
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



/*|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for authentication.
| These routes are for login, registration, and logout.
*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');


 /*|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for the home page.
| This route is for the home page of the application.
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/*|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes that require the user to be logged in.
| These routes are protected by the UserIsLogged middleware.
*/
Route::middleware([UserIsLogged::class])->group(function () {
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*|--------------------------------------------------------------------------
| Task Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for task management.
| These routes are for creating, updating, deleting, and viewing tasks.
*/
Route::get('/tasks', [TaskController::class, 'tasks'])->name('tasks');
Route::get('/tasks/create', [TaskController::class, 'createTask'])->name('createTask');
Route::post('/tasks/store', [TaskController::class, 'storeTask'])->name('storeTask');
Route::get('/tasks/edit/{id}', [TaskController::class, 'editTask'])->name('editTask');
Route::post('/tasks/update/{id}', [TaskController::class, 'updateTask'])->name('updateTask');
Route::get('/tasks/delete/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');
Route::get('/tasks/view/{id}', [TaskController::class, 'viewTask'])->name('viewTask');

});



