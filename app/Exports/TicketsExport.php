<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TicketsExport implements FromQuery, WithHeadings
{
    public function __construct(protected Builder $query) {}

    public function query(): Builder
    {
        return $this->query->select([
            'id',
            'nomor_ticket',
            'nama_lengkap',
            'email',
            'no_telepon',
            'status',
            'created_at',
        ]);
    }

    public function headings(): array
    {
        return ['ID','Nomor Ticket','Nama','Email','Telepon','Status','Dibuat'];
    }
}
