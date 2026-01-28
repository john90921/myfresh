<?php

/**
 * Stripe Payment Configuration
 * Stores Stripe API keys for payment processing
 */
return[
    'sk' => env('STRIPE_SK'),  // Secret key - used on server side
    'pk' => env('STRIPE_PK'),  // Publishable key - used on client side
];
