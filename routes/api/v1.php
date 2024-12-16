<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthenticationsController;
use App\Http\Controllers\Api\v1\UserController;

Route::group(['prefix' => 'auth', 'middleware' => 'setlocale'], function () {
    Route::post('login', [AuthenticationsController::class, 'login']);
    Route::get('user', [AuthenticationsController::class, 'user']);
});

Route::group(['middleware' => ['auth:api', 'setlocale']], function () {
    Route::post('change-password', [AuthenticationsController::class, 'changePassword']);

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/profile/update', [UserController::class, 'profileUpdate']);
    });
});
