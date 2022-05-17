<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\V1\UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::resource('/users', \App\Http\Controllers\V1\UserController::class);
});
