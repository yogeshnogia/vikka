@include ('guest.partials.header')

	@yield('content')
	
	<div class="container">
		<div class="col-sm-12">
			@include('guest.partials.errors')
		</div>
	</div>
@include('guest.partials.footerLayout')
@include('guest.partials.footer')