<?php

namespace App\Models\Services\Post;

use Illuminate\Support\Facades\Facade;

class PostFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'postService'; }
}