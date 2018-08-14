<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function user() {

        return $this->belongsToMany(User::class);
    }

//    public function tribe() {
//
//        return $this->belongsToMany(Tribe::class);
//    }


}
