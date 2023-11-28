<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;


class IncomeExport implements FromCollection, WithHeadings, WithStyles
{
    protected $incomeData;

    public function __construct($incomeData)
    {
        $this->incomeData = $incomeData;
    }

    public function collection()
    {
        // Hitung total pemasukan
        $totalPemasukan = $this->incomeData->sum('subtotal');

        // Buat koleksi dengan data dan total pemasukan
        $koleksi = $this->incomeData->map(function ($item, $loop) {
            return [
                'No' => $loop + 1,
                'Nama Pemesan' => $item->order->orderer_name,
                'Nama Produk' => $item->product->name,
                'Jumlah Pesanan' => $item->qty,
                'Total Pembayaran' => $item->subtotal,
                'Tanggal' => $item->updated_at->format('Y-m-d H:i:s'),
            ];
        });

        // Tambahkan baris total pemasukan sebelum baris total pembayaran
        $koleksi->push([
            'No' => '',
            'Nama Pemesan' => '',
            'Nama Produk' => 'Total Pemasukan',
            'Jumlah Pesanan' => '', // Kosongkan total pembayaran di sini
            'Total Pembayaran' => '', // Kosongkan total pembayaran di sini
            'Tanggal' => '',
        ]);

        // Tambahkan baris total pembayaran di bawah baris total pemasukan
        $koleksi->push([
            'No' => '',
            'Nama Pemesan' => '',
            'Nama Produk' => '',
            'Jumlah Pesanan' => '',
            'Total Pembayaran' => '',
            'Tanggal' => '',
        ]);

        return $koleksi;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Pemesan',
            'Nama Produk',
            'Jumlah Pesanan',
            'Total Pembayaran',
            'Tanggal',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Deklarasikan $totalPemasukan
        $totalPemasukan = $this->incomeData->sum('subtotal');
        // Terapkan gaya ke baris header
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'a9a9a9', // Warna latar belakang header
                ],
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Terapkan gaya ke baris data
        $sheet->getStyle('A2:F' . ($this->incomeData->count() + 2))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        // Format merge dan center untuk baris total pemasukan (baris terakhir)
        $totalPemasukanRow = $this->incomeData->count() + 2;
        $sheet->mergeCells("A{$totalPemasukanRow}:C{$totalPemasukanRow}");
        $sheet->getStyle("A{$totalPemasukanRow}:C{$totalPemasukanRow}")->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Set nilai di dalam sel 'Total Pemasukan'
        $sheet->setCellValue("A{$totalPemasukanRow}", 'Total Pemasukan');
        $sheet->getStyle("A{$totalPemasukanRow}")->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        // Format merge dan center untuk baris total pemasukan (baris terakhir)
        $totalPembayaranRow = $this->incomeData->count() + 2;
        $sheet->mergeCells("D{$totalPembayaranRow}:F{$totalPembayaranRow}");
        $sheet->getStyle("D{$totalPembayaranRow}:F{$totalPembayaranRow}")->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Set nilai di dalam sel 'Total Pembayaran'
        $sheet->setCellValue("D{$totalPembayaranRow}", $totalPemasukan);
        $sheet->getStyle("D{$totalPembayaranRow}")->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        // Atur lebar kolom berdasarkan kontennya
        foreach (range('A', 'F') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return [];
    }
}
