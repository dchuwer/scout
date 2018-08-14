<?php

namespace App\Classes;

use App\Grade;
use App\Parents;
use App\Tribe;
use App\Leadership;
use App\User;

class BuildPath
{
    public function __construct($user, $firstSearch, $rule_id)
    {
        $this->user = $user;
        $this->firstSearch = $firstSearch;
        $this->rule_id = $rule_id;
    }

    public function newPath($type)
    {
        return $this->{'build' . $type . 'Path'}();
    }

    public function buildGradePath()
    {
        $type = "Grade";
        //dd($type);
        if ($this->user->rules == 5) {

            $child = Parents::where('parent_id', $this->user->id)->first();
            $this->user = User::find($child->user_id);

        }
        if ($this->firstSearch) {

            $grid = $this->user->$type->first();
            if ($grid)
                $grid = $grid->id;
            else
                return;

            $tribe = $this->user->$type->first();
            if ($tribe)
                $tribe = $tribe->id;
            else
                return;

        } else {
            $grade = Grade::find($this->rule_id);
            //dd($grade->id);
            $grid = $grade->id;
            $tribe = $grade->tribe_id;
        }

        $jsonContent = "JSON_CONTAINS(path->'$.Grade', '[$grid]') OR
                                   JSON_CONTAINS(path->'$.Tribe', '[" . $tribe . "]')";
        $leadid = Tribe::find($tribe)->leadership_id;
        $leaderid = "JSON_CONTAINS(path->'$.Leadership', '[" . '"' . $leadid . 'A"' . "]')";
        $movimentid = Leadership::find($leadid)->moviment_id;

        $path = "json_contains(path->'$.Moviment', '[" . $movimentid . "]') OR
                 $leaderid OR
                 $jsonContent";

        return $path;
    }


    public function buildTribePath(){
        $type = "Tribe";
        if($this->firstSearch) {
            $tribid = $this->user->$type->first();
            if($tribid)
                $tribid= $tribid->id;
            else
                return;

        }
        else {
            $tribid = $this->rule_id;
        }

        $jsonContent = "JSON_CONTAINS(path->'$.Tribe', '[$tribid]') 
                        OR JSON_CONTAINS(path->'$.Tribe', '[" . '"' . $tribid . 'A"' . "]')";
        $leadid = Tribe::find($tribid)->leadership_id;
        $leaderid = "JSON_CONTAINS(path->'$.Leadership', '[" . '"' . $leadid . 'A"' . "]')";
        $movimentid = optional(Leadership::find($leadid)->moviment_id);

        $path = "json_contains(path->'$.Moviment', '[" . $movimentid . "]') OR
                 $leaderid OR
                 $jsonContent";
       // dd($path);
        return $path;

    }

    public function buildLeadershipPath(){
        $type = "Leadership";


        $leadid = $this->rule_id;

        if($this->firstSearch) {
            $leadid = $this->user->leadership->first();

            if(!$leadid)
                return;

            $leadid = $leadid->id;
        }


        $leaderid = "JSON_CONTAINS(path->'$." . $type . "', '["  . $leadid .   "]') ";
        $jsonContent = "JSON_CONTAINS(path->'$." . $type . "', '[" . '"' . $leadid . 'A"' . "]')";
        //dd($leadid, $jsonContent);
        $movimentid = $this->user->moviment->first()->id;

        $path = "json_contains(path->'$.Moviment', '[" . $movimentid . "]') OR
                 $leaderid OR
                 $jsonContent";
        //dd($path);
        return $path;
    }

    public function buildMovimentPath(){
        $movimentid = $this->rule_id;
        $path = "json_contains(path->'$.Moviment', '[" . $movimentid . "]')";
        return $path;
    }
}