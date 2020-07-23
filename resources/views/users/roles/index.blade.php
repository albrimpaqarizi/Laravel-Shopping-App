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
        <div class="d-flex justify-content-between">
            <h3 class="display-4 d-inline">Roles</h3>
            <a style="margin: 19px;" href="{{ route('roles.create')}}" class="btn btn-success">New role</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Role Name</td>
                    <td>Creeated at</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->role_name}}</td>
                    <td>{{$role->created_at}}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('roles.edit',$role->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('roles.destroy', $role->id)}}" method="post">
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