@extends('layouts.app')

@section('content')

<div class="container">
    <div class="search" style="width:100%; margin:20px;">
        <form action="{{route('search')}}" method="GET" enctype="multipart/form-data">
            @csrf
            <input type="text" name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <div class="row justify-content-center" >
        
        <div class="col-md-8">

            @foreach ($products as $product)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}: ${{ $product->price }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="{{ route('shop.show', $product->id) }}" class="btn btn-primary">Details</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection