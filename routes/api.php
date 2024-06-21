<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IntegrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});


Route::controller(IntegrationController::class)->prefix('integrations')->group(function () {
    Route::post('', 'store');
    Route::put('{integration}', 'update');
    Route::delete('{integration}', 'destroy');
});
