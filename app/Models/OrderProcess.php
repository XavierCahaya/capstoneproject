<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProcess extends Model
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


