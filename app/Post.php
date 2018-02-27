<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = ['company', 'model', 'address', 'city', 'country', 'postal', 'body'];

	public function comments() {

		return $this->hasMany(Comment::class);

	}

	public function addComment($body) {

		Comment::create([
			'body' => $body,
			'post_id' => $this->id
		]);

		//with Eloquent we can do this
		// $this->comments()->create(compact('body'));
		// we can do this because we have a relation with comment model with help of above comments function

	}

}
