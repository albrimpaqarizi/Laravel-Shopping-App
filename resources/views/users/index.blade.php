@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-sm-12 ">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <div class="col-sm-12 col-md-6 ">
        <h3 class="display-4">Users</h3>
        <a style="margin: 19px;" href="{{ route('users.create')}}" class="btn btn-primary">New user</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>User Name</td>
                    <td>Email</td>
                    <td>Role Name</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->role_name}}</td>
                    <td>
                        <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endsection