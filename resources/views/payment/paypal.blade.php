@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
            <form action="/payment/confirmation" method="post" class="billing-form" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<h3 class="mb-4 billing-heading">Konfirmasi Pembayaran via Bank Transfer</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Nama Rekening</label>
	                  <input type="text" name="bank_user" class="form-control" required placeholder="">
	                </div>
	              </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Jenis Bank</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="bank_name" id="" class="form-control" required>
		                  	<option value="BCA">Bank BCA</option>
		                    <option value="Mandiri">Bank Mandiri</option>
		                    <option value="BRI">Bank BRI</option>
		                    <option value="BNI">Bank BNI</option>
		                    <option value="Lainnya">Lainnya</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Nomor Order</label>
	                  <input type="text" class="form-control" value="sayursmb-{{$who_buying->id}}" disabled>
	                  <input type="hidden" class="form-control" value="{{$who_buying->id}}" name="order_id" >
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Bukti Transfer</label>
	                    <input type="file" class="form-control" name="file_transfer" required>
	                </div>
		            </div>
		            
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
				</div>
                </div>
	            </div>
			</div>
			<div class="col-xl-5">
	          <div class="row">
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Hal-hal yang perlu diperhatikan: </h3>
                            <ul class="list-group">
                                <li class="list-group-item">Pembayaran hanya ke rekening {{$bankInformation->type}} <b>{{$bankInformation->number}}</b> a.n {{$bankInformation->name}}.</li>
                                <li class="list-group-item">Sesuaikan nilai transfer yang tertera disini (<b>Rp{{$who_buying->grand_total}}</b>), jangan melebih-lebihkan atau membulatkan angka nominal.</li>
                                <li class="list-group-item">Pastikan semua data terisi dengan benar.</li>
								<li class="list-group-item">Jika pemesanan dilakukan setelah pukul 09:00:00 WIB. Pesanan akan dikirim besok.</li>
                                <li class="list-group-item">Selesaikan pembayaran anda sebelum pukul 15:00:00 WIB. Pesanan akan otomatis dibatalkan jika melewati batas waktu pembayaran.</li>
                            </ul>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="accept_tnc" required value="1" class="mr-2"> Saya telah membaca dan menerima syarat dan ketentuan</label>
                                </div>
                            </div>
                        </div>
                        <p><button type="submit" class="btn btn-primary py-3 px-4">Konfirmasi Pembayaran</button></p>
	          </form><!-- END -->

                    </div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> 
@endsection