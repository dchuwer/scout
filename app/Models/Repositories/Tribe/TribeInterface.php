<?php

namespace App\Models\Repositories\Tribe;

use App\Models\Entities\Post;
use Illuminate\Support\Collection;

interface TribeInterface
{


    public function getGradeNames($id): Collection;

    public function getGradeNamesFromLeadership($id);
}