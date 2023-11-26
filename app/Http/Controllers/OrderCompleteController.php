<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderComplete;

class OrderCompleteController extends Controller
{
    public function index()
    {
        $orderIn = OrderComplete::with('orderDetails')->get();
        return view('admin.orderComplete', ['orderIn' => $orderIn]);
    }
}


