@extends('user.partials.layout')

@section('content')

	<div class="content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="card">
	                    <div class="card-header" data-background-color="purple">
	                        <h4 class="title">Edit Profile</h4>
	                        <p class="category">Complete your profile</p>
	                    </div>
	                    <div class="card-content">
	                    	<table class="table table-bordered table-responsive">
							    <thead>
							      <tr>
							      	<th>S.No.</th>
							        <th>Company</th>
							        <th>Model</th>
							        <th>Address</th>
							        <th>City</th>
							        <th>Country</th>
							        <th>Postal</th>
							        <th>Body</th>
							        <th>Created At</th>
							      </tr>
							    </thead>
							    <tbody>
							    	@foreach($listings as $listing)
							      <tr>
							      	<td> {{ $i++ }} <a href="/posts/listings/{{$listing->id}}"> Link</a></td>
							        <td> {{ $listing->company }} </td>
						        	<td> {{ $listing->model }} </td>
						        	<td> {{ $listing->address }} </td>
						        	<td> {{ $listing->city }} </td>
						        	<td> {{ $listing->country }} </td>
						        	<td> {{ $listing->postal }} </td>
						        	<td> {{ $listing->body }} </td>
						        	<td> {{ $listing->created_at->toDayDateTimeString() }} </td>
						        	{{-- <td>{{ $listing->created_at->setTimezone(Auth::user()->timezone)->toDayDateTimeString() }}</td> --}}
							      </tr>
							      @endforeach
							    </tbody>
							  </table>
	                    </div>
	                </div>
	                @include('guest.partials.errors')
	            </div>
	        </div>
	    </div>
	</div>


@endsection