<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Laravel\Events\UserAction' => [
            'App\Laravel\Listeners\UserActivityListener',
            'App\Laravel\Listeners\UserLoginListener',
            'App\Laravel\Listeners\UserRegisterListener',
        ],

        'metos-forecast' => ['App\Laravel\Listeners\Metos\ForecastListener'],

        'metos-bind' => ['App\Laravel\Listeners\Metos\StationListener'],
        'send-sms'  => [ 'App\Laravel\Listeners\SendSmsListener'],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
