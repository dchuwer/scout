<?php

namespace App\Models\Services\Leadership;

use Illuminate\Support\ServiceProvider;

class LeadershipServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        {
            $this->app->bind('leadershipService', function($app)
            {
                return new LeadershipService(
                     $app->make('App\Models\Repositories\Leadership\LeadershipInterface')
                );
            });
        }
    }

}