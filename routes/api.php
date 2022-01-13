<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\MemeController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\HomeController;

Route::get('/', HomeController::class);

Route::get('/meme', [MemeController::class, 'index']);
Route::get('/meme/{meme}/likes', [MemeController::class, 'likes']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('signup', [AuthController::class, 'signup']);
});
