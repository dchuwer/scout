<?php

namespace App\Models\Services\Leadership;

use Illuminate\Support\Facades\Facade;

class LeadershipFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'leadershipService'; }
}