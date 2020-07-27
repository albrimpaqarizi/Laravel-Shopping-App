@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit a Order') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('orders.update', $order->id) }}"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <h3>{{$order->address}}</h3>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <h3>{{$order->phone}}</h3>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Costumer') }}</label>

                            <div class="col-md-6">
                                <h3>{{$order->user->name}}</h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                <div class="col-md-6">
                                    <h3>{{$order->article->title}}</h3>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="status"
                                class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status"
                                    class="custom-select @error('status') is-invalid @enderror">
                                   
                                    <option value="new"
                                        {{ ( "new" == $order->status ? "selected":"") }}>
                                        new</option>
                                    <option value="delivered"
                                        {{ ( "delivered" == $order->status ? "selected":"") }}>
                                        delivered</option>
                                    <option value="shipped"
                                        {{ ( "shipped" == $order->status ? "selected":"") }}>
                                        shipped</option>
                                    <option value="pending"
                                        {{ ( "pending" == $order->status ? "selected":"") }}>
                                        pending</option>          
                                   
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection