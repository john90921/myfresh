<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Product Model
 * Represents products available for sale
 */
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'name',         // Product name
        'description',  // Product description
        'price',        // Base product price
        'TotalStock',   // Total available stock
        'image',        // Product image path
        'category',     // Product category
    ];

    /**
     * Relationship: Product has many Packages
     * A product can have multiple package options (sizes, variants)
     */
    public function packages(){
        return $this->hasMany(Package::class);
    }

    /**
     * Relationship: Product has many Orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
