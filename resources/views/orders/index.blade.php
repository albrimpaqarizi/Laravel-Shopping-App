@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <div class="col-sm-12 col-md-10 ">
        <div class="d-flex justify-content-between">
            <h3 class="display-4 d-inline">Orders</h3>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Address</td>
                    <td>Phone</td>
                    <td>User</td>
                    <td>Article</td>
                    <td>Status</td>
                    <td colspan=2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->article->title}}</td>
                    <td>{{$order->status}}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('orders.edit',$order->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('orders.destroy', $order->id)}}" method="post">
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