<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\OrderComplete;

class OrderCompleteController extends Controller
{
    public function index()
    {
        $orderIn = OrderDetail::with('product', 'order')
        ->whereHas('order', function ($query) {
            $query->where('status', 'Selesai');
        })->get();
        return view('admin.orderComplete', compact('orderIn'));
    }
}


