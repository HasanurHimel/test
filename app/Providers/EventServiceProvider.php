<?php

namespace App\Providers;

use App\Events\CreateEvent;
use App\Events\DeleteEvent;
use App\Events\UpdateEvent;
use App\Listeners\CacheListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CreateEvent::class => [CacheListener::class],
        UpdateEvent::class => [CacheListener::class],
        DeleteEvent::class => [CacheListener::class],
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
