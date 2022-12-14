<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('category')->group(function () {
    Route::namespace('Category')->group(function () {
        // Controllers Within The "App\Http\Controllers\User" Namespace
        Route::get('getCategoryList', [CategoryController::class, 'getCategoryList']);
        Route::get('getCategoryProducts', [CategoryController::class, 'getCategoryProducts']);
    });

});

Route::prefix('product')->group(function () {
    Route::namespace('Product')->group(function () {
        Route::post('createProduct', [ProductController::class, 'createProduct']);
    });
});
