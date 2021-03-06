<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li{{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu {{$menu_active==9? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span></a>
            <ul>
                <li><a href="{{url('admin/users-all')}}">List Users</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==8? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Banner</span></a>
            <ul>
                <li><a href="{{route('banner.create')}}">Add New Banner</a></li>
                <li><a href="{{route('banner.index')}}">List Banner</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==2? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span></a>
            <ul>
                <li><a href="{{url('/admin/category/create')}}">Add New Category</a></li>
                <li><a href="{{route('category.index')}}">List Categories</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span></a>
            <ul>
                <li><a href="{{url('/admin/product/create')}}">Add New Products</a></li>
                <li><a href="{{route('product.index')}}">List Products</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==4? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span></a>
            <ul>
                <li><a href="{{route('coupon.create')}}">Add New Coupon</a></li>
                <li><a href="{{route('coupon.index')}}">List Coupons</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==5? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span></a>
            <ul>
                <li><a href="{{route('order.create')}}">Open Orders</a></li>
                <li><a href="{{route('order.index')}}">List Orders</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==6? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Konfirmasi Pembayaran</span></a>
            <ul>
                <li><a href="{{route('payment.index')}}">List Pembayaran</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==7? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Satuan</span></a>
            <ul>
                <li><a href="{{route('satuan.create')}}">Add Satuan</a></li>
                <li><a href="{{route('satuan.index')}}">List Satuan</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->