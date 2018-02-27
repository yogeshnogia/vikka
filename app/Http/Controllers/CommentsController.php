<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    
	public function store(Post $id) {

		// Comment::create([
		// 	'body' => request('body'),
		// 	'post_id' => $id
		// ]);

		$this->validate(request(), [

			'body' => 'required|min:5'

		]);

		$id->addComment(request('body'));

		return back();
	}

}
