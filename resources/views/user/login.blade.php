@extends('layouts.master')
@section('content')
<div class="col-md-4 col-md-offset-4">
	<br>
	<br>
	<br>
	
	<div id="login">
	<form id="login" name="login" method="post" action="/auth/login"  role="form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
		    <label for="account">Account:</label>
		    <input id="account" type="text" name="account" placeholder="Username or Email" value="" class="form-control" autofocus  minlength="6" required >
	    </div>
	    <div class="form-group">
	    	<label for="password">Password:</label>
	    	<input id="password" type="password" name="password" placeholder="Password" value="" class="form-control" minlength="6" required >
	    </div>
	    <div class="form-group">
	    	<input type="checkbox" value="1" id="remember" name="remember">
	    	<label for="remember">Remember me</label>         
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-link" >Forgot Your Password?</a>
        </div>
	</form>
	</div>
@endsection