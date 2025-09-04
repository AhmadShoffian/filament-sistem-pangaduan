<?php

namespace App\Jobs;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use App\Mail\UserSendMessageMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendUserMessageEmail implements ShouldQueue
{
    use Dispatchable,InteractsWithQueue, Queueable, SerializesModels;

    public $ticket;
    public $messageContent;
    public $recipientEmail;
    /**
     * Create a new job instance.
     */
    public function __construct(Ticket $ticket, $messageContent, $recipientEmail)
    {
        $this->ticket = $ticket;
        $this->messageContent = $messageContent;
        $this->recipientEmail = $recipientEmail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->recipientEmail)->send(new UserSendMessageMail($this->ticket, $this->messageContent));
    }
}
