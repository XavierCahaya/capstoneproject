<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CekpesananController extends Controller
{
    public function semua()
    {
        $order = Order::all();
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('cekpesanan.semua', compact('order', 'orderDetail'));
    }

    public function delivery()
    {
        $order = Order::where('delivery_option', 'delivery')->get();
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('cekpesanan.delivery', compact('order', 'orderDetail'));
    }

    public function dineIn()
    {
        $order = Order::where('delivery_option', 'dine-in')->get();
        $orderDetail = OrderDetail::with('product', 'order')->get();
        return view('cekpesanan.dineIn', compact('order', 'orderDetail'));
    }

    public function btnKonfirmasi(Request $request ,$id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'Selesai',
            'status_pembayaran' => 'capture',
        ]);

        return redirect()->back();
    }
}
