@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<div class="col-md-4 col-md-offset-4">
	<br>
	<br>
	<br>
	@if(isset($user))
        <div class="title">
            <h1>Edit user - {{ $user->username }}</h1>
        </div>
    @endif
    <div id="signup">
    	@if(isset($user))
            <form id="signup" name="signup" role="form" action="/user/update/{{$user->id}}" method="post">
        @else
            <form id="signup" name="signup" role="form" action="/auth/signup" method="post">
        @endif
			<input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
		    <div class="form-group">
			    <label for="username">Username:</label>
			    <input id="username" type="text" name="username" placeholder="Username" @if(isset($user)) value="{{$user->username}}" @endif class="form-control" autofocus >
			    <span id="responseUsername"></span>
		    </div>
			<div class="form-group">
			    <label for="email">Email address:</label>
			     <input id="email" type="text" name="email" placeholder="Email" @if(isset($user)) value="{{$user->email}}" @endif class="form-control" >
		    </div>
		    <div class="form-group">
			    <label for="city">City:</label>
			     <input id="city" type="text" name="city" placeholder="City" @if(isset($user)) value="{{$user->city}}" @endif class="form-control" >
		    </div>
		    <div class="form-group">
		    	<label for="password">Password:</label>
		    	 <input id="password" type="password" name="password" placeholder="Password" value="" class="form-control" >
		    </div>
		    <div class="form-group">
		    	<label for="password_confirmation">Password confirmation:</label>
		    	 <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Password confirm"value="" class="form-control" >
		    </div>
		    <div class="form-group">
	             <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
		</form>
	<div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="/assets/js/usersearch.js"></script>
@endsection