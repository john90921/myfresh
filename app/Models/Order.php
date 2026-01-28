<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Order Model
 * Represents customer orders with product and package details
 * Stores snapshot of product/package info at time of order
 */
class Order extends Model
{
    // Mass assignable attributes
    protected $fillable = [
        'user_id',              // Customer who placed the order
        'product_id',           // Product reference
        'product_name',         // Product name at time of order
        'package_id',           // Package reference
        'package_name',         // Package name at time of order
        'package_price',        // Package price at time of order
        'package_description',  // Package description at time of order
        'quantity',             // Quantity ordered
        'total_amount',         // Total order amount
        'name',                 // Customer's full name
        'phone',                // Customer's phone number
        'country',              // Delivery country
        'address',              // Delivery address
        'city',                 // Delivery city
        'postcode',             // Delivery postcode
        'state',                // Delivery state/province
        'notes',                // Additional order notes
        'status',               // Order status (pending, processing, completed, cancelled)
    ];

    /**
     * Relationship: Order belongs to one User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Order belongs to one Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relationship: Order belongs to one Package
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
