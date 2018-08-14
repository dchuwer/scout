<?php

namespace App\Models\Services\Post;

use Illuminate\Support\ServiceProvider;

class PostServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        {
            $this->app->bind('postService', function($app)
            {
                return new PostService(
                     $app->make('App\Models\Repositories\Post\PostInterface')
                );
            });
        }
    }

}