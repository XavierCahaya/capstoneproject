<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'delivery_option',
        'orderer_name',
        'phone',
        'address',
        'total_price',
        'payment_option',
        'status_pembayaran',
        'status',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getTotalItemsAttribute()
    {
        return $this->orderDetails()->sum('qty');
    }
}
