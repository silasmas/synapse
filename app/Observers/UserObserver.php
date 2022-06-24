<?php

namespace App\Observers;

use App\Mail\usermail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public $afterCommit = false;
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Mail::to($user->email)->send(new usermail($user, "Crétaion des accès chez groupe synapse"));
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        if ($user->wasChanged('email')) {
            Mail::to($user->email)->send(new usermail($user, "Verification de l'adresse mail modifier"));
        }
        if ($user->wasChanged('email_verified_at ')) {
            Mail::to($user->email)->send(new usermail($user, "Verification de l'adresse mail réussi"));
        }
        Mail::to($user->email)->send(new usermail($user, "Mise à jour de vos information chez Groupe synapse"));
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
