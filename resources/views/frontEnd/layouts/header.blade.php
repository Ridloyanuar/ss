<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">081246588816</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">sayursembalun@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">Pengiriman Setiap Hari Senin dan Kamis</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{url('/')}}">SayurSembalun</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="{{url('/shop')}}" class="nav-link">Belanja</a></li>
                <!-- <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">Tentang Kami</a></li> -->
                <!-- <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Kontak</a></li> -->
				@if (Auth::check())
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
				<div class="dropdown-menu" aria-labelledby="dropdown04">
					<a class="dropdown-item" href="{{url('/myaccount')}}">Akun Anda</a>
					<a class="dropdown-item" href="{{url('/order/status')}}">Status Pesanan</a>
					<a class="dropdown-item" href="{{url('/logout')}}">Keluar</a>
				</div>
				</li>
                @else
                <li class="nav-item"><a href="{{url('/login_page')}}" class="nav-link">Login</a></li>
                @endif
	            <li class="nav-item cta cta-colored"><a href="{{url('/viewcart')}}" class="nav-link">Keranjang</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>