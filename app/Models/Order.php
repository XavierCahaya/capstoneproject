<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'option',
        'orderer_name',
        'phone',
        'address',
        'total_price',
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
