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
                    <th>Username</th>
                    <th>Email</th>
                    <th>City</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                		<td>{{ $user->email }}</td>
                		<td>{{ $user->city }}</td>
                        <td><a class="btn btn-primary" href="/user/edit/{{$user->id}}">Edit</a>
                        <a class="btn btn-danger btn-delete" href="/user/delete/{{$user->id}}">Delete</a></td>
                    </tr>
                @endforeach
                  
            </tbody>
        </table>
        {!! $users->render() !!}
    @else
        There are no users
    @endif
</div>
@stop