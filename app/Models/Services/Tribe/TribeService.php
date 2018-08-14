<?php

namespace App\Models\Services\Tribe;

use App\Factories\RulesFactory;
use App\Models\Repositories\Tribe\TribeInterface;

use App\Classes\BuildNamesArray;

class TribeService
{

    public $rules = [
        1 => "Moviment",
        2 => "Leadership",
        3 => "Tribe",
        4 => "Grade",
        5 => "Parents"
    ];

    protected $tribeRepo;

    public function __construct(TribeInterface $tribeRepo)
    {
        $this->tribeRepo = $tribeRepo;
        $this->user = \Auth::user();
        $this->type = $this->rules[$this->user->rules];
    }



    public function getGradeNames()
    {
        $tribeArray = [];
        $tribNames =  $this->tribeRepo->getTribeNames($this->user->id);
        if($tribNames->count() >0)
            foreach( $tribNames as $tribName){
                array_push($tribeArray, ['id' => $tribName->id, 'name' => $tribName->name]);
            }
        return $tribeArray;
    }

    public function getGradeNamesFromLeadership($tribes)
    {
        foreach($tribes as $tribe){
            $gradeNames =  $this->tribeRepo->getGradeNames($tribe->id);

            if($gradeNames->count() >0)
                foreach( $gradeNames as $gradeName){
                    array_push($gradeArray, ['id' => $gradeName->id, 'name' => $gradeName->name]);
                }
        }
        $tribNames =  $this->tribeRepo->getTribeNames($this->user->id);
        if($tribNames->count() >0)
            foreach( $tribNames as $tribName){
                array_push($tribeArray, ['id' => $tribName->id, 'name' => $tribName->name]);
            }
        return $tribeArray;
    }

}