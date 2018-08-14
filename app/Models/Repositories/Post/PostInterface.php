<?php

namespace App\Models\Repositories\Post;

use App\Models\Entities\Post;
use Illuminate\Support\Collection;

interface PostInterface
{
    public function getPosts(string $path): Collection;

    public function storePost(string $path);

    public function editPost($id);

    public function updatePost($id);
}