<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $table = "posts";

    $fillable = ['company', 'model', 'address', 'city', 'country', 'postal', 'body'];
}
