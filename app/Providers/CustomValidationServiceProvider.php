<?php

namespace App\Providers;

use App\Models\Location;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Organization;


class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('max_organization_locations', function ($attribute, $value, $parameters, $validator) {
            $organizationId = $value;
            $maxLocations = 5; // Adjust this to the maximum number of locations allowed.
            $organization = Organization::find($organizationId);
            return $organization->locations->count() < $maxLocations;
        });

        Validator::extend('max_devices', function ($attribute, $value, $parameters, $validator) {
            $locationId = $value;
            $maxDevices = 10; // Adjust this to the maximum number of locations allowed.
            $locations = Location::find($locationId);
            return $locations->devices->count() < $maxDevices;
        });
    }

}
