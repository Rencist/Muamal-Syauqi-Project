<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PrediksiController;

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

Route::middleware(['iam'])->group(
    function () {
        Route::get('/test', function(){
            return response()->json([
                "success" => true
            ]);
        });
        Route::post('/create_stock', [StockController::class, 'createStock'])->name('createStock');
        Route::get('/get_stock', [StockController::class, 'getStock'])->name('getStock');
        Route::post('/buy_stock', [StockController::class, 'buyStock'])->name('buyStock');
    }
);

Route::post('/create_user', [UserController::class, 'createUser'])->name('register');
Route::post('/login_user', [UserController::class, 'loginUser'])->name('login');

Route::get('/create_user', [UserController::class, 'webCreateUser']);
Route::get('/login_user', [UserController::class, 'webLoginUser']);

Route::get('/prediksi', [PrediksiController::class, 'webPrediksi']);
Route::get('/stock', [StockController::class, 'getStock']);
