<?php

namespace App\Providers;

use App\Events\Activation;
use App\Events\ForgotPassword;
use App\Listeners\SendActivationEmail;
use App\Listeners\SendForgotPasswordEmail;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Activation::class => [
            SendActivationEmail::class,
        ],
        ForgotPassword::class => [
            SendForgotPasswordEmail::class,
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
