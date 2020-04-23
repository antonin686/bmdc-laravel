<?php

namespace App\Observers;

use App\AuthorizeMedicine;
use App\Notification;
use App\Log;
use Auth;
use Request;


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
        Log::create([
            'user_id' => 'N/A',
            'instance_id' => $authorizeMedicine->id,
            'table' => 'authorize_medicines',
            'action' => 'created',
            'ip_address' => Request::ip(),
        ]);

        //$user = Auth::user()->username;
        
        Notification::createForAdmin([
            'data' => "New Medicine Application Applied by $authorizeMedicine->applicant_name",
            'route_name' => 'application.medicineApplicationShow',
            'route_id' => $authorizeMedicine->id
        ]);
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
