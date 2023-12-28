<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //
    function login(Request $request){
        $data = $request->input();
        echo $data['email'];
        $request->session()->put('user', $data['email']);
    }
}
