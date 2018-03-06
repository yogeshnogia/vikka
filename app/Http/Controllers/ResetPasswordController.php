<?php

namespace App\Http\Controllers;

use App\ResetPassword;
use DB;
use Log;
use Mail;
use Exception;
use App\User;
use App\Jobs\ResetPasswordJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class ResetPasswordController extends Controller
{

	public function forgotPassword() {
		return view('user.forgot.forgot-password');
	}


	public function resetPassword() {

		$e = User::where('email', '=', Input::get('email'))->exists();
		$user = new ResetPassword;

		if ($e) {

			$random_string = str_random(30);

			$user::create(array(
				'email' => request('email'),
				'token' => $random_string,
				'created_at' => Carbon::now()
			));

			$email_id = Input::get('email');

			
			// dispatch(new ResetPasswordJob($user));
			// return view('user.forgot.linksent');
			
			 // dd($random_string);
			// Basic Method
			Log::info("Request cycle without Queues started");
	        Mail::send('emails.resetpassword', ['data'=>$random_string], function ($message) {
	        		$message->from('yogeshnogia@gmail.com', 'Yogesh Nogia');
	        		$message->subject('Password Reset Link at Vikka Project');
	            	$message->to(Input::get('email'));
	        });
	        Log::info("Request cycle without Queues finished");
	        return view('user.forgot.linksent');

		}	

		else {
			return back()->withErrors([

		    			'message' => 'This email or username does not exists'

		    		]);
		}

			
	}

	public function resetPasswordTrue($token) {

		//dd($token);
		$token = request()->segment(count(request()->segments()));
		$user = ResetPassword::where('token', $token)->first();
		$email = $user->email;		
		return view('user.forgot.resetform', compact(['email', 'token']));

	}

	public function resetPasswordSubmit($token) {

		$this->validate(request(), [

			'password' => 'required|confirmed'

		]);


		$user = ResetPassword::where('token', $token)->exists();
		$one = ResetPassword::where('token', $token)->first();
		// dd($user);
		if($user) {

			$email = $one->email;

			// $update = User::find($email);
			// $update->password = request('password');
			// $update->save();

			\App\User::where('email', $email)->update(['password' => bcrypt(Input::get('password'))]);

		}
		
		// dd($token);
		return view('user.forgot.done', compact('request'));

		//$flight = App\Flight::where('token', 1)->first();


	}


}
