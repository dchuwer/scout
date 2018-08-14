<?php


use App\Factories\RulesFactory;

function buildLevelArray($typeUserBefore, $levelUser){
    $levelNames = [];

    $rules = [
        1 => "Moviment",
        2 => "Leadership",
        3 => "Tribe",
        4 => "Grade",
        5 => "Parents"
    ];

    foreach ($typeUserBefore as $typeUser) {
        if($levelUser == 2)
            $typeId = $typeUser['id'];
        else
            $typeId = $typeUser->id;
        $column = lcfirst((($rules)[$levelUser + 1]) . '_id');
        $typeLevelUp = ($rules)[$levelUser + 2];
        $rulesFactory = new RulesFactory;
        $typeLevelUpModel = $rulesFactory->createRule($typeLevelUp);
        $typeLevel =  $typeLevelUpModel->where($column, $typeId)->get();

        if(sizeof($typeLevel)>0)
            foreach( $typeLevel as $level){
                array_push($levelNames, ['id' => $level->id, 'name' => $level->name]);
            }
    }

    return $levelNames;

}

