<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Package Model
 * Represents product packages/variants with different pricing and quantities
 */
class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'product_id',      // Parent product ID
        'name',            // Package name (e.g., "Small", "Medium", "Large")
        'price',           // Package price
        'quantity',        // Available stock for this package
        'description',     // Package description
    ];

    /**
     * Relationship: Package belongs to one Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relationship: Package can have many Orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
