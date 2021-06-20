@extends('backEnd.layouts.master')
@section('title','Konfirmasi Pembayaran')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('coupon.index')}}" class="current">Coupons</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Pembayaran</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor Pesanan</th>
                        <th>Bank</th>
                        <th>Nama Bank</th>
                        <th>File</th>
                        <th>Total Bayar</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($payments as $payment)
                        <tr class="gradeC">
                            <td style="vertical-align: middle;">{{$i}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$payment->name}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$payment->order_id}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$payment->bank_name}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$payment->bank_user}}</td>
                            <td style="text-align: center; vertical-align: middle;">    				        
                            <a href="{{url('payment/',$payment->file_transfer)}}" class="image-popup">
                                <img src="{{url('payment/',$payment->file_transfer)}}" class="img-fluid" width="50" alt="Colorlib Template">
                            </a>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">{{$payment->grand_total}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="#myModal{{$payment->id}}" data-toggle="modal" class="btn btn-info btn-mini">View</a>
                                <a href="{{route('payment.edit',$payment->id)}}" class="btn btn-primary btn-mini">Edit</a>
                                <a href="javascript:" rel="{{$payment->id}}" rel1="delete-coupon" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                        {{--Pop Up Model for View Product--}}
                        <div id="myModal{{$payment->order_id}}" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>{{$payment->bank_user}}</h3>
                            </div>
                            <div class="modal-body">
    				        <a href="{{url('payment/',$payment->file_transfer)}}" class="image-popup"><img src="{{url('payment/',$payment->file_transfer)}}" class="img-fluid" alt="Colorlib Template"></a>
                            </div>
                            <form action="{{route('confirmed',$payment->order_id)}}" method="post" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="order_status" value="payment_success">
                                <button type="submit" class="btn btn-primary" >Konfirmasi Pembayaran</button>
                            </form>
                        </div>
                        {{--Pop Up Model for View Product--}}
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