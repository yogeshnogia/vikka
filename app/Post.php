<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = ['company', 'model', 'address', 'city', 'country', 'postal', 'body'];

	public function comments() {

		return $this->hasMany(Comment::class);

	}

}
