<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = [];

    public function moviment() {

        return $this->belongsToMany(Moviment::class);
    }

    public function leadership() {

        return $this->belongsToMany(Leadership::class);
    }

    public function tribe() {

        return $this->belongsToMany(Tribe::class);
    }

    public function grade() {

        return $this->belongsToMany(Grade::class);
    }
}

