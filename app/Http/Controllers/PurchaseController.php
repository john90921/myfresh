<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class PurchaseController extends Controller
{
    public function continuePurchase(Order $order)
    {
       $order = $order->load(['product', 'package']);
        if(isset($order->product) == false || isset($order->package) == false){
            $order->delete();
            return redirect()->route('purchase.pending')->with('error', 'The product or package associated with this order is no longer available.');
        }
        else if($order->product->packages->quantity < 1 ){
            $order->delete();
            return redirect()->route('purchase.pending')->with('error', 'The package associated with this order is out of stock.');
        }

       return view('purchase.continuePurchase', compact('order'));
    }
}
