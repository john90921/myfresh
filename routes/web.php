<?php

use App\Http\Controllers\ProfileController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name(name: 'home');
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name(name: 'admin.dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//product routes
Route::get('/product/productDetail', function () {
    return view('product.productDetail');
})->name(name: 'product.productDetail');

Route::resource('/product', App\Http\Controllers\ProductController::class);

Route::middleware('auth')->group(function () {

//admin
//product
    //product view
    Route::get('admin/productList', [App\Http\Controllers\ProductController::class, 'productListAdmin'])->name(name: 'product.productListAdmin');
    //product add new one
    Route::get('/addNewProductForm', function () {
    return view('product.addNewProductForm');
})->name(name: 'product.addNewProductForm');
    //product image delete
    Route::delete('/deleteImage/{productId}', [App\Http\Controllers\ProductController::class, 'deleteImage'])->name('product.deleteImage');
    //product edit form
    Route::get('/editProductForm/{productId}', function($productId){
    $product = \App\Models\Product::findOrFail($productId);
    return view('product.admin.editProductForm',compact('product'));
    })->name(name: 'product.editProductForm');
// check out route
Route::post('/checkout', [App\Http\Controllers\ProductController::class, 'checkOut'])->name(name: 'product.checkout');
Route::get('/orderDetailForm', function () {
      return view('order.orderDetailForm');
  })->name(name: 'order.orderDetailForm');
Route::get('/orderConfirmation', [App\Http\Controllers\OrderController::class,'orderConfirmation',])->name(name: 'order.orderConfirmation');
//order

 //edit order
Route::get('/editOrder/{order}',function(Order $order){
    return view('order.admin.editOrderForm',compact('order'));
})->name(name: 'order.editOrder');

// order routes
Route::resource('order', App\Http\Controllers\OrderController::class);


//payment routes
Route::get('/stripe', [App\Http\Controllers\StripeController::class, 'index'])->name(name: 'stripe.index');
Route::post('/checkOut', [App\Http\Controllers\StripeController::class, 'checkOut'])->name(name: 'stripe.checkOut');
Route::get('/stripe/success', [App\Http\Controllers\StripeController::class, 'success'])->name(name: 'stripe.success');



//purchase history routes
Route::get('/purchase/processing', function () {
    $userId = auth()->user()->id;
    $orders = Order::where('status', 'processing')->where('user_id', $userId)->paginate(5);
    return view('purchase.purchaseList',compact('orders'));
})->name(name: 'purchase.processing');
Route::get('/purchase/completed', function () {
    $userId = auth()->user()->id;
    $orders = Order::where('status', 'completed')->where('user_id', $userId)->paginate(5);
    return view('purchase.purchaseList',compact('orders'));
})->name(name: 'purchase.completed');
Route::get('/purchase/pending', function () {
    $userId = auth()->user()->id;
    $orders = Order::where('status', 'pending')->where('user_id', $userId)->paginate(5);
    return view('purchase.purchaseList',compact('orders'));
})->name(name: 'purchase.pending');
});


Route::get('/continuePurchase/{order}', [App\Http\Controllers\PurchaseController::class, 'continuePurchase'])->name('purchase.continuePurchase');


require __DIR__.'/auth.php';
