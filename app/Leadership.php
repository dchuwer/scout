<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{

    protected $fillable = [
        'name',
        'moviment_id'
    ];

//    public function tribe() {
//
//        return $this->belongsToMany(Tribe::class);
//    }
//
//    public function moviment() {
//
//        return $this->belongsToMany(Moviment::class);
//    }

    public function user() {

        return $this->belongsToMany(User::class);
    }
}
