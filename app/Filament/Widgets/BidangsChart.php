<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BidangsChart extends ChartWidget
{
    protected int|string|array $columnSpan = 1;
    protected static ?string $heading = 'Distribusi Ticket per Jenis Bidang';

    protected function getData(): array
    {
        $ticketByJenis = Ticket::select('master_kat_bidang.name', DB::raw('count(*) as total'))
            ->join('master_kat_bidang', 'tickets.master_kat_bidang_id', '=', 'master_kat_bidang.id')
            ->groupBy('master_kat_bidang.name')
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
        return 'pie';
    }
}
