@extends('layouts.master')

@section('content')
<div class="col-md-4 col-md-offset-4">
	<br>
	<br>
	<br>
    <div id="city">
            <form id="citycreate" name="citycreate" role="form" autocomplete="off" action="/city/create" method="post">
			<input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
		    <div class="form-group">
			    <label for="city">City:</label>
			    <input id="city" type="text" name="name" placeholder="City" value="" class="form-control" autofocus >
		    </div>
		    <div class="form-group">
	             <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
		</form>
	<div>
</div>
@endsection