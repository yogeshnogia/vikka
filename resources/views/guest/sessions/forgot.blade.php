@extends('guest.partials.layout')

@section('content')

	<div class="container">
		{{-- <h1>Enter your email id</h1> --}}
		<form method="POST" action="/password/reset">
  				{{ csrf_field() }} 
			    <div class="form-group row">
			      <label for="email" class="col-sm-2 col-form-label">Enter your email id here</label>
			      <div class="col-sm-10">
			        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
			      </div>
			    </div>
			    <div class="form-group row">
			      <div class="offset-sm-2 col-sm-10">
			        <button type="submit" class="btn btn-primary" id="register">Reset Password</button>
			      </div>
			    </div>
		  </form>
	</div>

@endsection