<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class PurchaseController extends Controller
{
    public function continuePurchase(Order $order)
    {
       $order = $order->load(['product', 'package']);
       return view('purchase.continuePurchase', compact('order'));
    }
}
