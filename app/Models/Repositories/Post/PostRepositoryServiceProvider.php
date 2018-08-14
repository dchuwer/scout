<?php

namespace App\Models\Repositories\Post;

use Illuminate\Support\ServiceProvider;
use App\Models\Entities\Post;

class PostRepositoryServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind('App\Models\Repositories\Post\PostInterface', function($app)
        {
            return new PostRepository(new Post());
        });
    }

}