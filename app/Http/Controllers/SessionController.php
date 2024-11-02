<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        // validate
        $attribures = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // attempt to log in the user
         if (! Auth::attempt($attribures)) {
             throw ValidationException::withMessages([
                 'email' => 'Credentials do not match'
             ]);
         };
        // regenerate the session token
        request()->session()->regenerate(); // security thing
        // redirect
       return redirect('/jobs');
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
