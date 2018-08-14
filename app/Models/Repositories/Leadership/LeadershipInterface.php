<?php

namespace App\Models\Repositories\Leadership;

use App\Models\Entities\Post;
use Illuminate\Support\Collection;

interface LeadershipInterface
{


    public function getTribeNames($id): Collection;

    public function getLeadershipId($id);


}