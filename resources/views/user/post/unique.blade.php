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
							        <th>Company</th>
							        <th>Model</th>
							        <th>Address</th>
							        <th>City</th>
							        <th>Country</th>
							        <th>Postal</th>
							        <th>Body</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <td> {{ $listing->company }} </td>
						        	<td> {{ $listing->model }} </td>
						        	<td> {{ $listing->address }} </td>
						        	<td> {{ $listing->city }} </td>
						        	<td> {{ $listing->country }} </td>
						        	<td> {{ $listing->postal }} </td>
						        	<td> {{ $listing->body }} </td>
							      </tr>
							    </tbody>
							  </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@endsection