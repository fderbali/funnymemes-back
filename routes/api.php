<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\HomeController;
use App\Http\Controllers\V1\AuthController;

Route::get('/', HomeController::class);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
