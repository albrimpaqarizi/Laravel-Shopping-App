@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container">
    <h1 class="text-center">Contact Us</h1>
    @if(session()->has('message'))
    <h2>{{session('message')}}</h2>
    @endif
    @if( ! session()->has('message'))
    <div class="d-flex justify-content-center">
        <form action="/contact" method="POST" class="w-50">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                <div>{{ $errors->first('name') }}</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                <div>{{ $errors->first('email') }}</div>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10"
                    class="form-control">{{ old('message') }}</textarea>
                <div>{{ $errors->first('message') }}</div>
            </div>

            @csrf

            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</div>
@endif
@endsection