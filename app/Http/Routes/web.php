<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'viewLanding']);

Route::middleware(['iam'])->group(
    function () {
        Route::get('/test', function(){
            return response()->json([
                "success" => true
            ]);
        });
        // Pembeli
        Route::post('/buy_stock', [StockController::class, 'buyStock'])->name('buyStock');
        Route::get('/stock', [StockController::class, 'getStock']);

        // Petani
        Route::post('/create_stock', [StockController::class, 'createStock'])->name('createStock');
        Route::get('/create_stock', [StockController::class, 'viewCreateStock']);

        //User
        Route::get('/my_stock', [StockController::class, 'myStock'])->name('myStock');
        Route::get('/logout', [UserController::class, 'logoutUser'])->name('logoutUser');
        Route::get('/view_stock', [StockController::class, 'allStock']);

        
    }
);

//Admin
Route::post('/edit_stock', [StockController::class, 'editStock'])->name('editStock');
Route::get('/edit_stock', [StockController::class, 'viewEditStock']);


Route::post('/create_user', [UserController::class, 'createUser'])->name('register');
Route::post('/login_user', [UserController::class, 'loginUser'])->name('login');

Route::get('/create_user', [UserController::class, 'webCreateUser']);
Route::get('/login_user', [UserController::class, 'webLoginUser']);

Route::get('/prediksi', [PrediksiController::class, 'webPrediksi']);
Route::get('/all_stock', [StockController::class, 'allStock']);

Route::get('/log_stock', [StockController::class, 'getLogStock']);
Route::get('/grafik_stock', [StockController::class, 'getGrafik']);