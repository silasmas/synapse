<?php

namespace App\Observers;

use App\Models\User;
use App\Models\contact;
use App\Mail\notification;
use Illuminate\Support\Facades\Mail;

class notifyObserver
{
    public $afterCommit = true;
    /**
     * Handle the contact "created" event.
     *
     * @param  \App\Models\contact  $contact
     * @return void
     */
    public function created(contact $contact)
    {
        $user = User::where("notifiable", 'oui')->get();
        if ($user) {
            foreach ($user as $u) {
                Mail::to($u->email)->send(new notification($u));
            }
        }
    }

    /**
     * Handle the contact "updated" event.
     *
     * @param  \App\Models\contact  $contact
     * @return void
     */
    public function updated(contact $contact)
    {
        //
    }

    /**
     * Handle the contact "deleted" event.
     *
     * @param  \App\Models\contact  $contact
     * @return void
     */
    public function deleted(contact $contact)
    {
        //
    }

    /**
     * Handle the contact "restored" event.
     *
     * @param  \App\Models\contact  $contact
     * @return void
     */
    public function restored(contact $contact)
    {
        //
    }

    /**
     * Handle the contact "force deleted" event.
     *
     * @param  \App\Models\contact  $contact
     * @return void
     */
    public function forceDeleted(contact $contact)
    {
        //
    }
}
