<?php

namespace App\Models\Repositories\Leadership;

use Illuminate\Support\ServiceProvider;
use App\Leadership;


class LeadershipRepositoryServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind('App\Models\Repositories\Leadership\LeadershipInterface', function($app)
        {
            return new LeadershipRepository(new Leadership());
        });


    }

}