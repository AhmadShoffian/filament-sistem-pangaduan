<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TicketsExport implements FromCollection, WithHeadings, WithStyles, WithEvents, \Maatwebsite\Excel\Concerns\WithColumnFormatting

{
    public function collection()
    {
        return Ticket::with(['kategoriPemohon', 'kategoriBidang', 'jenisLayanan'])
            ->get()
            ->map(function ($t) {
                return [
                    $t->id,
                    $t->nomor_ticket,
                    $t->jenisLayanan?->name,
                    $t->kategoriPemohon?->name,
                    $t->kategoriBidang?->name,
                    $t->nama_lengkap,
                    $t->email,
                    $t->no_telepon,
                    $t->status,
                    $t->created_at->format('Y-m-d H:i'),
                ];
            });
    }


    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT, // Kolom B = Nomor Ticket
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nomor Ticket',
            'Jenis Layanan',
            'Kategori Pemohon',
            'Kategori Bidang',
            'Nama Lengkap',
            'Email',
            'No Telepon',
            'Status',
            'Created At',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // Header ada di baris ke-2 (karena baris 1 dipakai judul)
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '2563EB'], // biru Tailwind
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Geser data ke baris ke-3 karena baris 1 judul, baris 2 header
                $sheet->insertNewRowBefore(1, 1);

                // Judul di baris pertama (A1:J1 merge)
                $sheet->mergeCells('A1:J1');
                $sheet->setCellValue('A1', 'Daftar Ticket');

                // Style judul
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => 'FFFFFF']],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '16A34A'], // hijau Tailwind
                    ],
                ]);

                // Auto size kolom
                foreach (range('A', 'J') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }
}
