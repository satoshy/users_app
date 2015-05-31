@extends('layouts.master')

@section('content')
<div class="">
    <br>
    <br>
    <br>
    @if ($users->count())
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>City</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->username }}</td>
                		<td>{{ $user->email }}</td>
                		<td>{{ $user->city }}</td>
                        <td><a href="/user/show">Show</a></td>
                        <td><a href="/user/update">Edit</a></td>
                        <td><a href="/user/delete">Delete</a></td>
                    </tr>
                @endforeach
                  
            </tbody>
          
        </table>
    @else
        There are no users
    @endif
</div>
@stop