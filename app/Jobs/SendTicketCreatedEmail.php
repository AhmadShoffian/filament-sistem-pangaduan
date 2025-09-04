<?php

namespace App\Jobs;

use App\Models\Ticket;
use App\Mail\TicketCreatedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendTicketCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $ticket;
    public $email;

    public function __construct(Ticket $ticket, $email)
    {
        $this->ticket = $ticket;
        $this->email = $email;
    }

    public function handle(): void
    {
        if (empty($this->email)) {
            Log::warning("SendTicketCreatedEmail gagal: email kosong untuk Ticket ID {$this->ticket->id}");
            return;
        }

        // queue mailable
        Mail::to($this->email)->queue(
            new TicketCreatedMail($this->ticket)
        );
    }
}
