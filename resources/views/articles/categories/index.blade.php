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
            <h3 class="display-4 d-inline">Categories</h3>
            <a style="margin: 19px;" href="{{ route('categories.create')}}" class="btn btn-success">New category</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Category Name</td>
                    <td>Created at</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id)}}" method="post">
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