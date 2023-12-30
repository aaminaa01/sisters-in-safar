<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserAuthController extends Controller
{
    //
    function login(Request $request){
        return view('login');
    }

    public function authenticate(Request $request){
        // $data = $request->input();
        $formFields = $request->validate([
            'email' =>['required', 'email'],
            'password' => 'required',
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in.');
        }
        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    function signup(Request $request){
        return view('signup');
    }

    public function create(Request $request){
        $formFields = $request->validate([
            'name' =>'required',
            'email' =>['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        $user->remember_token = Str::random(10);  // Generate a random remember_token
        // auth()->login($user);
        return redirect('/login');
    }

}
