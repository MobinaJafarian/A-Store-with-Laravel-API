<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'order_id',
        'product_id',
        'count',
        'price',
        'discount',
        'discount_price',
        'status',
    ];
}
