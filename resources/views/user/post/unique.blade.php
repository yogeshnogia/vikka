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
							  <div class="">
							  	<br>
							  	<h4>Comments</h4>
							  	<ul class="list-group">
							  		@foreach($listing->comments as $comment)
							  			<li class="list-group-item"><b><span> {{ $comment->created_at->toDayDateTimeString() }} </span></b> &nbsp;{{ $comment->body }} </li>
							  		@endforeach
							  	</ul>
							  </div>

							  <div class="">
							  	<br>
							  	<h4>Submit a comment</h4>
							  	<form method="POST" action="/posts/listings/{{$listing->id}}/comments">
                                   {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group label-floating">
                                                    <label class="control-label"> Post a comment</label>
                                                    <textarea class="form-control" rows="5" name="body"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-left">Submit</button>
                                </form>
                                @include('guest/partials/errors')
							  </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@endsection