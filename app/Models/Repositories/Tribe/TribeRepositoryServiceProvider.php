<?php

namespace App\Models\Repositories\Tribe;

use Illuminate\Support\ServiceProvider;
use App\Tribe;


class TribeRepositoryServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind('App\Models\Repositories\Tribe\TribeInterface', function($app)
        {
            return new TribeRepository(new Tribe());
        });


    }

}