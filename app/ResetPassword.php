<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ResetPassword extends Model
{

	public $timestamps = false;

	protected $table = 'password_resets';

	protected $fillable = ['email', 'token', 'created_at'];

}
