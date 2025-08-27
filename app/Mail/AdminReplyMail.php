<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $messageContent;

    public function __construct($ticket, $messageContent)
    {
        $this->ticket = $ticket;
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->subject('Balasan dari Admin untuk Tiket ' . $this->ticket->nomor_ticket)
                    ->view('emails.admin_reply');
    }
}
