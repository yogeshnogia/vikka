<?php

namespace App\Http\Controllers;

use App\User;	// we are using User model for query,migration & all the methods associated with User model

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    
	public function create() {
		return view('guest.registration.create');
	}

	public function store(){
		//1. Validate the form
		$this->validate(request(), [

			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed'

		]);


		//2. Create and save the user
		$user = User::create([
			'name' => request('name'),
			'email' => request('email'),
			'password' => bcrypt(request('password'))
		]);


		//3. Sign them in
		// \Auth::login();
		auth()->login($user);


		//4. Redirect
		return redirect()->home();
	}

}
