@extends('layout')

@section('content')

	<div class="container">
		<h1>Login</h1>
		<form method="POST" action="/login">
  				{{ csrf_field() }} 
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
			      <div class="offset-sm-2 col-sm-10">
			        <button type="submit" class="btn btn-primary" id="register">Login</button>
			      </div>
			    </div>
		  </form>
		  @include('parts/errors')
	</div>

@endsection