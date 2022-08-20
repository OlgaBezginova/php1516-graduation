<?php

namespace App\Listeners;

use App\Events\AdminStatusChanged;
use App\Mail\AdminStatusChangedEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminStatusChangedEmailListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(AdminStatusChanged $event)
    {
        Mail::to($event->admin)->send(new AdminStatusChangedEmail($event->admin));
    }
}
