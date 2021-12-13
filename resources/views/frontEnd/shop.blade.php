@extends('frontEnd.layouts.master')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('frontEnd/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">

						<li><a href="/shop?category=all" class="{{$active==0? 'active':''}}">Semua</a></li>
					
						@foreach($categories as $category) 
    						<li><a href="{{$category->url}}" class="{{$active==$category->id? 'active':''}}">{{$category->name}}</a></li>
						@endforeach
    				</ul>
    			</div>
    		</div>
    		<div class="row">
                @foreach ($products as $product)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="{{url('/product-detail',$product->id)}}" class="img-prod"><img class="img-fluid" src="{{url('products/small/',$product->image)}}" alt="Colorlib Template">
						@if($product->promo != 0.00)   
							<span class="status">{{$product->promo * 100}}%</span>
						@endif
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="{{url('/product-detail',$product->id)}}">{{$product->p_name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
								@if ($product->promo != 0.00)
		    						<p class="price"><span class="mr-2 price-dc">Rp{{$product->price}}</span><span class="price-sale">Rp{{$product->final_price}}/{{$product->jenis_satuan}}</span></p>
								@else
									<p class="price"><span class="price-sale">Rp{{$product->final_price}}/{{$product->jenis_satuan}}</span></p>
								@endif
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
									@if ($product->stock < 1) 
	    							<span style="color: #f00b0b">HABIS</span>
                    				@else
	    							<a href="{{url('/product-detail',$product->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
									</a>
									
									<form action="{{route('addToCart')}}" method="post" role="form">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="products_id" value="{{$product->id}}">
									<input type="hidden" name="product_name" value="{{$product->p_name}}">
									<input type="hidden" name="product_code" value="{{$product->p_code}}">
									<input type="hidden" name="price" value="{{$product->final_price}}" id="dynamicPriceInput">
									<input type="hidden" id="quantity" name="quantity" class="form-control input-number" value="1">
									
									<a href="{{url('/viewcart')}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
									<button type="submit" 
									style="background-color: Transparent;
											background-repeat: no-repeat;
											border: none;
											color: white;
											cursor: pointer;
											overflow:hidden;
											outline:none;">
									<i class="ion-ios-cart"></i></button>
									</a>
									</form>
									@endif
    							</div>
    						</div>
    					</div>
    				</div>
                </div>
                @endforeach
    			
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li>{{ $products->links('vendor.pagination.default') }} </li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

@endsection