@extends('layouts.master')

@section('content')
	<div>
		<br>
		<br>
		<br>
		<h1>Welcome to the users_app!!!</h1>
		<button id="login" class="btn btn-primary">LOGIN</button>
		<button id="signup" class="btn btn-primary">Sign Up</button>
	</div>
	<script type="text/javascript">
	    document.getElementById("login").onclick = function () {
	        location.href = "user/login";
	    };
	    document.getElementById("signup").onclick = function () {
	        location.href = "user/signup";
	    };
	</script>

@stop