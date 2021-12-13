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
            <h1 class="mb-0 bread">Ubah Kata Sandi</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-counter img" id="section-counter">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Ubah Kata Sandi</h2>
                    <form action="{{url('/change_pass')}}" method="post" class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class= "form-control" placeholder="Kata Sandi Baru" name="newPassword" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class= "form-control" placeholder="Konfirmasi Kata Sandi" name="confirmPassword" required/>
                    </div>
                        <button type="submit" style="width:100%" class="btn btn-primary py-3 px-5">Ubah Kata Sandi</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>

    
    </section>

@endsection