@extends('frontEnd.layouts.master')
@section('content')

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
        <div class="col-md-12 ftco-animate text-center">
            <h3>PESANANMU SEDANG DIPROSES</h3>
            <p>Terimakasih telah mempercayakan kebutuhan sayurmu di SayurSembalun</p>
            <p>Kami akan menghubungimu via Email (<b>{{$user_order->users_email}}</b>) atau Nomer Handphone mu (<b>{{$user_order->mobile}}</b>)</p>
            <p><a href="/order/status" class="btn btn-primary py-3 px-4">Status Pesanan</a></p>
        </div>
        </div>
    </div>
</section>
@endsection