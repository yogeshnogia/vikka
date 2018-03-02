<?php

namespace App\Http\Controllers;

use App\User;	// we are using User model for query,migration & all the methods associated with User model
use App\Mail\Register;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerificationEmail;
use Illuminate\Http\Request;
use Exception;

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


		try {
			$user = User::create(array(
				'name' => request('name'),
				'email' => request('email'),
				'password' => bcrypt(request('password')),
				'email_token' =>base64_encode(request('email'))
			));

		} catch (Exception $exception){
			    $errorCode = $exception->errorInfo[1];
			    if($errorCode == 1062){
			        // houston, we have a duplicate entry problem
			        return back()->withErrors([

		    			'message' => 'This email already exists'

		    		]);
			    }
			}


		dispatch(new SendVerificationEmail($user));
		return view('guest.registration.verification');


		// Ye jo Jeffery ne bataya 
		//2. Create and save the user
		//3. Sign them in
		// \Auth::login();
		//auth()->login($user);
		//\Mail::to($user)->send(new Register($user));
		//4. Redirect
		//return redirect()->home();
	}


	public function verify($token) {
		$user = User::where('email_token',$token)->first();
		$user->verified = 1;
		if($user->save()){
		return view('guest.registration.emailconfirm',['user'=>$user]);
		}
	}

}
