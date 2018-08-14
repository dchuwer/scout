<?php

namespace App\Models\Services\UserHistory;

use Illuminate\Support\ServiceProvider;

class UserHistoryServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        {
            $this->app->bind('userHistoryService', function($app)
            {
                return new UserHistoryService(
                     $app->make('App\Models\Repositories\UserHistory\UserHistoryInterface')
                );
            });
        }
    }

}