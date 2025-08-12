<?php

namespace App\Filament\Resources\LayananInformasiResource\Pages;

use App\Filament\Resources\LayananInformasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLayananInformasis extends ManageRecords
{
    protected static string $resource = LayananInformasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
