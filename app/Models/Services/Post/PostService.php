<?php

namespace App\Models\Services\Post;

use App\Factories\RulesFactory;
use App\Models\Repositories\Post\PostInterface;
use App\Classes\BuildPath;
use App\Classes\BuildStorePath;
use Illuminate\Support\Collection;
use App\Classes\BuildNamesArray;

class PostService
{

    public $rules = [
        1 => "Moviment",
        2 => "Leadership",
        3 => "Tribe",
        4 => "Grade",
        5 => "Parents"
    ];

    protected $postRepo;

    public function __construct(PostInterface $postRepo)
    {
        $this->postRepo = $postRepo;
        $this->user = \Auth::user();
        $this->type = $this->rules[$this->user->rules];
    }



    public function getPosts(Collection $userHistories)
    {
        $firstSearch = true;
        $buildPath = new BuildPath($this->user, $firstSearch, $this->user->rules);
        $path = $buildPath->newPath($this->type);
        if ($userHistories->count()) {
            $historyPath = $this->getPathHistory($userHistories);
            $path = $path . '' . $historyPath;
        }

        return $this->postRepo->getPosts($path);
    }

    public function getPathHistory(Collection $userHistories)
    {
        $firstSearch = false;
        $historiesPath = "";
        foreach($userHistories as $userHistory){
            $this->user->rules = $userHistory->rules;
            $buildHistoryPath = new BuildPath($this->user, $firstSearch, $this->user->rules);
            $newPath =  $buildHistoryPath->newPath(($this->rules)[$userHistory->rules]);
            $historyPath = "(" . $newPath . " AND created_at <  '" . $userHistory->created_at ."')";
            $historiesPath = $historiesPath . ' OR ' . $historyPath;
        }
        return $historiesPath;
    }

    public function createPost()
    {
        $tribes = $leaderships = $typeUserBefore =[];
        if($this->type != "Grade") {
            return $this->getLevelNames();
        }
        return array($tribes , $leaderships , $typeUserBefore);
    }


    public function getLevelNames()
    {
        $level = $this->user->rules;
        $tribes = $leaderships = $typeUserBefore = $tempArray =[];
        $typeRule = $this->type;
        $typeId = $this->user->$typeRule->first()->id;
        $typeLevelBefore = ($this->rules)[$this->user->rules + 1];
        $column = lcfirst($this->type . '_id');
        $rulesFactory = new RulesFactory;
        $typeLevelBeforeModel = $rulesFactory->createRule($typeLevelBefore);
        $typeUserBefore =  $typeLevelBeforeModel->where($column, $typeId)->get();
        if($typeUserBefore->count() >0)
            foreach( $typeUserBefore as $temp){
                array_push($tempArray, ['id' => $temp->id, 'name' => $temp->name]);
            }
        $names[1] = $tempArray;
        if($this->user->rules < 3){
            $levelIdCount = 3;
            while ($levelIdCount > $this->user->rules){
                $names[$levelIdCount] = buildLevelArray($typeUserBefore, $level );
                $level = $level + 1;
                $typeUserBefore = $names[$levelIdCount];
                $levelIdCount --;
            }
            if($levelIdCount == 1){
                $leaderships = $names[1];
                $typeUserBefore = $names[2];
                $tribes = $names[3];
            }
            else{
                $tribes = $names[1];
                $typeUserBefore = $names[3];
            }
        }

        $collectionLevels = array($typeUserBefore,  $tribes,  $leaderships);
        return $collectionLevels;

    }

    public function storePost(){

        $rule = $this->user->rules;
        $buildStorePath = new BuildStorePath($this->user, $_POST);
        $path = $buildStorePath->{'buildStore' . ($this->rules)[$rule] . 'Path'}();
        return $this->postRepo->storePost($path);

    }

    public function editPost($id){

        $post = $this->postRepo->editPost($id);
        return $post;
    }

    public function updatePost($id){

        $this->postRepo->updatePost($id);

    }


}