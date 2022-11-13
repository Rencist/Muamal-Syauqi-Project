<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('hello', function () {
    return response()->json();
});

Route::middleware(['iam'])->group(
    function () {
        Route::get('test', function(){
            return response()->json([
                "success" => true
            ]);
        });
    }
);
    
Route::middleware(['iam', 'admin'])->group(
    function () {
    }
);