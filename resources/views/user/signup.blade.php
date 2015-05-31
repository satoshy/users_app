@extends('layouts.master')

@section('content')
<div class="col-md-4 col-md-offset-4">
	<br>
	<br>
	<br>
	<form id="signup" name="signup" method="post" action="" role="form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <div class="form-group">
		    <label for="username">Username:</label>
		    <input id="username" type="text" name="username" placeholder="Username"value="" class="form-control" >
	    </div>
	    <div class="form-group">
		    <label for="city">City:</label>
		     <input id="city" type="text" name="city" placeholder="City"value="" class="form-control" >
	    </div>
		<div class="form-group">
		    <label for="email">Email address:</label>
		     <input id="email" type="text" name="email" placeholder="Email"value="" class="form-control" >
	    </div>
	    <div class="form-group">
	    	<label for="password">Password:</label>
	    	 <input id="password" type="password" name="password" placeholder="Password" value="" class="form-control" >
	    </div>
	    <div class="form-group">
	    	<label for="password_confirmation">Password confirmation:</label>
	    	 <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Password confirm"value="" class="form-control" >
	    </div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
<!-- js asset/js -->
<script src="asset/js/signup.js"></script>
<script src="asset/js/jquery.tokeninput.js"></script>
<script src="asset/js/city_find.js"></script>
<!-- end -->
@stop