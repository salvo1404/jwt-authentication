<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendForgotPasswordEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  ForgotPassword $event
     *
     * @return void
     */
    public function handle(ForgotPassword $event)
    {
        $user     = $event->user;
        $password = $event->password;

        $this->mailer->send(
            ['html' => 'emails.password'],
            compact('user', 'password'),
            function ($message) use ($user) {
                $message->to($user->email);
                $message->subject('SB Vita Password Reset');
            }
        );
    }
}
