@extends('layouts.master')

@section('title', 'Page Title')

@section('content')

    @if ($users->count())
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Last name</th>
                    <th>First name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>City</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->username }}</td>
                		<td>{{ $user->email }}</td>
                		<td>{{ $user->city }}</td>
                    </tr>
                @endforeach
                  
            </tbody>
          
        </table>
    @else
        There are no users
    @endif

@stop