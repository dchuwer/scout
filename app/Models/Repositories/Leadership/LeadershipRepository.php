<?php

namespace App\Models\Repositories\Leadership;

use App\Models\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Tribe;

class LeadershipRepository implements LeadershipInterface
{

    protected $leadershipModel;


    public function __construct(Model $leadership)
    {
        $this->leadershipModel = $leadership;

    }


    public function getTribeNames($id): Collection
    {

       return Tribe::where('leadership_id',$id)->get();
    }

    public function getLeadershipId($user)
    {
        //dd($user->id);
        return $user->Leadership;
    }
}