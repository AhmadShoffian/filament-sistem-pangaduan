<?php

namespace App\Filament\Exports;

use App\Models\Ticket;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class TicketExporter extends Exporter
{
    protected static ?string $model = Ticket::class;
    
    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('nomor_ticket'),
            ExportColumn::make('master_kat_pemohon_id'),
            ExportColumn::make('master_kat_bidang_id'),
            ExportColumn::make('master_layanan_informasi_id'),
            ExportColumn::make('master_kat_informasi_id'),
            ExportColumn::make('master_kat_keberatan_id'),
            ExportColumn::make('nama_lengkap'),
            ExportColumn::make('nomor_identitas'),
            ExportColumn::make('lampiran_identitas'),
            // ExportColumn::make('lampiran_apbh'),
            ExportColumn::make('email'),
            ExportColumn::make('no_telepon'),
            ExportColumn::make('alamat'),
            ExportColumn::make('tujuan_permohonan_informasi'),
            ExportColumn::make('tujuan_keberatan'),
            ExportColumn::make('nama_pejabat'),
            ExportColumn::make('nama_mitra'),
            ExportColumn::make('jabatan_pejabat'),
            ExportColumn::make('jabatan_mitra'),
            ExportColumn::make('penyalahgunaan_pejabat'),
            ExportColumn::make('penyalahgunaan_mitra'),
            ExportColumn::make('rincian_informasi'),
            ExportColumn::make('lampiran_bukti_pejabat'),
            ExportColumn::make('lampiran_bukti_mitra'),
            ExportColumn::make('lampiran_dukung'),
            ExportColumn::make('status'),
            ExportColumn::make('created_by'),
            ExportColumn::make('updated_by'),
            ExportColumn::make('deleted_by'),
            ExportColumn::make('deleted_at'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your ticket export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
