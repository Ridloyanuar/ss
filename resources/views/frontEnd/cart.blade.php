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
				<p><a href="/shop" class="btn btn-primary py-3 px-4">Belanja Sekarang!</a></p>
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
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>SAYURSEMBALUN</th>
						        <th>Nama Sayur</th>
						        <th>Harga</th>
						        <th>Jumlah</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                            @foreach($cart_datas as $cart_data)
                            <?php
                                $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                            ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="{{url('/cart/deleteItem',$cart_data->id)}}"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod">
                                @foreach($image_products as $image_product)
                                    <a href=""><img src="{{url('products/small',$image_product->image)}}" alt="" style="width: 100px;"></a>
                                @endforeach
                                </td>
						        
						        <td class="product-name">
						        	<h3>{{$cart_data->product_name}}</h3>
						        	<p>{{$cart_data->product_code}}</p>
						        </td>
						        
						        <td class="price">Rp{{$cart_data->price}}</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
									<span class="input-group-btn mr-2">
									<a href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}" class="quantity-left-minus btn">
										<i class="ion-ios-remove"></i>
									</a>
									</span>
									 <input type="text" name="quantity" class="quantity form-control input-number" value="{{$cart_data->quantity}}" min="1" max="100">
									 <span class="input-group-btn ml-2">
									 <a href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}" class="quantity-right-plus btn">
										<i class="ion-ios-add"></i>
									</a>
									</span>
					          	</div>
					          </td>
						        
						        <td class="total">Rp{{$cart_data->price*$cart_data->quantity}}</td>
						      </tr><!-- END TR-->
                            @endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
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
    			
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
						<h3>Total Belanja</h3>
						@if(Session::has('discount_amount_price'))
						<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rp. {{number_format($total_price)}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>Rp. {{Session::get('discount_amount_price')}}</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp. {{$total_price - Session::get('discount_amount_price')}}</span>
    					</p>
                        @else
                        <p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp{{number_format($total_price)}}</span>
    					</p>
                        @endif
    					
    				</div>
    				<p><a href="{{url('/shop')}}" class="btn btn-primary py-3 px-4">Lanjutkan Belanja</a></p>
    				<p><a href="{{url('/check-out')}}" class="btn btn-primary py-3 px-4">Lanjut ke Pembayaran</a></p>
    			</div>
    		</div>
			</div>
		</section>
	@endif

@endsection