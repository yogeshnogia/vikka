<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

	public function __construct() {

		$this->middleware('guest')->except(['destroy']);

	}


    public function create(){
    	return view('guest.sessions.login');
    }

    public function store() {

    	//1. Attempt to authenticate the user
    	if(! auth()->attempt([
            'email' => request('email'), 
            'password' => request('password'),
            'verified' => 1
        ])) {

    		return back()->withErrors([

    			'message' => 'Please check your email id and password'

    		]);

    	} // applying the reverse logic that if not valid, go back and if valid come to the next line

    	//2. if so, sign them in and redirect to dashboard or home
    	return redirect()->home();

    	//3. if not, redirect them back

    }


    public function destroy() {
    	auth()->logout();

    	return redirect()->home();
    }
}
