<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

	public function __construct() {
		$this->middleware('auth');//->except(['dashboard']);
	}


    public function dashboard() {

    	return view('users.dashboard');

    }


}