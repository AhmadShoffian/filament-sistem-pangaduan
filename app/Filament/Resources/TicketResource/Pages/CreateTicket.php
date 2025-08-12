<?php

namespace App\Filament\Resources\TicketResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\create;
use App\Filament\Resources\TicketResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        do {
            $nomorTicket = str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (\App\Models\Ticket::where('nomor_ticket', $nomorTicket)->exists());

        $data['nomor_ticket'] = $nomorTicket;

        return $data;
    }
}
