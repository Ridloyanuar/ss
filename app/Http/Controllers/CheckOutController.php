<?php

namespace App\Http\Controllers;

use App\Services\GlobalService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function index(){
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();

        return view('checkout.index',compact('countries','user_login', 'order', 'countCart'));
    }
    
    public function submitcheckout(Request $request) 
    {
       $this->validate($request, [
           'billing_name'=>'required',
           'billing_address'=>'required',
           'billing_city'=>'required',
           'billing_state'=>'required',
           'billing_pincode'=>'required',
           'billing_mobile'=>'required',
       ]);

       $input_data = $request->all();
       $count_shippingaddress = DB::table('delivery_address')
                                        ->where('users_id', Auth::id())
                                        ->count();

       if ($count_shippingaddress == 1) {
           DB::table('delivery_address')->where('users_id', Auth::id())
                    ->update([
                        'name' => $input_data['billing_name'],
                        'address' => $input_data['billing_address'],
                        'city' => $input_data['billing_city'],
                        'state' => $input_data['billing_state'],
                        'pincode' => $input_data['billing_pincode'],
                        'mobile' => $input_data['billing_mobile']
                    ]);
       } else {
            DB::table('delivery_address')
                    ->insert([
                        'users_id' => Auth::id(),
                        'users_email' => Session::get('frontSession'),
                        'name' => $input_data['billing_name'],
                        'address' => $input_data['billing_address'],
                        'city' => $input_data['billing_city'],
                        'state' => $input_data['billing_state'],
                        'pincode' => $input_data['billing_pincode'],
                        'mobile' => $input_data['billing_mobile']
                    ]);
       }
    
            DB::table('users')->where('id',Auth::id())
                    ->update([
                        'name' => $input_data['billing_name'],
                        'address' => $input_data['billing_address'],
                        'city' => $input_data['billing_city'],
                        'state' => $input_data['billing_state'],
                        'pincode' => $input_data['billing_pincode'],
                        'mobile' => $input_data['billing_mobile']
                    ]);

       return redirect('/order-review');

    }
}
