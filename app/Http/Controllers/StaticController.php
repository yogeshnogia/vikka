<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class StaticController extends Controller
{
    
    public function index() {

    	return view('guest/home');

    }

    public function time() {

    	$c = Carbon::now('Asia/Kolkata');
    	dd($c->toDayDateTimeString());

    }

}
