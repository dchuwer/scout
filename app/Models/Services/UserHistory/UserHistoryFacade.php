<?php

namespace App\Models\Services\UserHistory;

use Illuminate\Support\Facades\Facade;

class UserHistoryFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'userHistoryService'; }
}