@extends('layouts.app')

{{-- @section('extra-css')
    

<style>
    .my-input {
      padding: 10px;
      border: 1px solid #ccc;
    }
  </style>
@endsection   --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Order') }}</div>

                <div>{{$article->title}}</div>
                <div class="card-body">
                    <form method="POST" action="{{route('payment.store')}}" enctype="multipart/form-data" id='payment-form'>
                        @csrf

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" name="price" value="{{$article->price}}">
                        <input type="hidden" name="articleId" value="{{$article->id}}">

                        <h3>Payment info</h3>

                        <div class="form-group row">
                            <label for="cardname"
                                class="col-md-4 col-form-label text-md-right">{{ __('Name on Card') }}</label>

                            <div class="col-md-6">
                                <input id="cardname" type="text"
                                    class="form-control @error('cardname') is-invalid @enderror" name="cardname"
                                    value="{{ old('cardname') }}" required autocomplete="cardname">

                                @error('cardname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="card-element">Card</label>
                            <div id="card-element"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="pay">
                                    {{ __('Pay') }}
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
@section('scripts')
<script>
    
        
            // Create a Stripe client
            // var stripe = Stripe('pk_test_51H9JkGKkC2TlA1uN0oNodmKElCZXpAHzrfVVfqBd00yzGJRgM9oqQ6SbO1YZausi4Ug9ilNEwiC9J3y3ECEzLame00R1Hh2tik');
            var stripe = Stripe('pk_test_51H9JkGKkC2TlA1uN0oNodmKElCZXpAHzrfVVfqBd00yzGJRgM9oqQ6SbO1YZausi4Ug9ilNEwiC9J3y3ECEzLame00R1Hh2tik');
            // Create an instance of Elements
            
            var elements = stripe.elements();

            var card = elements.create('card');
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();
              // Disable the submit button to prevent repeated clicks
              document.getElementById('pay').disabled = true;

              stripe.createToken(card).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });

            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);
              // Submit the form
              form.submit();
            };
       
</script>
@endsection


