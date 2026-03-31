<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC (SEMUA ORANG)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/dashboard');
});


/*
|--------------------------------------------------------------------------
| USER (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // dashboard = list product
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    // view detail
    Route::get('/view/{id}', [ProductController::class, 'view']);

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/cart/{id}', [InvoiceController::class, 'addToCart'])->middleware('auth');
    Route::post('/checkout', [InvoiceController::class, 'store'])->middleware('auth');

    Route::get('/invoice', [InvoiceController::class, 'index'])->middleware('auth');
    Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->middleware('auth');
});


/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // ===== PRODUCT =====
    Route::get('/create', [ProductController::class,'create']);
    Route::post('/create', [ProductController::class,'store']);

    Route::get('/product/edit/{id}', [ProductController::class,'edit']);
    Route::put('/product/update/{id}', [ProductController::class,'update']);

    Route::delete('/product/delete/{id}', [ProductController::class,'destroy']);


    // ===== CATEGORY =====
    Route::get('/categories', [ProductCategoryController::class, 'create']);
    Route::post('/categories', [ProductCategoryController::class,'store']);

    Route::get('/categories/edit/{id}', [ProductCategoryController::class,'edit']);
    Route::put('/categories/edit/{id}', [ProductCategoryController::class,'update']);

    Route::delete('/categories/delete/{id}', [ProductCategoryController::class,'destroy']);
});

require __DIR__.'/auth.php';