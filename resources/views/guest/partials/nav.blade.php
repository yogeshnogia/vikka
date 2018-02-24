<nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="/">Start Bootstrap</a>
        
        @if(Auth::check())
        	{{-- <a href="#" class="btn btn-primary">{{ Auth::user()->name }}</a> --}}
        	<div class="dropdown show user_nav_btn">
			  <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    {{ Auth::user()->name }}
			  </a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			    <a class="dropdown-item" href="/dashboard">Dashboard</a>
			    <a class="dropdown-item" href="/logout">Logout</a>
			  </div>
			</div>
        @else
        	<div>
        		<a class="btn btn-primary" href="/register">Register</a>
        		<a class="btn btn-outline-primary" href="/login">Sign in</a>
        	</div>
        @endif
      </div>
    </nav>