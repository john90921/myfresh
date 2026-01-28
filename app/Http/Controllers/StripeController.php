<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;

/**
 * StripeController
 * Handles Stripe payment integration for order processing
 */
class StripeController extends Controller
{
    /**
     * Display the Stripe payment page
     */
    public function index( Request $request ){
        return view('stripe.index');
    }

    /**
     * Process checkout and create Stripe payment session
     * Validates order and amount, then redirects to Stripe checkout
     */
    public function checkOut(Request $request){
       try{
        // Validate order ID and payment amount
        $request->validate([
            'order_id'  => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:1',
        ]);

        // Set Stripe API key from config
        Stripe::setApiKey(config('stripe.sk'));

        // Create Stripe checkout session
        $seesion  = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'myr',              // Malaysian Ringgit
                    'product_data' => [
                        'name' => 'Total Amount',
                    ],
                    'unit_amount' => $request->amount * 100,  // Convert to cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => redirect()->route('stripe.success')->with('order_id', $request->order_id)->getTargetUrl(),
        ]);

        // Redirect user to Stripe checkout page
        return redirect()->away($seesion->url);
    }catch(\Exception $e){
        // Handle any errors and return to previous page
        return back()->with('error', $e->getMessage());
       }
    }

    /**
     * Handle successful payment callback from Stripe
     * Updates order status to 'processing'
     */
    public function success(){
        $order_id = session('order_id');
        // Update order status to processing
        Order::where('id', $order_id)->update(['status' => 'processing']);
        return view('stripe.success');
    }
}
