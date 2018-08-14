<?php

namespace App\Models\Repositories\UserHistory;


use Illuminate\Support\Collection;

interface UserHistoryInterface
{
    public function getUserHistories($userId): Collection;


}