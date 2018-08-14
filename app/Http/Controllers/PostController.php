<?php

namespace App\Http\Controllers;
use App\Models\Entities\Post;

use App\Classes\buildLevelArray;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);

    }

    public $rules = [
        1 => "Moviment",
        2 => "Leadership",
        3 => "Tribe",
        4 => "Grade",
        5 => "Parents"
    ];

    public function index()
    {
        $userHistories = \UserHistoryFacade::getUserHistories();
        $posts = \PostFacade::getPosts($userHistories);
        return view('posts.index', compact('posts'));

    }


    public function create()
    {
        $user = \Auth::user();
        $type = $this->rules[$user->rules];
        if($type == "Tribe"){
            $grades = \TribeFacade::getGradeNames();
            dd($grades);
        }
        if($type == "Leadership"){
            $tribes = \LeadershipFacade::getTribeNames();
            $grades = \TribeFacade::getGradeNamesFromLeader($tribes);
            dd($grades);
        }


        $collectionLevels = \PostFacade::createPost();
        $typeUserBefore = $collectionLevels[0];
        $tribes = $collectionLevels[1];
        $leaderships = $collectionLevels[2];
        return view('posts.create',  compact('typeUserBefore', 'tribes', 'leaderships'));
    }

    public function store()
    {
        \PostFacade::storePost();
        return redirect('/posts');
    }



    public function edit($id)
    {
        $post = \PostFacade::editPost($id);
        return view('posts.edit', compact('post'));
    }

    public function update($id)
    {
        \PostFacade::updatePost($id);
        return redirect('/posts');
    }
}

