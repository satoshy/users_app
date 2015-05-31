@extends('layouts.master')
@section('content')
<div class="col-md-4 col-md-offset-4">
	<br>
	<br>
	<br>
	<form method="post" role="form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
		    <label for="account">Account:</label>
		    <input id="account" type="text" name="account" placeholder="Username or Email" value="" class="form-control" >
	    </div>
	    <div class="form-group">
	    	<label for="password">Password:</label>
	    	<input id="password" type="password" name="password" placeholder="Password" value="" class="form-control" >
	    </div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@stop