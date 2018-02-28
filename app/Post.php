<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = ['user_id', 'company', 'model', 'address', 'city', 'country', 'postal', 'body'];

	public function comments() {

		return $this->hasMany(Comment::class);

	}
	

	public function user() {		//$post->user->name

		return $this->belongsTo(User::class);

	}


	public function addComment($body) {

		Comment::create([
			'user_id' => auth()->id(),
			'post_id' => $this->id,
			'body' => $body
			
		]);

		//with Eloquent we can do this
		// $this->comments()->create(compact('body'));
		// we can do this because we have a relation with comment model with help of above comments function

	}

}
