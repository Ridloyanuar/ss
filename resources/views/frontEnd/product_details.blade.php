@extends('frontEnd.layouts.master')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('../frontEnd/images/bg_1.jpg');">
      <div class="container">
                @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="{{url('products/large',$detail_product->image)}}" class="image-popup"><img src="{{url('products/small',$detail_product->image)}}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <form action="{{route('addToCart')}}" method="post" role="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
    				<h3>{{$detail_product->p_name}}</h3>
    				<p class="price"><span>Rp. {{$detail_product->price}}/kg</span></p>
    				<p>{{$detail_product->description}}</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="{{$totalStock}}">
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">Masih Tersedia {{$totalStock}}kg</p>
	          	</div>
              </div>
              @if ($totalStock > 0)
              <button type="submit" class="btn btn-default cart" id="buttonAddToCart">Tambahkan Ke Keranjang</button>
              @endif
                </div>
                </form>

    		</div>
    	</div>
    </section>

@endsection