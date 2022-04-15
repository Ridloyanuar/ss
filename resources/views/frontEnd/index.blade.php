@extends('frontEnd.layouts.master')
@section('content')
<section id="home-section" class="hero">

      @foreach($banners as $banner)
        <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(banner/large/{{$banner->image}});">
	      	<div class="overlay"></div>
	        <!-- <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	            </div>

	          </div>
	        </div> -->
	      </div>
      @endforeach
      

	      
    </section>

    <!-- <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over $100</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section> -->

		<!-- <section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(frontEnd/images/category.jpg);">
									<div class="text text-center">
										<h2>Vegetables</h2>
										<p>Protect the health of every home</p>
										<p><a href="/shop" class="btn btn-primary">Shop now</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(frontEnd/images/category-1.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Fruits</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(frontEnd/images/category-2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Vegetables</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(frontEnd/images/category-3.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Juices</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(frontEnd/images/category-4.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Dried</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->

    <!-- <section class="ftco-section"> -->
    	<div class="container">
				<div class="row">
          <div class="category-ss">
            <div class="cat-card">
              <div class="img-box">
                <a href="/?category=all">
                  <img class="cat-img" src="https://s3-ap-southeast-1.amazonaws.com/assets.segari.id/categories/v3/semua_produk.png" alt="Card image cap">
                </a>
              </div>
              <p class="cat-text"><a href="#" class="active">Semua</a></p>
            </div>
            @foreach($categories as $category)
            <div class="cat-card">
              <div class="img-box">
                <a href="{{ env('APP_ENV') != 'local' ? $category->url : $category->local_url }}">
                  <img class="cat-img" src="{{ $category->icon != null ? asset($category->icon) : 'https://s3-ap-southeast-1.amazonaws.com/assets.segari.id/categories/v3/semua_produk.png' }}" alt="Card image cap">
                </a>
              </div>
              <p class="cat-text"><a href="{{ env('APP_ENV') != 'local' ? $category->url : $category->local_url }}" class="active">{{ $category->name }}</a></p>
            </div>
            @endforeach
          </div>
        </div>   		
    	</div>


    	<div class="container">
    		<div class="row">
            @foreach($products as $product)
            @if($product->category->status==1)
    			<!-- <div class="col-3 ftco-animate"> -->
    				<div class="product">
              <a href="#" class="img-prod">
              <img class="img-fluid" src="{{url('products/small/', $product->image)}}" alt="{{$product->p_name}}">

              @if($product->promo != 0.00)   
                <span class="status">{{$product->promo * 100}}%</span>
              @endif
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<h3><a href="#">{{$product->p_name}}</a></h3>
    						<p>{!!$product->description!!}</p>
                <?php
                  for($i = 0; $i < 5; $i++) {
                    echo "<span class='oi oi-star checked'></span> ";
                  }

                  echo rand(10, 100);
                ?>
    						<!-- <div class="d-flex"> -->
    							<div class="pricing">
                    @if ($product->promo != 0.00)
		    						  <p class="price"><span class="mr-2 price-dc">Rp{{$product->price}}</span><span class="price-sale">Rp{{$product->final_price}}/{{$product->jenis_satuan}}</span></p>
                    @else
                      <p class="price"><span class="price-sale">Rp{{$product->final_price}}/{{$product->jenis_satuan}}</span></p>
                    @endif
		    					</div>
	    					<!-- </div> -->
	    					<!-- <div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex"> -->
                    @if ($product->stock < 1) 
	    							<span style="color: #f00b0b">HABIS</span>
                    @else
	    							<!-- <a href="{{url('/product-detail',$product->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
                    </a> -->
                    
                    <form action="{{route('addToCart')}}" method="post" role="form">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="hidden" name="products_id" value="{{$product->id}}">
                      <input type="hidden" name="product_name" value="{{$product->p_name}}">
                      <input type="hidden" name="product_code" value="{{$product->p_code}}">
                      <input type="hidden" name="price" value="{{$product->final_price}}" id="dynamicPriceInput">
                      <input type="hidden" id="quantity" name="quantity" class="form-control input-number" value="1">
                    
                    <!-- <a href="{{url('/viewcart')}}" > -->
                      <button type="submit" class="ss-product btn-primary col-md-6" style="margin-top: 10px;">BELI</button>
                    <!-- </a> -->
                    </form>
                    @endif
    							<!-- </div>
    						</div> -->
    					</div>
    				</div>
                <!-- </div> -->
                @endif
				@endforeach
    		
    		</div>
    	</div>
    </section>
		
	<!-- <section class="ftco-section img" style="background-image: url(frontEnd/images/bg_3.jpg);">
    	<div class="container">
				<div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          	<span class="subheading">Best Price For You</span>
            <h2 class="mb-4">Deal of the day</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            <h3><a href="#">Spinach</a></h3>
            <span class="price">$10 <a href="#">now $5 only</a></span>
          </div>
        </div>   		
    	</div>
    </section> -->

    <!-- <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <hr>
@endsection