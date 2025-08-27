<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsDashboard::class,
            \App\Filament\Widgets\LayanansChart::class,
        ];
    }

    public function getColumns(): int|array
    {
        return 2; // jumlah kolom widget
    }
}
