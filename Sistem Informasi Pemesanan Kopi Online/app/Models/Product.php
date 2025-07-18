<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes;
     protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
    ];
     public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
