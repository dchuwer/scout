<?php

namespace App\Http\Controllers;

use App\Moviment;
use Illuminate\Http\Request;

class MovimentController extends Controller
{

    public function create() {

        return view('registration.create_moviment');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
        ]);


        Moviment::create(request(['name']));


    }
}
