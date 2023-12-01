<?php

namespace App\Http\Controllers;

use App\Exports\IncomeExport;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class AdminLaporanKeuangan extends Controller
{

    public function index(Request $request)
    {
        // Fetch only the orders with the "Selesai" status
        $income_data = Order::where('status', 'Selesai')->get();

        return view('admin.laporan_keuangan.index', compact('income_data'));
    }

    public function export(Request $request)
    {
        $export_date = $request->input('export_date');

        $query = Order::where('status', 'Selesai');

        if ($export_date) {
            // Add a filter for the selected date
            $query->whereDate('updated_at', $export_date);
        }

        $income_data = $query->get();

        return Excel::download(new IncomeExport($income_data), 'income_data.xlsx');
    }
}
