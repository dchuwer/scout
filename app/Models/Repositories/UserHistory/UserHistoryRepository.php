<?php

namespace App\Models\Repositories\UserHistory;

use App\Models\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserHistoryRepository implements UserHistoryInterface
{

    public function __construct(Model $userHistoryModel)
    {
        $this->userHistoryModel = $userHistoryModel;

    }


    public function getUserHistories($userId): Collection
    {
         $userHistories = $this->userHistoryModel->where('user_id',$userId)->get();

        return $userHistories;
    }



}