<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderIn;

class OrderInController extends Controller
{
    public function index()
    {
        $orderIn = OrderIn::with('orderDetails')->get();
        return view('admin.OrderIn', ['orderIn' => $orderIn]);
    }
}


