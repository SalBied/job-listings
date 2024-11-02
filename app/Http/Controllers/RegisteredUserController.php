<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(){

        //validate
        // create the user
        //log in
        //redirect

        $attributes =  request()->validate([
            // validation
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'password' => ['required', Password::min(6)->max(25)->letters()->numbers(), 'confirmed']
        ]);
        //dd($attributes);

        $user = User::create($attributes);

        Auth::login($user);
        return redirect('/jobs');
    }
}
