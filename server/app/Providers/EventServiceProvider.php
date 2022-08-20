<?php

namespace App\Providers;

use App\Events\AdminDeleted;
use App\Events\AdminRegistered;
use App\Events\AdminStatusChanged;
use App\Listeners\SendAdminConfirmationEmail;
use App\Listeners\SendAdminDeletedEmailListener;
use App\Listeners\SendAdminStatusChangedEmailListener;
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
        AdminStatusChanged::class => [
            SendAdminStatusChangedEmailListener::class,
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
