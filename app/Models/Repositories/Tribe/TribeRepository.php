<?php

namespace App\Models\Repositories\Tribe;

use App\Models\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Grade;

class TribeRepository implements TribeInterface
{

    protected $tribeModel;


    public function __construct(Model $tribeModel)
    {
        $this->tribeModel = $tribeModel;
        $this->user = \Auth::user();


    }


    public function getGradeNames($id): Collection
    {

       return $this->tribeModel->where('tribe_id',$id);
    }

    public function getGradeNamesFromLeadership($id)
    {

        return Grade::where('tribe_id',$id);

    }
}