<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'TotalStock',
        'image',
        'category',
    ];

    public function packages(){
        return $this->hasMany(Package::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
