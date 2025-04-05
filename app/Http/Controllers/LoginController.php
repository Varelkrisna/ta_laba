<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $login = $request->validate([
            'nama'=>'required|string',
            'password'=>'required|string',
        ]);
        if (Auth::attempt($login)){
            $request->session()->regenerate();
            return view('dashboard', ["title" => "dashboard"]);
        }
        else {
                return view('login');
        }

    }
}
