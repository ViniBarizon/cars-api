<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;


Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    
    Route::get('user', function () {
        return response(Auth::user(), 200);
    });
    
    Route::get('cars', [CarsController::class, 'index']);
    Route::post('cars', [CarsController::class, 'store']);
});