<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return redirect('/login_user');
});

Route::post('/create_user', [UserController::class, 'createUser'])->name('register');
Route::post('/login_user', [UserController::class, 'loginUser'])->name('login');

Route::get('/create_user', [UserController::class, 'webCreateUser']);
Route::get('/login_user', [UserController::class, 'webLoginUser']);