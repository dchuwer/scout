<?php

namespace App\Models\Repositories\UserHistory;

use App\History;
use Illuminate\Support\ServiceProvider;


class UserHistoryRepositoryServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind('App\Models\Repositories\UserHistory\UserHistoryInterface', function($app)
        {
            return new UserHistoryRepository(new History());
        });
    }

}