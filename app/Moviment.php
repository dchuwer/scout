<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moviment extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user() {

        return $this->belongsToMany(User::class);
    }
}
