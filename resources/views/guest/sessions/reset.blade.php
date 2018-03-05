@extends('guest.partials.layout')

@section('content')

	<div class="container">
		<br>
		<br>
			
			@if($x!==null)
				<h4> {{$x}} </h4>
			@else
				<h4>A reset password link has been sent to your email address, click on the link</h4>
			@endif
	</div>

@endsection