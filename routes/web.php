<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('dashboard'));

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/confirmation/{id}', 'confirmation')->name('confirmation');

    Route::prefix('api')->name('api.')->group(function () {
        Route::get('/list', 'jsonResponseIndex')->name('index');
        Route::get('/{id}', 'jsonResponseShow')->name('show');
    });

    Route::get('/{id}', 'show')->name('show');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
