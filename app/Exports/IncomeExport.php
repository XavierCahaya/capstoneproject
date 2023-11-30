<?php

// App\Exports\OrdersExport.php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class IncomeExport implements FromCollection, WithHeadings, WithStyles
{
    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        // Make sure that $this->orders is a Collection
        $koleksi = collect($this->orders)->map(function ($item, $key) {
            return [
                'No' => $key + 1,
                'Tanggal' => $item->updated_at->format('Y-m-d H:i:s'),
                'Metode Pemesanan' => $item->delivery_option,
                'Nama Pemesan' => $item->orderer_name,
                'Status' => $item->status,
                'Total Pembayaran' => $item->total_price,
            ];
        });

        // Add a row for total income before the total payment row
        $koleksi->push([
            'No' => '',
            'Tanggal' => '',
            'Metode Pemesanan' => '',
            'Nama Pemesan' => 'Total Pemasukan',
            'Status' => '', // Leave total payment empty here
            'Total Pembayaran' => '', // Leave total payment empty here
        ]);

        // Add a row for total payment below the total income row
        $koleksi->push([
            'No' => '',
            'Tanggal' => '',
            'Metode Pemesanan' => '',
            'Nama Pemesan' => '',
            'Status' => '',
            'Total Pembayaran' => '',
        ]);

        return $koleksi;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal',
            'Metode Pemesanan',
            'Nama Pemesan',
            'Status',
            'Total Pembayaran',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $totalPemasukan = $this->orders->sum('total_price');

        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '3498db',
                ],
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->getStyle('A2:F' . ($this->orders->count() + 2))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ]);

        $sheet->mergeCells('A' . ($this->orders->count() + 2) . ':C' . ($this->orders->count() + 2));
        $sheet->getStyle('A' . ($this->orders->count() + 2) . ':C' . ($this->orders->count() + 2))->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->setCellValue('A' . ($this->orders->count() + 2), 'Total Pemasukan');
        $sheet->getStyle('A' . ($this->orders->count() + 2))->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        $sheet->mergeCells('D' . ($this->orders->count() + 2) . ':E' . ($this->orders->count() + 2));
        $sheet->getStyle('D' . ($this->orders->count() + 2) . ':E' . ($this->orders->count() + 2))->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->setCellValue('D' . ($this->orders->count() + 2), $totalPemasukan);
        $sheet->getStyle('D' . ($this->orders->count() + 2))->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        foreach (range('A', 'F') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return [];
    }

}
