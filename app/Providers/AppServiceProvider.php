<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Medicine;
use App\AuthorizeDoctor;
use App\AuthorizeMedicine;
use App\Observers\MedicineObserver;
use App\Observers\AuthorizeDoctorObserver;
use App\Observers\AuthorizeMedicineObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Medicine::observe(MedicineObserver::class);
        AuthorizeDoctor::observe(AuthorizeDoctorObserver::class);
        AuthorizeMedicine::observe(AuthorizeMedicineObserver::class);
    }
}
