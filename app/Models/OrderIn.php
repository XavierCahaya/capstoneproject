<?php

// File: app/Models/OrderIn.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderIn extends Model
{
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


