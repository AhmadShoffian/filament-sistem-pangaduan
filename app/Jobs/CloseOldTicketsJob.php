<?php

namespace App\Jobs;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CloseOldTicketsJob
{
    use Dispatchable, Queueable, SerializesModels;

    public function handle(): void
    {
        // Ambil batas waktu 5 hari yang lalu
        $cutoff = Carbon::now()->subDays(5);

        // Update semua tiket yang belum closed dan dibuat lebih dari 5 hari yang lalu
        Ticket::where('status', '!=', 'closed')
            ->where('created_at', '<', $cutoff)
            ->update(['status' => 'closed']);
    }
}
