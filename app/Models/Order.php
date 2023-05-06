<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'total_price',
        'code',
        'status',
        'transaction_id',
        'address_id',
        'user_id',
    ];

    public function orderDetail()
    {
        return $this->hasMany(orderDetail::class);
    }
}
