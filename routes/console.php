<?php

use App\Jobs\CloseOldTicketsJob;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Contoh command artisan (opsional)
Artisan::command('inspire', function () {
    $this->comment('Inspiring quote!');
})->describe('Display an inspiring quote');

// Schedule job setiap menit
Schedule::job(new CloseOldTicketsJob)->everyMinute();
