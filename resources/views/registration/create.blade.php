@extends('layout')

@section('content')

	<div class="container">
  		
  		<div class="col-sm-8">
  			<h2>Register</h2>
  			<form method="POST" action="/register">
  				{{ csrf_field() }} 

  				<div class="form-group row">
			      <label for="name" class="col-sm-2 col-form-label">Name</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="email" class="col-sm-2 col-form-label">Email</label>
			      <div class="col-sm-10">
			        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="password" class="col-sm-2 col-form-label">Password</label>
			      <div class="col-sm-10">
			        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="password_confirmation" class="col-sm-2 col-form-label">Password</label>
			      <div class="col-sm-10">
			        <input type="password" class="form-control" id="password_confirmation" placeholder="Password_confirmation" name="password_confirmation">
			      </div>
			      {{-- If you want to match two things, use this coonvention, thing_confirmation and in controller validate through confirmed(just like here use used this for password--}}
			    </div>
			    <div class="form-group row">
			      <div class="offset-sm-2 col-sm-10">
			        <button type="submit" class="btn btn-primary" id="register">Register</button>
			      </div>
			    </div>
		  </form>
  		</div>


	</div>

	@include('parts.errors')

@endsection