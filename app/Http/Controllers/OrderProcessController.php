<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderProcess;
use Illuminate\Http\Request;

class OrderProcessController extends Controller
{
    public function index()
    {
        $orderIn = OrderDetail::with('product', 'order')
        ->whereHas('order', function ($query) {
            $query->where('status', 'Sedang Diproses');
        })->get();
        return view('admin.orderProcess', compact('orderIn'));
    }
}


