<?php
/**
 * Created by PhpStorm.
 * User: compie
 * Date: 08/08/18
 * Time: 17:06
 */


namespace App\Classes;
use App\Grade;
use App\Tribe;
use App\Leadership;

class BuildNameArrays
{

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function gradeNames()
    {

        $typeId = optional($this->user->Grade->first()->id);
        $typeLevelBefore = "Grade";
        $column = lcfirst($type . '_id');


        return call_user_func(array("\App\\" .$typeLevelBefore ,'all'))->where($column, $typeId);

    }


    public function tribeNames(){


    }


    public function leadershipNames() {


    }

    public function buildLeadership($typeUserBefore,$levelUser){
        $levelNames = [];
        foreach ($typeUserBefore as $typeUser) {
            $column = lcfirst((($this->rules)[$levelUser + 1]) . '_id');
            $typeLevel =  call_user_func(array("\App\\" .($this->rules)[$levelUser + 2] ,'all'))->where($column, $typeUser->id);

            if(sizeof($typeLevel)>0)
                foreach( $typeLevel as $level){
                    array_push($levelNames, ['id' => $level->id, 'name' => $level->name]);
                }
        }
        return $levelNames;

    }


    public function buildGrade($typeUserBefore,$levelUser){
        $levelNames = [];
        foreach ($typeUserBefore as $typeUser) {
            $column = lcfirst((($this->rules)[$levelUser + 1]) . '_id');
            //dd($levelBefore);
            $typeLevel =  call_user_func(array("\App\\" .($this->rules)[$levelUser + 2] ,'all'))->where($column, $typeUser->id);
            if(sizeof($typeLevel)>0)
               foreach( $typeLevel as $level){
                    array_push($levelNames, ['id' => $level->id, 'name' => $level->name]);
               }
        }
        return $levelNames;

    }
}