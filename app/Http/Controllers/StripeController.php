<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index( Request $request ){
        return view('stripe.index');
    }
    public function checkOut(Request $request){
       try{
        $request->validate([
            'order_id'  => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:1',
        ]);
        Stripe::setApiKey(config('stripe.sk'));

        $seesion  = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'myr',
                    'product_data' => [
                        'name' => 'Total Amount',
                    ],
                    'unit_amount' => $request->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => redirect()->route('stripe.success')->with('order_id', $request->order_id)->getTargetUrl(),
        ]);

        return redirect()->away($seesion->url);
    }catch(\Exception $e){
        return back()->with('error', $e->getMessage());
       }
    }
    public function success(){
        $order_id = session('order_id');
        Order::where('id', $order_id)->update(['status' => 'processing']);
        return view('stripe.success');
    }
}
