@extends('backEnd.layouts.master')
@section('title','Orders')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('coupon.index')}}" class="current">Orders</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Orders</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Biaya Pengiriman</th>
                        <th>Tanggal Pengiriman</th>
                        <th>Diskon (Kupon)</th>
                        <th>Status</th>
                        <th>Metode Pembayaran</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <?php $i++; ?>
                        <tr class="gradeC">
                            <td style="vertical-align: middle;">{{$i}}</td>
                            <td style="vertical-align: middle;">sayursmb-{{$order->id}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->name}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->address}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->shipping_charges}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->shipping_date}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->coupon_amount}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->order_status}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->payment_method}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$order->grand_total}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                @if ($order->order_status == 'payment_success')
                                    <a href="invoice/{{$order->id}}" class="btn btn-info btn-mini">Invoice</a>
                                @elseif ($order->order_status == 'pending' && $order->payment_method == 'COD')
                                    <a href="invoice/{{$order->id}}" class="btn btn-info btn-mini">Invoice</a>
                                @endif
                                <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                <a href="javascript:" rel="{{$order->id}}" rel1="delete-coupon" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
    </script>
@endsection