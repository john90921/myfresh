<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'quantity',
        'description',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
