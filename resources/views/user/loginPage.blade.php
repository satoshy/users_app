@extends('layouts.master')
@section('content')
<div class="col-md-4 col-md-offset-4">
	<br>
	<br>
	<br>
	
	<div id="login">
	<form method="post" action="/user/login" role="form">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
		    <label for="username">Username:</label>
		    <input id="username" type="text" name="username" placeholder="Username" value="" class="form-control" autofocus  minlength="6" required >
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
            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-link" >Forgot Your Password?</a>
        </div>
	</form>
	</div>
@endsection