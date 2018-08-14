<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\StorePost;
use App\Leadership;
use App\Moviment;
use App\Tribe;
use Illuminate\Http\Request;
use App\Models\Entities\User;

class RegistrationController extends Controller
{
    public function create() {

        $moviments = Moviment::all();
        $leaderships = Leadership::all();
        $tribes = Tribe::all();
        $grades = Grade::all();


        return view('registration.create', compact('moviments','leaderships', 'grades', 'tribes'));

    }

    public function store(StorePost $req) {

//        $this->validate(request(), [
//            'name' => 'required',
//            'email' => 'required|email',
//            'password' => 'required|confirmed'
//        ]);

        //request('password') => bcrypt(request('password'));

        //dd(request('password'));

        //$user = User::create(request(['name','email','password']));
        $rules = strtok(request('type'), ',');
        $ruleId = strtok( '' );
        //dd($rules, $ruleId);

        switch ($rules){
            case 'grade';
              $rulesId = 4;
              break;
            case 'tribe';
                $rulesId = 3;
                break;
            case 'leadership';
                $rulesId = 2;
                break;
            case 'moviment';
                $rulesId = 1;
                break;
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'rules' => $rulesId

        ]);

        $user->$rules()->attach($ruleId);

        auth()->login($user);

        return redirect()->home();
    }
}
