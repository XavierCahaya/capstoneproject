<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'orderer_name',
        'phone',
        'address',
        'status',
        'timestamp',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function getTotalItemsAttribute()
    {
        return $this->orderDetails()->sum('qty');
    }
}
