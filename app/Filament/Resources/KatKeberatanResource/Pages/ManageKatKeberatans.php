<?php

namespace App\Filament\Resources\KatKeberatanResource\Pages;

use App\Filament\Resources\KatKeberatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKatKeberatans extends ManageRecords
{
    protected static string $resource = KatKeberatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
