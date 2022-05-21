<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [\App\Http\Controllers\V1\UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/users', \App\Http\Controllers\V1\UserController::class);

    Route::resource('/sales', \App\Http\Controllers\V1\SaleController::class);
    Route::group(['prefix' => '/sales'], function () {
        Route::post('/date', [\App\Http\Controllers\V1\SaleController::class, 'getByDate']);
        Route::get('/user/{id}', [\App\Http\Controllers\V1\SaleController::class, 'getByUser']);
        Route::get('/customer/{id}', [\App\Http\Controllers\V1\SaleController::class, 'getByCustomer']);
        Route::get('/{id}/products', [\App\Http\Controllers\V1\SaleController::class, 'getProducts']);
    });

    Route::resource('products', \App\Http\Controllers\V1\ProductController::class);
    Route::get('products/category/{id}', [\App\Http\Controllers\V1\ProductController::class, 'getProductsByCategory']);

    Route::resource('categories', \App\Http\Controllers\V1\CategoryController::class);

    Route::resource('customers', \App\Http\Controllers\V1\CustomerController::class);
    Route::get('customers/{id}/sales', [\App\Http\Controllers\V1\CustomerController::class, 'getSalesByCustomer']);

    Route::resource('directions', \App\Http\Controllers\V1\DirectionController::class);

    Route::resource('providers', \App\Http\Controllers\V1\ProviderController::class);

    Route::resource('purchases', \App\Http\Controllers\V1\PurchaseController::class);

    Route::resource('materials', \App\Http\Controllers\V1\MaterialController::class);
    Route::group(['prefix' => '/materials'], function () {
        Route::get('/category/{id}', [\App\Http\Controllers\V1\MaterialController::class, 'getByCategory']);
        Route::get('/provider/{id}', [\App\Http\Controllers\V1\MaterialController::class, 'getByProvider']);
    });
});

