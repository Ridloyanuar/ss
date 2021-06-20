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
            <h1 class="mb-0 bread">Login</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-counter img" id="section-counter">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{url('/user_login')}}" method="post" class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class= "form-control" placeholder="Email" name="email"/>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class= "form-control" placeholder="Password" name="password"/>
                    </div>
                        <button type="submit" class="btn btn-primary py-3 px-5">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{url('/register_user')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="username" value="{{old('name')}}"/>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{old('email')}}"/>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}"/>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}"/>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 px-5">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>

    
    </section>

@endsection