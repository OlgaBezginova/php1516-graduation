<?php

namespace App\Listeners;

use App\Events\AdminRegistered;
use App\Mail\AdminRegisteredEmail;
use Illuminate\Support\Facades\Mail;

class SendAdminConfirmationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AdminRegistered  $event
     * @return void
     */
    public function handle(AdminRegistered $event)
    {
        Mail::to($event->admin)->send(new AdminRegisteredEmail($event->admin));
    }
}
