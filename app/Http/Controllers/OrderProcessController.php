<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProcess;

class OrderProcessController extends Controller
{
    public function index()
    {
        $orderIn = OrderProcess::with('orderDetails')->get();
        return view('admin.orderProcess', ['orderIn' => $orderIn]);
    }
}


