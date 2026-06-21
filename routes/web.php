<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;



// Home redirects to the dashboard.
Route::get('/', fn () => redirect()->route('dashboard'));

// Task 7 — Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Product module
Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
    // Task 1 — Product List (View)
    Route::get('/', 'index')->name('index');

    // Task 4 — Create form + store (Redirect) + confirmation page
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/confirmation/{id}', 'confirmation')->name('confirmation');

    // Task 1 — JSON responses (prefix/name set BEFORE group so they apply)
    Route::prefix('api')->name('api.')->group(function () {
        Route::get('/list', 'jsonResponseIndex')->name('index');
        Route::get('/{id}', 'jsonResponseShow')->name('show');
    });

    // Task 1 — Product Details (View) — keep last so it doesn't swallow the routes above
    Route::get('/{id}', 'show')->name('show');
});

// Task 6 — Categories with their products
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
