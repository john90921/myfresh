<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Metadata\Group;

// ========================================
// AUTHENTICATED API ROUTES
// ========================================

// Get authenticated user information - requires Sanctum authentication
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ========================================
// PRODUCT API ROUTES
// ========================================

// RESTful API resource for products - handles index, store, show, update, destroy
Route::apiResource('productApi', App\Http\Controllers\api\ProductController::class);

// Get specific product by ID with packages
Route::get('/productApi/{id}', [App\Http\Controllers\api\ProductController::class, 'show']);

// Delete specific product by ID
Route::delete('/productApi/{id}', [App\Http\Controllers\api\ProductController::class, 'destroy']);
