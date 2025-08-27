<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminSendMessageMail extends Mailable
{
    use SerializesModels;

    public $ticket;
    public $comment;

    public function __construct($ticket, $comment)
    {
        $this->ticket = $ticket;
        $this->comment = $comment;
    }

    public function build()
    {
        return $this->subject('Balasan Admin untuk Tiket #' . $this->ticket->id)
                    ->view('emails.admin_reply');
    }
}
