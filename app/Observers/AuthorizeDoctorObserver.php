<?php

namespace App\Observers;

use App\AuthorizeDoctor;
use App\Notification;
use App\Log;
use Auth;
use Request;


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
        Log::create([
            'user_id' => 'N/A',
            'instance_id' => $authorizeDoctor->id,
            'table' => 'authorize_doctors',
            'action' => 'created',
            'ip_address' => Request::ip(),
        ]);

        //$user = Auth::user()->username;
        
        
    }

    /**
     * Handle the authorize doctor "updated" event.
     *
     * @param  \App\AuthorizeDoctor  $authorizeDoctor
     * @return void
     */
    public function updated(AuthorizeDoctor $authorizeDoctor)
    {
        // Log::create([
        //     'user_id' => Auth::user()->id,
        //     'instance_id' => $authorizeDoctor->id,
        //     'table' => 'authorize_doctors',
        //     'action' => 'Approved',
        //     'ip_address' => Request::ip(),
        // ]);

        // $user = Auth::user()->username;
        
        if($authorizeDoctor->status == 1)
        {
            Notification::createForAdmin([
                'data' => "New Doctor Application Applied by Doctor $authorizeDoctor->full_name",
                'route_name' => 'application.doctorApplicationShow',
                'route_id' => $authorizeDoctor->id
            ]);
        }

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
