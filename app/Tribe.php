<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tribe extends Model
{
//    public function grade() {
//
//        return $this->belongsToMany(Grade::class);
//    }
//
//    public function leadership() {
//
//        return $this->belongsToMany(Leadership::class);
//    }

    public function user() {

        return $this->belongsToMany(User::class);
    }
}
