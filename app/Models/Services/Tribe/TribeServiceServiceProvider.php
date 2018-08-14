<?php

namespace App\Models\Services\Tribe;

use Illuminate\Support\ServiceProvider;

class TribeServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        {
            $this->app->bind('tribeService', function($app)
            {
                return new TribeService(
                     $app->make('App\Models\Repositories\Tribe\TribeInterface')
                );
            });
        }
    }

}