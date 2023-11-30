<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\OrderIn;

class OrderInController extends Controller
{
    public function semua()
    {
        $order = Order::where('status', 'Menunggu Diproses')->get();
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('admin.order.in.semua', compact('order' ,'orderDetail'));
    }

    public function delivery()
    {
        $order = Order::where('status', 'Menunggu Diproses')
                        ->where('delivery_option', 'delivery')
                        ->get();
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('admin.order.in.delivery', compact('order' ,'orderDetail'));
    }

    public function dineIn()
    {
        $order = Order::where('status', 'Menunggu Diproses')
                        ->where('delivery_option', 'dine-in')
                        ->get();
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('admin.order.in.dineIn', compact('order' ,'orderDetail'));
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


