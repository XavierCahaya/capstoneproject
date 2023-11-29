<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\OrderComplete;

class OrderCompleteController extends Controller
{
    public function semua()
    {
        $order = Order::where('status', 'Selesai')->get();
        $orderCmp = OrderDetail::with('product', 'order')->get();
        return view('admin.order.complete.semua', compact('order' ,'orderCmp'));
    }

    public function delivery()
    {
        $order = Order::where('status', 'Selesai')
                        ->where('delivery_option', 'delivery')
                        ->get();
        $orderCmp = OrderDetail::with('product', 'order')->get();
        return view('admin.order.complete.delivery', compact('order' ,'orderCmp'));
    }

    public function dineIn()
    {
        $order = Order::where('status', 'Selesai')
                        ->where('delivery_option', 'dine-in')
                        ->get();
        $orderCmp = OrderDetail::with('product', 'order')->get();
        return view('admin.order.complete.dineIn', compact('order' ,'orderCmp'));
    }

    public function btnAction(Request $request ,$id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'Sedang Diantar',
        ]);

        return redirect()->back();
    }

}


