<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

	public function __construct() {
		$this->middleware('auth');//->except(['dashboard']);
	}


    public function dashboard() {

    	return view('user.dashboard');

    }

    public function create() {

    	return view('user.post.create');

    }

    public function store() {

    	
    	
    }

    public function listings() {
        $i = 1;

        $listings = \DB::table('posts')->latest()->get();

        return view('user.post.listings', compact(['listings', 'i']));
        //return $listings;

    }


    public function listing($id) {

        $listing = \DB::table('posts')->find($id);
        //dd($id);
        return view('user.post.unique', compact('listing'));

    }


}







