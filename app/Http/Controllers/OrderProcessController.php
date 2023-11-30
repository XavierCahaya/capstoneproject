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
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('admin.order.process.semua', compact('order' ,'orderDetail'));
    }

    public function delivery()
    {
        $order = Order::where('status', 'Sedang Diproses')
                        ->where('delivery_option', 'delivery')
                        ->get();
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('admin.order.process.delivery', compact('order' ,'orderDetail'));
    }

    public function dineIn()
    {
        $order = Order::where('status', 'Sedang Diproses')
                        ->where('delivery_option', 'dine-in')
                        ->get();
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('admin.order.process.dineIn', compact('order' ,'orderDetail'));
    }

    public function btnActionSelesai(Request $request ,$id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'Selesai',
        ]);

        return redirect()->back();
    }

    public function btnActionDiantar(Request $request ,$id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'Sedang Diantar',
        ]);

        return redirect()->back();
    }

    public function btnActionDibayar(Request $request ,$id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'Selesai',
            'status_pembayaran' => 'Sudah Dibayar',
        ]);

        return redirect()->back();
    }
}


