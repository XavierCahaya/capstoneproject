<?php

namespace App\Http\Controllers;

use App\Exports\IncomeExport;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

// class AdminLaporanKeuangan extends Controller
// {
//     public function index(){
//         $product = Product::all();
//         $order = Order::all();
//         $income_data = OrderDetail::all();
//         return view('admin.laporan_keuangan.index', compact('product','order','income_data'));
//     }

//     public function export()
//     {
//         // Eager load the user relationship for export (opsional)
//         $income_data = OrderDetail::with('product')->get();

//         return Excel::download(new IncomeExport($income_data), 'income_data.xlsx');
//     }
// }



class AdminLaporanKeuangan extends Controller
{
    public function index(Request $request)
    {
        $product = Product::all();
        $order = Order::all();
        $income_data = OrderDetail::all();

        // Check if a date is provided in the request
        if ($request->has('date')) {
            $selectedDate = Carbon::parse($request->input('date'))->toDateString();
            $income_data = OrderDetail::whereDate('updated_at', $selectedDate)->get();
        }

        return view('admin.laporan_keuangan.index', compact('product', 'order', 'income_data'));
    }

    public function export(Request $request)
    {
        // Eager load the user relationship for export (optional)
        $income_data = OrderDetail::with('product');

        // Check if a date is provided in the request
        if ($request->has('date')) {
            $selectedDate = Carbon::parse($request->input('date'))->toDateString();
            $income_data = $income_data->whereDate('updated_at', $selectedDate);
        }

        $income_data = $income_data->get();

        return Excel::download(new IncomeExport($income_data), 'income_data.xlsx');
    }
}
