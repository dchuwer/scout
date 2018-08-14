<?php

namespace App\Models\Entities;

use App\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function comments() {

        return $this->hasMany(Comments::class);
    }


    public function user() {

        return $this->belongsTo(User::class);

    }

    public function addComment($body) {

        $this->comments()->create(compact('body'));

    }

    public function scopeFilter($query, $filters){

        if($filters != []) {

            if($filters['month']){
                $query-> whereMonth('created_at', Carbon::parse($filters['month'])->month);
            }

            if($year = $filters['year']){
                $query-> whereYear('created_at', $year);
            }


        }

    }

    public static function archives() {

        return static::selectraw('year(created_at) year, monthname(created_at) month, count(*) published')

            ->groupby('year', 'month') -> orderbyraw('min(created_at) desc') -> get() -> toArray();


    }

}
