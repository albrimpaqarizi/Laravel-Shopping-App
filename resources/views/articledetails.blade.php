@extends('layouts.app')

@section('content')
<style>
    .product-box {
      width: 800px;
      height: 400px;
      margin: 50px auto;
      box-sizing: border-box;
      padding: 1.5em;
      background-color: #fff;
      border-radius: 7px;
      display: flex;
      justify-content: space-around;
      align-items: center;
    }
    img {
      width: 300px;
    }
    .product-info {
      width: 400px;
    }
    .product-title {
      font-weight: normal;
    }
    .product-price {
      font-size: 2em;
      font-weight: bolder;
    }
    .product-box button {
      width: 300px;
      margin: .3em 0;
    }
    #submit {
      width: 200px;
      height: 50px;
      font-size: 100%;
      margin-left: 20px;
      color:white;
      background-color:#2EA169;
      font-weight: bold;
    }
  </style>
    <div class="product-box">
        <div class="product-image">
            <img src="{{ url('/'.$product->image) }}" alt="">
        </div>
        <div class="product-info">
            <h2 class="product-title">{{ $product->title }}</h2>
            <span class="product-price">€ {{ $product->price }}</span>
            <div>
                <button class="btn btn-success">
                    Buy Now
                </button>
            </div>
            <div>
                <button class="btn btn-primary">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>   
@endsection