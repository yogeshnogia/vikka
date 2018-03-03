@extends('guest.partials.layout')

@section('content')

	<div class="container">
  		<br>
  		<div class="col-sm-8">
  			<h2>Thank you, {{$user->name}} for verifying your email address. You can login now <a href="{{url('/login')}}">Click here to login </a></h2>
  			
  		</div>

	</div>

@endsection