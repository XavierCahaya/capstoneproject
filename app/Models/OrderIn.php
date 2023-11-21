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
}


