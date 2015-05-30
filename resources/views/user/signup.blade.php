@extends('layouts.master')
@section('content')
	<form method="post" role="form">
		<input type="hidden" name="_token" value="'.csrf_token().'">
		<div class="form-group">
		    <label for="firstname">First name:</label>
		    <input type="text" class="form-control" id="firstname">
	    </div>
	    <div class="form-group">
		    <label for="lastname">Last name:</label>
		    <input type="text" class="form-control" id="lastname">
	    </div>
	    <div class="form-group">
		    <label for="username">Username:</label>
		    <input type="text" class="form-control" id="username">
	    </div>
	    <div class="form-group">
		    <label for="city">City:</label>
		    <input type="text" class="form-control" id="city">
	    </div>
		<div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" id="email">
	    </div>
	    <div class="form-group">
	    	<label for="pwd">Password:</label>
	    	<input type="password" class="form-control" id="pwd">
	    </div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
@stop