<?php

namespace App\Http\Controllers;

use App\Moviment;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{
    public function create() {

        $moviments = Moviment::all();

        return view('registration.create_leadership', compact('moviments'));
    }

    public function store() {
        dd(request(moviment_id));
        $this->validate(request(), [
            'name' => 'required',
            'moviment_id' => 'required'
        ]);


        Leadership::create(request(['name', 'moviment_id']));


    }
}
