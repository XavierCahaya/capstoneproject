<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderProcess;
use Illuminate\Http\Request;

class OrderProcessController extends Controller
{
    
    public function semua()
    {
        $order = Order::where('status', 'Sedang Diproses')->get();
        $orderPrcs = OrderDetail::with('product', 'order')->get();
        return view('admin.order.process.semua', compact('order' ,'orderPrcs'));
    }

    public function delivery()
    {
        $order = Order::where('status', 'Sedang Diproses')
                        ->where('delivery_option', 'delivery')
                        ->get();
        $orderPrcs = OrderDetail::with('product', 'order')->get();
        return view('admin.order.process.delivery', compact('order' ,'orderPrcs'));
    }

    public function dineIn()
    {
        $order = Order::where('status', 'Sedang Diproses')
                        ->where('delivery_option', 'dine-in')
                        ->get();
        $orderPrcs = OrderDetail::with('product', 'order')->get();
        return view('admin.order.process.dineIn', compact('order' ,'orderPrcs'));
    }

    public function btnAction(Request $request ,$id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'Selesai',
        ]);

        return redirect()->back();
    }
}


