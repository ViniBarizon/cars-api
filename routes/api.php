<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\OwnerController;


Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    
    Route::get('user', function () {
        return response(Auth::user(), 200);
    });
    
    Route::get('cars', [CarsController::class, 'index']);
    Route::get('cars/{id}', [CarsController::class, 'show']);
    Route::delete('cars/{id}', [CarsController::class, 'destroy']);
    Route::post('cars', [CarsController::class, 'store']);
    
    Route::get('owners', [OwnerController::class, 'index']);
    Route::get('owners/{id}', [OwnerController::class, 'show']);
    Route::delete('owners/{id}', [OwnerController::class, 'destroy']);
    Route::post('owners', [OwnerController::class, 'store']);
});