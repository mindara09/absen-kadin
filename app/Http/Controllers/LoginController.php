<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
    	return view('login');
    }
    public function login_proses(Request $request)
    {
    	// Proses Login
    	if (Auth::attempt($request->only('username','password'))) {

    		return redirect('/dashboard');
    	}

    	return redirect('/');
    }
    public function logout(){
        $find = User::find(auth()->user()->id);
    	Auth::logout();
    	return redirect('/');
    }
}
