<?php

namespace App\Observers;

use App\Medicine;
use App\Notification;
use App\Log;
use Auth;
use Request;

class MedicineObserver
{
    /**
     * Handle the medicine "created" event.
     *
     * @param  \App\Medicine  $medicine
     * @return void
     */
    public function created(Medicine $medicine)
    {
        Log::create([
            'user_id' => Auth::user()->id,
            'instance_id' => $medicine->id,
            'table' => 'medicines',
            'action' => 'created',
            'ip_address' => Request::ip(),
        ]);

        $user = Auth::user()->username;
        
        Notification::createForAdmin([
            'data' => "Medicine $medicine->brand_name has been created by $user",
            'route_name' => 'medicine.show',
            'route_id' => $medicine->id
        ]);
    }

    /**
     * Handle the medicine "updated" event.
     *
     * @param  \App\Medicine  $medicine
     * @return void
     */
    public function updated(Medicine $medicine)
    {
        Log::create([
            'user_id' => Auth::user()->id,
            'instance_id' => $medicine->id,
            'table' => 'medicines',
            'action' => 'updated',
            'ip_address' => Request::ip(),
        ]);
        
        $user = Auth::user()->username;
        
        Notification::createForAdmin([
            'data' => "Medicine $medicine->brand_name has been updated by $user",
            'route_name' => 'medicine.show',
            'route_id' => $medicine->id
        ]);
    }

    /**
     * Handle the medicine "deleted" event.
     *
     * @param  \App\Medicine  $medicine
     * @return void
     */
    public function deleted(Medicine $medicine)
    {
        //
    }

    /**
     * Handle the medicine "restored" event.
     *
     * @param  \App\Medicine  $medicine
     * @return void
     */
    public function restored(Medicine $medicine)
    {
        //
    }

    /**
     * Handle the medicine "force deleted" event.
     *
     * @param  \App\Medicine  $medicine
     * @return void
     */
    public function forceDeleted(Medicine $medicine)
    {
        //
    }
}
