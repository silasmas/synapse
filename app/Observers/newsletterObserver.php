<?php

namespace App\Observers;

use App\Models\newsletter;

class newsletterObserver
{

    public $afterCommit = true;
    /**
     * Handle the newsletter "created" event.
     *
     * @param  \App\Models\newsletter  $newsletter
     * @return void
     */
    public function created(newsletter $newsletter)
    {
        //
    }

    /**
     * Handle the newsletter "updated" event.
     *
     * @param  \App\Models\newsletter  $newsletter
     * @return void
     */
    public function updated(newsletter $newsletter)
    {
        //
    }

    /**
     * Handle the newsletter "deleted" event.
     *
     * @param  \App\Models\newsletter  $newsletter
     * @return void
     */
    public function deleted(newsletter $newsletter)
    {
        //
    }

    /**
     * Handle the newsletter "restored" event.
     *
     * @param  \App\Models\newsletter  $newsletter
     * @return void
     */
    public function restored(newsletter $newsletter)
    {
        //
    }

    /**
     * Handle the newsletter "force deleted" event.
     *
     * @param  \App\Models\newsletter  $newsletter
     * @return void
     */
    public function forceDeleted(newsletter $newsletter)
    {
        //
    }
}
