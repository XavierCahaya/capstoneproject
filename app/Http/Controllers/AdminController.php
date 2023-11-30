<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesananMasuk = Order::where('status', 'Menunggu Diproses')->count();
        $pesananDiproses = Order::whereIn('status', ['Sedang Diproses', 'Sedang Diantar'])->count();
        $pesananSelesai = Order::where('status', 'Selesai')->count();

        return view('admin.dashboard', compact('pesananMasuk', 'pesananDiproses', 'pesananSelesai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
