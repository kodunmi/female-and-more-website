<?php

namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\VerifyEmail as NotificationsVerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends NotificationsVerifyEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->queue = 'email';
    }
}
