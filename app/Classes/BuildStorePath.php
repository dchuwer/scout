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

class BuildStorePath
{

    public $tribe  = " ";

    public function __construct($user, $post)
    {
        $this->user = $user;
        $this->post = $post;

    }

    public function buildStoreGradePath()
    {
        $type = "Grade";
        $grid = $this->user->$type->first()->id;
        $tribe = $this->user->$type->first()->tribe_id;
        $leadid = Tribe::find($tribe)->first()->leadership_id;
        $movimentid = Leadership::find($tribe)->first()->moviment_id;
        $path = '{"Grade": [' . $grid . '],"Tribe": [' . $tribe . '], 
                "Leadership": [' . $leadid . '], "Moviment": [' . $movimentid . '] }';
        return $path;
    }


    public function buildStoreTribePath(){
        $type = "Tribe";
        $grade = '';
        $tribe = $this->user->$type->first()->id;
        $leadid = Tribe::find(1)->where('id', $tribe)->first()->leadership_id;
        $movimentid = Leadership::find($tribe)->first()->moviment_id;
        if(request("grade_id")>0){
            $grade = implode(",",request("grade_id"));
        }
        if(request('allTree')=="Y"){
            $tribe = '"'.$tribe.'A"';
        }
        $path = '{"Grade": [' . $grade . '],
                    "Tribe": [' . $tribe . '], "Leadership": [' . $leadid . '],
                    "Moviment": [' . $movimentid . ']}';

        return $path;

    }

    public function buildStoreLeadershipPath(){

        $type = "Leadership";

        $tribe = $grade = $leadeid = $tribeForGrade = $leadidForGrade = ' ';
        $leadid = $this->user->$type->first()->id;
        $movimentid = Leadership::find($leadid)->first()->moviment_id;
        if(request("tribe_id") > 0){
            $tribe = implode(",",request("tribe_id"));
            $leadid = $this->getIds("Tribe",request("tribe_id"), "leadership_id");
            $movimentid = $this->getIds("Leadership",$leadid, "moviment_id");
        }
        else{
            $tribe = Grade::find(request("grade_id")[0])->tribe_id;
            //dd($tribe);
        }


        if(request("grade_id") > 0){

            $grade = implode(",",request("grade_id"));
            $tribeForGrade = $this->getIds("Grade",request("grade_id"), "tribe_id");
            $leadid = $this->getIds("Tribe",$tribeForGrade, "leadership_id");

            $movimentid = $this->getIds("Leadership",$leadid, "moviment_id");
            $tribeForGrade = implode(",",$tribeForGrade);
        }
        if(request('allTree')=="Y"){
            $leadid = '"'.$leadid.'A"';
        }

        $path = '{"Grade": [' . $grade . '],
                    "Tribe": [' . $tribe . ',' . $tribeForGrade .'],
                    "Leadership" : [' . implode(",",$leadid) . '],
                    "Moviment": [' . implode(",",$movimentid) . ']}';


        return $path;
    }

    public function buildStoreMovimentPath()
    {
        $type = "Moviment";
        $tribe = $grade = $leadeid = $tribeForGrade = $leadidForGrade = ' ';
        $movimentid = $this->user->$type->first()->id;

        if(request("grade_id") > 0){

            $grade = implode(",",request("grade_id"));
            $tribeForGrade = $this->getIds("Grade",request("grade_id"), "tribe_id");
            $leadid = $this->getIds("Tribe",$tribeForGrade, "leadership_id");

            $movimentid = $this->getIds("Leadership",$leadid, "moviment_id");
            $tribeForGrade = implode(",",$tribeForGrade);
        }
        if(request("leadership_id") > 0) {

            $leadid = implode(",", request("leadership_id"));
            //dd($leadid);
        }

        if(request("tribe_id") > 0){
            $tribe = implode(",",request("tribe_id"));
            $leadid = $this->getIds("Tribe",request("tribe_id"), "leadership_id");
            $movimentid = $this->getIds("Leadership",$leadid, "moviment_id");
        }
        else{
            $tribe = Grade::find(request("grade_id")[0])->tribe_id;
        }

        if(request('allTree')=="Y"){
            $movimentid = '"'.$movimentid.'A"';
        }

        $path = '{"Grade": [' . $grade . '],
                    "Tribe": [' . $tribe . ',' . $tribeForGrade .'],
                    "Leadership" : [' . $leadid . '],
                    "Moviment": [' . implode(",",$movimentid) . ']}';
        return $path;
    }

    public $parentColumnNames = [
        'leadership' => 'moviment_id',
        'tribe' => 'leadership_id',
        'grade' => 'tribe_id',
    ];


    public function getIds($type, $ids){
        $tempArray = [];
        $parentColumnName = $this->parentColumnNames[strtolower($type)];

        foreach($ids as $id){
            $upperLevels = call_user_func(array("\App\\" .$type ,'all'))->where('id', $id);
            $upperLevelsFound = sizeof($upperLevels)>0;
            if($upperLevelsFound)
                foreach($upperLevels as $upperLevel){
                    array_push($tempArray,  $upperLevel->{$parentColumnName});
                }

        }

        return $tempArray;

    }

}