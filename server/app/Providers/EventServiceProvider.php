<?php

namespace App\Providers;

use App\Events\AdminDeleted;
use App\Events\AdminRegistered;
use App\Listeners\SendAdminConfirmationEmail;
use App\Listeners\SendAdminDeletedEmailListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AdminRegistered::class => [
            SendAdminConfirmationEmail::class,
        ],
        AdminDeleted::class => [
            SendAdminDeletedEmailListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
