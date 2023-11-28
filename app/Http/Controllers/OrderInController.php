<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\OrderIn;

class OrderInController extends Controller
{
    public function index()
    {
        $orderIn = OrderDetail::with('product', 'order')
        ->whereHas('order', function ($query) {
            $query->where('status', 'Menunggu Diproses');
        })->get();
        return view('admin.orderIn', compact('orderIn'));
    }

    public function btnAction(Request $request ,$id)
    {
        $orderIn = Order::findOrFail($id);
        $orderIn->update([
            'status' => 'Sedang Diproses',
        ]);

        return redirect()->back();
    }
}


