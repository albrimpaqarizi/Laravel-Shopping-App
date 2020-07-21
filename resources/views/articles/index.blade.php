@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <div class="col-sm-12 col-md-10 mx-auto">
        <h3 class="display-4">Articles</h3>
        <a style="margin: 19px;" href="{{ route('articles.create')}}" class="btn btn-primary">New article</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Category</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>In Stock</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td> <img style="width: 50%" src="{{asset('storage/' .$article->image )}}" class="img-responsive"
                            alt="{{$article->image}}">
                    </td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->category->category_name}}</td>
                    <td class=" w-50">{{$article->description}}</td>
                    <td>{{$article->price}}</td>
                    <td>{{$article->inStock}}</td>
                    <td>
                        <a href="{{ route('articles.edit',$article->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('articles.destroy', $article->id)}}" method="post">
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