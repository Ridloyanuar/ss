@extends('frontEnd.layouts.master')
@section('content')

@if ($total_order == 0) 
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
        <div class="col-md-12 ftco-animate text-center">
            <h3>Kamu belum memiliki pesanan satupun.</h3>
            <p><a href="/" class="btn btn-primary py-3 px-4">Buat Pesanan Sekarang</a></p>
        </div>
        </div>
    </div>
</section>

@else

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
        <div class="col-md-12 ftco-animate">
        <h2>Status Pesananmu</h2>
        <ol class="list-group list-group-numbered">
        @foreach($orders as $orderr)
        <li class="list-group-item" style="margin: 20px;">
            <div class="ms-2 me-auto">
            <div class="fw-bold">Nomor Pemesanan: <b>sayursmb-{{$orderr->id}}</b></div>
            <div class="fw-bold">Metode Pembayaran: <b>{{$orderr->payment_method}}</b></div>
            <div class="fw-bold">Total Pembelian: <b>Rp{{number_format($orderr->grand_total)}}</b></div>
            <div class="fw-bold">Tanggal Pembelian: <b>{{date('d/m/Y', strtotime($orderr->created_at))}}</b></div>
            <p>Pesanan: </p>
            @foreach($orderr['detail'] as $detail)
            <div class="fw-bold">- {{$detail->product_name}} (x{{$detail->quantity}})</div>
            @endforeach
            <div class="progress" style="margin-top: 10px;">
                @if ($orderr->order_status == 'pending')
                <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Menunggu Pembayaran</div>
                @elseif ($orderr->order_status == 'payment')
                <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Proses Pembayaran</div>
                @elseif ($orderr->order_status == 'confirm_payment')
                <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Konfirmasi Pembayaran</div>
                @elseif ($orderr->order_status == 'payment_success') 
                <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Pembayaran berhasil</div>
                @else
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Selesai</div>
                @endif
            </div>
            @if ($orderr->payment_method == 'Bank' && $orderr->order_status != 'payment_success')
            <br>
            <a href="/bank?order=sayursmb-{{$orderr->id}}" class="btn btn-primary" style="width: 100%;">Konfirmasi Pembayaran</a>
            @endif
            </div>
        </li>
        @endforeach
        </ol>
        </div>
        </div>
    </div>
</section>
@endif
@endsection