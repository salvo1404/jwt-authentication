<?php

namespace App\Listeners;

use App\Events\Activation;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendActivationEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  Activation $event
     *
     * @return void
     */
    public function handle(Activation $event)
    {
        $user  = $event->user;
        $token = $event->token;

        $this->mailer->send(
            ['html' => 'emails.activation'],
            compact('user', 'token'),
            function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('SB Vita User Activation');
            }
        );
    }
}
