<?php

namespace App\Factories;

class RulesFactory
{
    public function createRule($rule)
    {
        $className = "App\\$rule";
        return new $className;
    }
}