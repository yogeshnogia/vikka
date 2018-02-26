<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

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

        
        //dd(request()->all());
        //1. Save it to the database
        Post::create(request(['company', 'model', 'address', 'city', 'country', 'postal', 'body']));
        //here we used Post and created a new post using query builder


        //2. Redirect
        return redirect('/posts/listings');
    	
    	
    }

    public function listings() {
        $i = 1;

        //$listings = \DB::table('posts')->latest()->get();
        $listings = Post::latest()->get();
        

        return view('user.post.listings', compact(['listings', 'i']));
        //return $listings;

    }


    public function listing(Post $listing) {        // Post::find(wildcard for you)

        //$listing = Post::find($id);
        //$listing = \DB::table('posts')->find($id);
        //dd($id);
        return view('user.post.unique', compact('listing'));

    }


}







