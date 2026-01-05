<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'package_id',
        'package_name',
        'package_price',
        'package_description',
        'quantity',
        'total_amount',
        'name',
        'phone',
        'country',
        'address',
        'city',
        'postcode',
        'state',
        'notes',
        'status',
 ];
 public function user()
 {
     return $this->belongsTo(User::class);
 }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
