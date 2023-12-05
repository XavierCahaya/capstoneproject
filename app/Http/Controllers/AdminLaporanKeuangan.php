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
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Fetch orders with "Selesai" status and apply date range if provided
        $query = Order::where('status', 'Selesai');

        if ($start_date && $end_date) {
            $query->whereDate('updated_at', '>=', $start_date)
                ->whereDate('updated_at', '<=', $end_date);
        }

        $income_data = $query->get();

        return view('admin.laporan_keuangan.index', compact('income_data'));
    }

    public function export(Request $request)
    {
        $start_date = $request->input('export_start_date');
        $end_date = $request->input('export_end_date');

        // Fetch orders with "Selesai" status and apply date range if provided
        $query = Order::where('status', 'Selesai');

        if ($start_date && $end_date) {
            $query->whereDate('updated_at', '>=', $start_date)
                ->whereDate('updated_at', '<=', $end_date);
        }

        $income_data = $query->get();

        return Excel::download(new IncomeExport($income_data), 'income_data.xlsx');
    }
}
