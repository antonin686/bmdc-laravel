<?php

namespace App\Observers;

use App\AuthorizeMedicine;

class AuthorizeMedicineObserver
{
    /**
     * Handle the authorize medicine "created" event.
     *
     * @param  \App\AuthorizeMedicine  $authorizeMedicine
     * @return void
     */
    public function created(AuthorizeMedicine $authorizeMedicine)
    {
        //
    }

    /**
     * Handle the authorize medicine "updated" event.
     *
     * @param  \App\AuthorizeMedicine  $authorizeMedicine
     * @return void
     */
    public function updated(AuthorizeMedicine $authorizeMedicine)
    {
        //
    }

    /**
     * Handle the authorize medicine "deleted" event.
     *
     * @param  \App\AuthorizeMedicine  $authorizeMedicine
     * @return void
     */
    public function deleted(AuthorizeMedicine $authorizeMedicine)
    {
        //
    }

    /**
     * Handle the authorize medicine "restored" event.
     *
     * @param  \App\AuthorizeMedicine  $authorizeMedicine
     * @return void
     */
    public function restored(AuthorizeMedicine $authorizeMedicine)
    {
        //
    }

    /**
     * Handle the authorize medicine "force deleted" event.
     *
     * @param  \App\AuthorizeMedicine  $authorizeMedicine
     * @return void
     */
    public function forceDeleted(AuthorizeMedicine $authorizeMedicine)
    {
        //
    }
}
