<?php

namespace App\Observers;

use App\AuthorizeDoctor;

class AuthorizeDoctorObserver
{
    /**
     * Handle the authorize doctor "created" event.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return void
     */
    public function created(AuthorizeDoctor $authorizeDoctor)
    {
        //
    }

    /**
     * Handle the authorize doctor "updated" event.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return void
     */
    public function updated(AuthorizeDoctor $authorizeDoctor)
    {
        //
    }

    /**
     * Handle the authorize doctor "deleted" event.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return void
     */
    public function deleted(AuthorizeDoctor $authorizeDoctor)
    {
        //
    }

    /**
     * Handle the authorize doctor "restored" event.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return void
     */
    public function restored(AuthorizeDoctor $authorizeDoctor)
    {
        //
    }

    /**
     * Handle the authorize doctor "force deleted" event.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return void
     */
    public function forceDeleted(AuthorizeDoctor $authorizeDoctor)
    {
        //
    }
}
