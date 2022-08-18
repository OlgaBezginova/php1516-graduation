<?php

namespace App\Listeners;

use App\Events\AdminDeleted;
use App\Mail\AdminDeletedEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAdminDeletedEmailListener
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
     * @param  \App\Events\AdminDeleted  $event
     * @return void
     */
    public function handle(AdminDeleted $event)
    {
        Mail::to($event->email)->send(new AdminDeletedEmail());
    }
}
