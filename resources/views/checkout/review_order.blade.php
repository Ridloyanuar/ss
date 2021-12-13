@extends('frontEnd.layouts.master')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('frontEnd/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Review Pembelian</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
						<div class="product-title">
	    					Review Produk
						</div>
						@foreach($cart_datas as $cart)
						<div class="product-cart">
	    					<div class="content">
								<div class="product-name">
									{{$cart->product_name}}
								</div>
								<div class="product-size">
									{{$cart->product->satuan}} {{$cart->product->jenis_satuan}}
								</div>
								<div class="product-price">
									Rp {{$cart->price}}
								</div>
							</div>
						</div>
						@endforeach
                        <div class="total-shopping">
                                <p>
		    						<span>Subtotal</span>
		    						<span>Rp{{number_format($total_price)}}</span>
		    					</p>
		    					<p>
		    						<span>Biaya Pengiriman</span>
		    						<span>Rp{{number_format($shipping_address->shipping_fee)}}</span>
                                </p>
                                @if(Session::has('discount_amount_price'))
                                <p>
		    						<span>Diskon (Kupon)</span>
		    						<span>Rp{{Session::get('discount_amount_price')}}</span>
		    					</p>
		    					<hr>
		    					<p>
		    						<span>Total</span>
		    						<span>Rp{{$total_price - Session::get('discount_amount_price') + $shipping_address->shipping_fee}}</span>
		    					</p>
                                @else
                                <p>
		    						<span>Total</span>
		    						<span>Rp{{number_format($total_price + $shipping_address->shipping_fee)}}</span>
		    					</p>
                                @endif
						</div>
					</div>

                    <br>

                    <div class="cart-list">
						<div class="product-title">
	    					Dikirim ke
						</div>
						<div class="product-cart">
	    					<div class="content">
								<div class="product-name">
                                    {{$shipping_address->name}}
								</div>
								<div class="product-price">
                                    {{$shipping_address->address}}
								</div>
								<div class="product-price">
                                    {{$shipping_address->location_name}} {{$shipping_address->pincode}}
								</div>
                                <div class="product-price">
                                    {{$shipping_address->state}}, Indonesia
								</div>
                                <div class="product-price">
                                    {{$shipping_address->mobile}}
								</div>
							</div>
						</div>
                        <div class="total-shopping">
                            <span>Pastikan alamat pengiriman benar</span>
					    </div>
    			    </div>

                    <br>

                    <form action="{{url('/submit-order')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <input type="hidden" name="users_id" value="{{$shipping_address->users_id}}">
                        <input type="hidden" name="users_email" value="{{$shipping_address->users_email}}">
                        <input type="hidden" name="name" value="{{$shipping_address->name}}">
                        <input type="hidden" name="address" value="{{$shipping_address->address}}">
                        <input type="hidden" name="city" value="{{$shipping_address->location_name}}">
                        <input type="hidden" name="state" value="{{$shipping_address->state}}">
                        <input type="hidden" name="pincode" value="{{$shipping_address->pincode}}">
                        <input type="hidden" name="country" value="Indonesia">
                        <input type="hidden" name="mobile" value="{{$shipping_address->mobile}}">
                        <input type="hidden" name="shipping_charges" value="{{$shipping_address->shipping_fee}}">
                        <input type="hidden" name="order_status" value="pending">
                        @if(Session::has('discount_amount_price'))
                            <input type="hidden" name="coupon_code" value="{{Session::get('coupon_code')}}">
                            <input type="hidden" name="coupon_amount" value="{{Session::get('discount_amount_price')}}">
                            <input type="hidden" name="grand_total" value="{{$total_price - Session::get('discount_amount_price') + $shipping_address->shipping_fee}}">
                        @else
                            <input type="hidden" name="coupon_code" value="NO Coupon">
                            <input type="hidden" name="coupon_amount" value="0">
                            <input type="hidden" name="grand_total" value="{{$total_price + $shipping_address->shipping_fee}}">
                        @endif   

                    <div class="cart-total">
                        <h3 class="billing-heading mb-4">Metode Pembayaran</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="payment_method" value="Bank" class="mr-2" required> Bank Tranfer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <label><input type="radio" name="payment_method" value="COD" class="mr-2" required> Cash On Delivery (COD)</label>
                                    </div>
                                </div>
                            </div>

                        <h3 class="billing-heading mb-4">Tanggal Pengiriman</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="shipping_date" id="" class="form-control">
                                            @if ($sendDate == 0)
                                                @foreach($shipping_date as $date)
                                                    <option value="{{$date}}">{{$date}}</option>
                                                @endforeach
                                            @else
                                                <option value="{{$sendDate}}">{{$tanggal}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                    </div>
                    </form>
    		    </div>
			</div>
	</section>

    <div style="margin-bottom: 20px;"></div>
@endsection