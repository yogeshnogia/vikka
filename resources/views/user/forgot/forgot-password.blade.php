@extends('guest.partials.layout')

@section('content')

	<div class="container">
  		
  		<div class="col-sm-8">
  			<h3>Forgot Password? Enter your email id here</h3>
  			<form method="POST" action="/password-reset">
  				{{ csrf_field() }} 
  				
			    <div class="form-group row">
			      <label for="email" class="col-sm-2 col-form-label">Email</label>
			      <div class="col-sm-10">
			        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
			      </div>
			    </div>

			    <div class="form-group row">
			      <div class="offset-sm-2 col-sm-10">
			        <button type="submit" class="btn btn-primary" id="register">Send Email Link</button>
			      </div>
			    </div>
		  </form>
  		</div>

	</div>


@endsection