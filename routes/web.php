<?php

use App\Http\Controllers\ProfileController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

// ========================================
// PUBLIC ROUTES
// ========================================

// Home page - landing page for all visitors
Route::get('/', function () {
    return view('welcome');
})->name(name: 'home');

// Admin dashboard - administrative interface
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name(name: 'admin.dashboard');

// User dashboard - requires authentication and email verification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ========================================
// PROFILE MANAGEMENT ROUTES
// ========================================

// User profile routes - requires authentication
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========================================
// PRODUCT ROUTES
// ========================================

// Display individual product details
Route::get('/product/productDetail', function () {
    return view('product.productDetail');
})->name(name: 'product.productDetail');

// Product resource routes - handles index, create, store, show, edit, update, destroy
Route::resource('/product', App\Http\Controllers\ProductController::class);

// ========================================
// ADMIN ROUTES - Requires Authentication
// ========================================

Route::middleware('auth')->group(function () {

    // ========================================
    // ADMIN PRODUCT MANAGEMENT
    // ========================================

    // Display product list for admin
    Route::get('admin/productList', [App\Http\Controllers\ProductController::class, 'productListAdmin'])->name(name: 'product.productListAdmin');

    // Show form to add a new product
    Route::get('/addNewProductForm', function () {
    return view('product.addNewProductForm');
})->name(name: 'product.addNewProductForm');

    // Delete product image
    Route::delete('/deleteImage/{productId}', [App\Http\Controllers\ProductController::class, 'deleteImage'])->name('product.deleteImage');

    // Show form to edit existing product
    Route::get('/editProductForm/{productId}', function($productId){
    $product = \App\Models\Product::findOrFail($productId);
    return view('product.admin.editProductForm',compact('product'));
    })->name(name: 'product.editProductForm');

    // ========================================
    // CHECKOUT & ORDER ROUTES
    // ========================================

    // Process checkout - add items to cart and prepare order
    Route::post('/checkout', [App\Http\Controllers\ProductController::class, 'checkOut'])->name(name: 'product.checkout');

    // Show order detail form for customer information
    Route::get('/orderDetailForm', function () {
      return view('order.orderDetailForm');
  })->name(name: 'order.orderDetailForm');

    // Show order confirmation after successful order creation
    Route::get('/orderConfirmation', [App\Http\Controllers\OrderController::class,'orderConfirmation',])->name(name: 'order.orderConfirmation');

    // ========================================
    // ADMIN ORDER MANAGEMENT
    // ========================================

    // Show form to edit existing order
    Route::get('/editOrder/{order}',function(Order $order){
        return view('order.admin.editOrderForm',compact('order'));
    })->name(name: 'order.editOrder');

    // Order resource routes - handles index, create, store, show, edit, update, destroy
    Route::resource('order', App\Http\Controllers\OrderController::class);

    // ========================================
    // PAYMENT ROUTES - Stripe Integration
    // ========================================

    // Show Stripe payment page
    Route::get('/stripe', [App\Http\Controllers\StripeController::class, 'index'])->name(name: 'stripe.index');

    // Process Stripe checkout and create payment session
    Route::post('/checkOut', [App\Http\Controllers\StripeController::class, 'checkOut'])->name(name: 'stripe.checkOut');

    // Handle successful payment callback from Stripe
    Route::get('/stripe/success', [App\Http\Controllers\StripeController::class, 'success'])->name(name: 'stripe.success');

    // ========================================
    // PURCHASE HISTORY ROUTES
    // ========================================

    // View orders that are currently being processed
    Route::get('/purchase/processing', function () {
        $userId = auth()->user()->id;
        $orders = Order::where('status', 'processing')->where('user_id', $userId)->paginate(5);
        return view('purchase.purchaseList',compact('orders'));
    })->name(name: 'purchase.processing');

    // View completed orders
    Route::get('/purchase/completed', function () {
        $userId = auth()->user()->id;
        $orders = Order::where('status', 'completed')->where('user_id', $userId)->paginate(5);
        return view('purchase.purchaseList',compact('orders'));
    })->name(name: 'purchase.completed');

    // View pending orders
    Route::get('/purchase/pending', function () {
        $userId = auth()->user()->id;
        $orders = Order::where('status', 'pending')->where('user_id', $userId)->paginate(5);
        return view('purchase.purchaseList',compact('orders'));
    })->name(name: 'purchase.pending');
});

// ========================================
// CONTINUE PURCHASE ROUTE
// ========================================

// Allow user to continue payment for an existing order
Route::get('/continuePurchase/{order}', [App\Http\Controllers\PurchaseController::class, 'continuePurchase'])->name('purchase.continuePurchase');


require __DIR__.'/auth.php';
