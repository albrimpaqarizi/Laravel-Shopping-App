@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Auth::check())
                    {{ __('You are logged in!') }}
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
    <h3>Welcome to Laravel E-Commerce</h3>
    <img src="storage/images/wallpaper.png" alt="img" style="width:100%; height:auto;">
    <a href="/" style="display:flex; justify-content:center;"><button class="btn btn-primary" style="width:50%; ">Shop Now</button></a>
</div>
@endsection