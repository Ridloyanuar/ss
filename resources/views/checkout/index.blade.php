@extends('frontEnd.layouts.master')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('frontEnd/images/bg_1.jpg');">
      <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
    

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
			<form action="{{url('/submit-checkout')}}" method="post" class="billing-form">
                <h3 class="mb-4 billing-heading">Shipping To</h3>
                <input type="hidden" name="_token" value="{{csrf_token()}}">

	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group {{$errors->has('billing_name')?'has-error':''}}">
	                	<label for="firstname">Name</label>
                      <input type="text" name="billing_name" class="form-control" value="{{$user_login->name}}" placeholder="">
                      <span class="text-danger">{{$errors->first('billing_name')}}</span>
	                </div>
	              </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group {{$errors->has('billing_city')?'has-error':''}}">
                            <label for="country">State</label>
                            <input type="text" class="form-control" name="billing_state" value="Nusa Tenggara Barat" placeholder="House number and street name">
                            <span class="text-danger">{{$errors->first('billing_state')}}</span>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group {{$errors->has('billing_address')?'has-error':''}}">
	                	<label for="streetaddress">Street Address</label>
                      <input type="text" class="form-control" name="billing_address" value="{{$user_login->address}}" placeholder="House number and street name">
                      <span class="text-danger">{{$errors->first('billing_address')}}</span>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group {{$errors->has('billing_city')?'has-error':''}}">
                        <label for="towncity">Town / City</label>
                        <div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="billing_city" id="" class="form-control">
		                    <option value="1">Lombok Timur</option>
		                    <option value="2">Lombok Tengah</option>
		                    <option value="3">Lombok Barat</option>
		                    <option value="4">Mataram</option>
                          </select>
                          <span class="text-danger">{{$errors->first('billing_city')}}</span>
		                </div>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group {{$errors->has('billing_pincode')?'has-error':''}}">
		            		<label for="postcodezip">Postcode / ZIP *</label>
                      <input type="text" name="billing_pincode" class="form-control" value="{{$user_login->pincode}}" placeholder="">
                      <span class="text-danger">{{$errors->first('billing_pincode')}}</span>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
	                <div class="form-group {{$errors->has('billing_mobile')?'has-error':''}}">
	                	<label for="phone">Phone</label>
                      <input type="text" name="billing_mobile" value="{{$user_login->mobile}}" class="form-control" placeholder="">
                      <span class="text-danger">{{$errors->first('billing_mobile')}}</span>
	                </div>
	              </div>
                </div>
                
                <button type="submit" class="btn btn-primary py-3 px-4" style="float: right;">CheckOut</button>

	          </form><!-- END -->
					</div>
					
      </div>
    </section> <!-- .section -->

@endsection