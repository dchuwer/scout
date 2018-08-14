<?php

namespace App\Models\Repositories\Post;

use App\Models\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PostRepository implements PostInterface
{

    protected $postModel;

    public $rules = [
        1 => "Moviment",
        2 => "Leadership",
        3 => "Tribe",
        4 => "Grade",
        5 => "Parents"
    ];

    public function __construct(Model $postModel)
    {
        $this->postModel = $postModel;

    }

    public function getPosts(string $path): Collection
    {
        return $this->postModel->latest()
            ->whereraw($path)
            ->get();
    }

    public function storePost(string $path)
    {

        $this->postModel->create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            'path' => $path
        ]);


    }

    public function editPost($id)
    {
        $post = $this->postModel->find($id);
        return $post;
    }

    public function updatePost($id)
    {
        $postToUpdate = $this->postModel->find($id);
        $postToUpdate->update([
            'title' => request('title'),
            'body' => request('body')

        ]);
    }





}