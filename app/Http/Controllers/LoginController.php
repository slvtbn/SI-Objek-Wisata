<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
       if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return \redirect ('/home');
       }
        return redirect ('/')->with('message','Email atau Password Salah');
    }

    public function logout(Request $request) {
        Auth::logout();
        return \redirect('/');
    }
}
