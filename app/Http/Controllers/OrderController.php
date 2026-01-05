<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $orders =  Order::with(['product', 'package', 'user'])->paginate(12);

       return view('order.admin.orderList', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // order confirmation

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $request->validated();
            $user_id = auth()->user()->id;

            $product = session('product');
            $package = session('package');
            $quantity = session('quantity');
            $total_amount = number_format($package->price * $quantity, 2);
            $package = $product->packages()
        ->where('id', $package->id)
        ->first();
        if( $package->quantity > 0){
    $package->quantity -= $quantity;
        }

           $package->save();

            $order = Order::create(
                [
                    'user_id' => $user_id,
                    'product_id' => (int) $product->id,
                    'product_name' => $product->name,
                    'package_id' => (int) $package->id,
                    'package_name' => $package->name,
                    'package_price' => $package->price,
                    'package_description' => $package->description,
                    'quantity' => $quantity,
                    'total_amount' => $total_amount,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'country' => $request->country,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postcode' => $request->postcode,
                    'note' => $request->note,
                ]
            );



            session(['order' => $order]);

            return redirect()->route('order.orderConfirmation');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create order: ' . $e->getMessage()]);
        }
    }
    public function orderConfirmation()
    {
        $order = session('order');
        return view('order.orderDetailConfirmation', compact('order'));
    }
    public function continuePayment(int $orderId)
    {
        // Logic to continue payment for the given order
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

        try{

        return view('purchase.purchaseView', compact('order'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to retrieve order details: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        try {
            $order->update($request->validated());
            return redirect()->route('order.show', $order)->with('success', 'Order updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update order: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }
}
