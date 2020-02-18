@extends('template.master')

@section('content')

<style>
    .form-row {
    width: 70%;
    float: left;
}
div {
    display: block;
}
*, label {
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 16px;
    font-variant: normal;
    padding: 0;
    margin: 0;
    -webkit-font-smoothing: antialiased;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.StripeElement {
  box-sizing: border-box;

  height: 40px;
    /* margin-top: 28px; */
  width: 100%;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
button {
    border: none;
    border-radius: 4px;
    outline: none;
    text-decoration: none;
    color: #fff;
    background: #32325d;
    white-space: nowrap;
    display: inline-block;
    height: 40px;
    line-height: 40px;
    padding: 0 14px;
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    border-radius: 4px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.025em;
    text-decoration: none;
    -webkit-transition: all 150ms ease;
    transition: all 150ms ease;
    float: left;
    margin-left: 12px;
    margin-top: 28px;
}
button:hover {
    transform: translateY(-1px);
    box-shadow: 0 7px 14px rgba(50, 50, 93, .10), 0 3px 6px rgba(0, 0, 0, .08);
    background-color: #43458b;
}
</style>
        		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--4" style="background-image: url({{url('template')}}/images/bg/apple.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Checkout</h2>
                            <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{url('/')}}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Checkout</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
                            <h3>Billing details</h3>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form action="{{url('stripe/post')}}" method="post" id="payment-form">


                                @csrf

                                <div class="customar__field">
                                    <div class="margin_between">
                                        <div class="input_box space_between">
                                            <label>First name <span>*</span></label>
                                            <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror" value="{{ old('fname') }}">
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="input_box space_between">
                                            <label>last name <span>*</span></label>
                                            <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror" value="{{ old('lname') }}">
                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input_box">
                                        <label>Company name </label>
                                        <input type="text" name="company" value="{{ old('company') }}">

                                    </div>
                                    <div class="input_box">
                                        <label>Country<span>*</span></label>

                                        <select class="select__option" name="country_id" id="country_id" >
                                            <option>Select a country…</option>
                                            @foreach ($country as $item)

                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="input_box">
                                        <label>State<span>*</span></label>
                                        <select class="select__option" name="state_id" id="state_id">
                                            <option value="">Select One</option>
                                        </select>
                                    </div>
                                    <div class="input_box">
                                        <label>City<span>*</span></label>
                                        <select class="select__option" name="city_id" id="city_id">
                                        </select>
                                    </div>
                                    <div class="input_box">
                                        <label>Address </label>
                                        <input type="text" value="{{ old('address') }}" name="address" placeholder="Street address">
                                    </div>
                                    <div class="input_box">
                                        <label>House No </label>
                                        <input type="text" value="{{ old('house_on') }}" name="house_on" placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                    {{-- </div> --}}

                                    <div class="input_box">
                                        <label>Postcode / ZIP <span>*</span></label>
                                        <input type="text" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror" value="{{ old('zip_code') }}">
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="margin_between">
                                        <div class="input_box space_between">
                                            <label>Phone <span>*</span></label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                        <div class="input_box space_between">
                                            <label>Email address <span>*</span></label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
        				</div>

        			</div>
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__order__box">
        					<h3 class="onder__title">Your order</h3>
        					<ul class="order__total">
        						<li>Product</li>
                                    <li>Total</li>
                                </ul>
        					<ul class="order_product">
                                @foreach ($shopping as $item)

        						<li>{{$item->get_product->product_name}} × {{$item->quantity}}<span><b>${{$item->get_product->product_price*$item->quantity}}</b></span></li>
                                @endforeach
                            </ul>
        					<ul class="total__amount">
        						<li>Cart total <span>${{$total}}</span></li>
        						<li>Discount({{session('coupon_discount') ? session('coupon_discount') : "0"}}%)<span>${{$discount? $discount:'0'}}</span></li>
        						<li>Order Total <span>${{$grand_total}}</span></li>
        					</ul>
        				</div>
					    <div id="accordion" class="checkout_accordion mt--30" role="tablist">

						    <div class="payment">
						        <div class="che__header" role="tab" id="headingFour">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							            <span>PayPal <img src="{{asset('template/images/icons/payment.png')}}" alt="payment images"> </span>
						          	</a>
						        </div>
						        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
					          		<div class="payment-body">
                                        <div class="form-row">
                                            {{-- id="card-element" --}}
                                            <div id="card-element">
                                              <!-- A Stripe Element will be inserted here. -->
                                            </div>

                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" role="alert">
                                                {{-- <label for="card-element">
                                                    Card No: 4242424242424242, date: 04 / 24
                                                  </label> --}}
                                            </div>
                                          </div>

                                          <button type="submit">Submit Payment</button>
                                          <label for="card-element">
                                            Card No: 4242424242424242, date: 04 / 24
                                          </label>
					          		</div>
                                      </div>
						        </div>
						    </div>
					    </div>

        			</div>
                </form>
        		</div>
            </div>
        </section>
        <!-- End Checkout Area -->
@endsection
{{-- footer for js --}}
@section('footer_js')


<script src="//js.stripe.com/v3/"></script>
<script type="text/javascript">
    $('#country_id').change(function(){
    var countryID = $(this).val();
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('ajax/state')}}/"+countryID,
           success:function(res){
            if(res){
                $("#state_id").empty();
                $("#state_id").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });

            }else{
               $("#state_id").empty();
            }
           }
        });
    }else{
        $("#state_id").empty();
        $("#city_id").empty();
    }
   });
    $('#state_id').on('change',function(){
    var stateID = $(this).val();
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('ajax/city')}}/"+stateID,
           success:function(res){
            if(res){
                $("#city_id").empty();
                $.each(res,function(key,value){
                    $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                });

            }else{
               $("#city_id").empty();
            }
           }
        });
    }else{
        $("#city_id").empty();
    }

   });




// stripe
            // Create a Stripe client.
var stripe = Stripe('pk_test_Qhb1aZt3rU8ODTVfW8R3vW0200kZycUqGW');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
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

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
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
}

</script>
@endsection
