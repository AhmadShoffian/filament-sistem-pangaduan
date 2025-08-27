<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class LayanansChart extends ChartWidget
{
    protected int|string|array $columnSpan = 1;
    protected static ?string $heading = 'Distribusi Ticket per Jenis Layanan';

    protected function getData(): array
    {
        $ticketByJenis = Ticket::select('master_layanan_informasi.name', DB::raw('count(*) as total'))
            ->join('master_layanan_informasi', 'tickets.master_layanan_informasi_id', '=', 'master_layanan_informasi.id')
            ->groupBy('master_layanan_informasi.name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Ticket',
                    'data' => $ticketByJenis->pluck('total'),
                    'backgroundColor' => [
                        '#3B82F6', 
                        '#10B981', 
                        '#F59E0B', 
                        '#EF4444', 
                        '#8B5CF6', 
                    ],
                ],
            ],
            'labels' => $ticketByJenis->pluck('name'),
        ];
    }
    

    protected function getType(): string
    {
        return 'doughnut';
    }
}
