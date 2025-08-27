<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsDashboard extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    protected function getStats(): array
    {
        $countTicket = Ticket::count();
        $countOpen   = Ticket::where('status', 'in_progress')->count();
        $countClosed = Ticket::where('status', 'closed')->count();
        return [
            Stat::make('Jumlah Ticket', value: $countTicket),
            Stat::make('Status Open', $countOpen),
            Stat::make('Status Closed', $countClosed),
        ];
    }
}
