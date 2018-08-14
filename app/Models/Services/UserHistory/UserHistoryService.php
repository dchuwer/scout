<?php

namespace App\Models\Services\UserHistory;

use App\Models\Repositories\UserHistory\UserHistoryInterface;
use Illuminate\Support\Collection;

class UserHistoryService
{
    protected $userHistoryRepo;

    public function __construct(UserHistoryInterface $userHistoryRepo)
    {
        $this->userHistoryRepo = $userHistoryRepo;
    }


    public function getUserHistories()
    {
        $user = \Auth::user();
        $userId =  ($user->id);
        return $this->userHistoryRepo->getUserHistories($userId);

    }



}