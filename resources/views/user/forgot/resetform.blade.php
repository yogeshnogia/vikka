@extends('guest.partials.layout')

@section('content')

	<div class="container">
  		
  		<div class="col-sm-10">
  			<br>
  			<h4>Set your new password here for <span style="color:#006ED3;">{{$email}} </h4>
  			<p> {{ request()->segment(count(request()->segments())) }} </p>
  			<br>

  			<form method="POST" action="/password-reset/{{$token}}">
  				{{ csrf_field() }} 
  				
			    <div class="form-group row">
			      <label for="email" class="col-sm-2 col-form-label">Password</label>
			      <div class="col-sm-10">
			        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
			      </div>
			    </div>

			    <div class="form-group row">
			      <label for="email" class="col-sm-2 col-form-label">Confirm Password</label>
			      <div class="col-sm-10">
			        <input type="password" class="form-control" id="password_confirmation" placeholder="Retype Password" name="password_confirmation">
			      </div>
			    </div>

			    <div class="form-group row">
			      <div class="offset-sm-2 col-sm-10">
			        <button type="submit" class="btn btn-primary" id="register">Reset Password</button>
			      </div>
			    </div>
		  </form>
  			
  		</div>

	</div>


@endsection