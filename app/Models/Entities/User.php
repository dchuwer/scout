<?php

namespace App\Models\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Leadership;
use App\Grade;
use App\Tribe;
use App\Moviment;
use App\History;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rules'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function grade() {

        return $this->belongsToMany(Grade::class);
    }

    public function tribe() {

        return $this->belongsToMany(Tribe::class);
    }

    public function leadership() {

        return $this->belongsToMany(Leadership::class);
    }

    public function moviment() {

        return $this->belongsToMany(Moviment::class);
    }

    public function history() {

        return $this->belongsToMany(History::class);
    }
}
