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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

	@if($cart_count == 0)
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate text-center">
				<h3>Wahhh, Keranjang Kamu Masih Kosong</h3>
				<p><a href="/" class="btn btn-primary py-3 px-4">Belanja Sekarang!</a></p>
				</div>
				</div>
			</div>
		</section>
	@else 
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
						<div class="product-title">
	    					Produk
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
							<div class="side-product-qty">
								<div class="product-qty">
									<a href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}">
									<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
										<path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
									</svg>
									</a>
									<span>{{$cart->quantity}}</span>
									<a href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}">
									<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
										<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
									</svg>
									</a>
								</div>
							</div>
						</div>
						@endforeach
						<div class="total-shopping">
							@if(Session::has('discount_amount_price'))
							<p class="d-flex">
								<span>Subtotal</span>
								<span>Rp. {{number_format($total_price)}}</span>
							</p>
							<p class="d-flex">
								<span>Discount</span>
								<span>Rp. {{Session::get('discount_amount_price')}}</span>
							</p>
							<p class="d-flex">
								<span>Total</span>
								<span>Rp. {{$total_price - Session::get('discount_amount_price')}}</span>
							</p>
							@else
								<span>Total Belanja</span>
								<span>Rp{{number_format($total_price)}}</span>
							@endif
						</div>
					</div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
			
    				<!-- <p><a href="{{url('/shop')}}" class="btn btn-primary py-3 px-4">Lanjutkan Belanja</a></p>
    				<p><a href="{{url('/check-out')}}" class="btn btn-primary py-3 px-4">Lanjut ke Pembayaran</a></p> -->
    			

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
					@if(Session::has('message_coupon'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{Session::get('message_coupon')}}
                        </div>
                    @endif
    				<div class="cart-total mb-3">
    					<h3>Kode Kupon</h3>
    					<p>Masukkan kode kupon Anda jika ada</p>
						  <form action="{{url('/apply-coupon')}}" class="info" method="post" role="form">
						  	<input type="hidden" name="_token" value="{{csrf_token()}}">
                        	<input type="hidden" name="Total_amountPrice" value="{{$total_price}}">
							<div class="form-group">
								<label for="">Kode Kupon</label>
								<div class="controls {{$errors->has('coupon_code')?'has-error':''}}">
								<input type="text" name="coupon_code" class="form-control text-left px-3" placeholder="">
										<span class="text-danger">{{$errors->first('coupon_code')}}</span>
									</div>

							</div>
							<button type="submit" class="btn btn-primary py-3 px-4">Masukkan Kupon</button>

						 </form>
    				</div>
    			</div>

    		</div>

			<p><a href="{{url('/')}}" class="btn btn-primary py-3 px-4" style="width: 100%;">Lanjutkan Belanja</a></p>
    		<p><a href="{{url('/check-out')}}" class="btn btn-primary py-3 px-4" style="width: 100%;">Lanjut ke Pembayaran</a></p>
			</div>
		</section>
	@endif

@endsection