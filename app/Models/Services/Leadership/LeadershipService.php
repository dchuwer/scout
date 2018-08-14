<?php

namespace App\Models\Services\Leadership;

use App\Factories\RulesFactory;

use App\Models\Repositories\Leadership\LeadershipInterface;

use App\Classes\BuildNamesArray;

class LeadershipService
{

    public $rules = [
        1 => "Moviment",
        2 => "Leadership",
        3 => "Tribe",
        4 => "Grade",
        5 => "Parents"
    ];

    protected $leadershipRepo;

    public function __construct(LeadershipInterface $leadershipRepo)
    {
        $this->leadershipRepo = $leadershipRepo;
        $this->user = \Auth::user();
        $this->type = $this->rules[$this->user->rules];
    }



    public function getTribeNames()
    {
        $tribeArray = [];

        $leadershipId =  $this->leadershipRepo->getLeadershipId($this->user)[0]->id;
        //dd($leadershipId);
        $tribNames =  $this->leadershipRepo->getTribeNames($leadershipId);
        if($tribNames->count() >0)
            foreach( $tribNames as $tribName){
                array_push($tribeArray, ['id' => $tribName->id, 'name' => $tribName->name]);
            }
        dd($tribeArray);
        return $tribeArray;
    }


}