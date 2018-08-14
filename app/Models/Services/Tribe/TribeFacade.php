<?php

namespace App\Models\Services\Tribe;

use Illuminate\Support\Facades\Facade;

class TribeFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'tribeService'; }
}