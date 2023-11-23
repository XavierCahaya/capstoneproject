<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::all();
        return view('admin.orderDetail', ['orderDetails' => $orderDetails]);
    }
}
