<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CekpesananController extends Controller
{
    public function semua()
    {
        $order = Order::all();
        return view('cekpesanan.semua', compact('order'));
    }

    public function delivery()
    {
        $order = Order::where('delivery_option', 'delivery')->get();
        return view('cekpesanan.delivery', compact('order'));
    }    

    public function dineIn()
    {
        $order = Order::where('delivery_option', 'dine-in')->get();
        return view('cekpesanan.dineIn', compact('order'));
    }
}
