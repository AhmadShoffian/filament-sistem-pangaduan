<?php

namespace App\Jobs;

use App\Mail\AdminReplyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendAdminReplyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $ticket;
    public $messageContent;
    public $email;

    public function __construct($ticket, $messageContent, $email)
    {
        $this->ticket = $ticket;
        $this->messageContent = $messageContent;
        $this->email = $email;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new AdminReplyMail($this->ticket, $this->messageContent));
    }
}
