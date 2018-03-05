<?php

namespace App\Http\Controllers;

use App\User;	// we are using User model for query,migration & all the methods associated with User model
Use DB;
use App\Mail\Register;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerificationEmail;
use App\Jobs\ResetPasswordJob;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Input;
use Log;
use Mail;

class RegistrationController extends Controller
{
    
	public function create() {
		return view('guest.registration.create');
	}

	public function store(){
		//1. Validate the form
		$this->validate(request(), [

			'name' => 'required',
			'username' => 'required|min:1|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed'

		]);


		try {
			$user = User::create(array(
				'name' => request('name'),
				'username' => request('username'),
				'email' => request('email'),
				'password' => bcrypt(request('password')),
				'email_token' => str_random(30)
			));

		} catch (Exception $exception){
			    $errorCode = $exception->errorInfo[1];
			    if($errorCode == 1062){
			        // houston, we have a duplicate entry problem
			        return back()->withErrors([

		    			'message' => 'This email or username already exists'

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


	public function forgotPassword() {
		return view('user.forgot.forgot-password');
	}


	public function resetPassword() {

		if (User::where('email', '=', Input::get('email'))->exists()) {
		   
			$user = User::create(array(
				'email' => request('email'),
				'token' => str_random(30),
				'created_at' => now()
			));

			dispatch(new ResetPasswordJob($user));
			return view('user.forgot.linksent');
			 // dd($random_string);
			//Basic Method
			// Log::info("Request cycle without Queues started");
	  //       Mail::send('emails.reset', ['data'=>$random_string], function ($message) {

	  //           $message->from('me@gmail.com', 'Christian Nwmaba');

	  //           $message->to('chris@scotch.io');

	  //       });
	  //       Log::info("Request cycle without Queues finished");
	        //return view('user.forgot.linksent');

		}		
	}

	public function resetPasswordTrue($token) {

		return view('user.forgot.resetform');

	}



}
