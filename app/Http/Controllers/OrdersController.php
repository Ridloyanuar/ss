<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\DetailOrder;
use App\Orders_model;
use App\OrderStatus;
use App\PaymentConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index() 
    {
        $session_id = Session::get('session_id');
        $cart_datas = Cart_model::where('session_id', $session_id)->get();
        $total_price = 0;
        foreach ($cart_datas as $cart_data) {
            $total_price += $cart_data->price * $cart_data->quantity;
        }

        $blockedDatesInput = "08 Mar 2010,12 Apr 2010"; // dont show these dates
        $blockedDates = explode ("," , $blockedDatesInput); // convert to array
        $currentMonth = ""; // current month marker

        // loop over the next 52 weeks to find Mondays and Tuesdays
        $monday = [];
        $thursday = [];

        for($i=1; $i<=5; $i++) {
        // build the month header
        // $monthReference = date("M Y", strtotime('+'.$i.' Week'));

        // check if date exists in $blockeddate
        // if (!in_array(date("d M Y", strtotime('+'.$i.' Monday')), $blockedDates) || 
        //     !in_array(date("d M Y", strtotime('+'.$i.' Thursday')), $blockedDates) ) {
            // check if we have to show a new month
            $monday [] =  date("l d M Y", strtotime('+'.$i.' Monday'));          
            $thursday [] = date("l d M Y", strtotime('+'.$i.' Thursday'));
        //   }
        }

        $shipping_date = array_merge($monday, $thursday);

        usort($shipping_date, array($this,'date_sort'));

        $shipping_address = DB::table('delivery_address')
                                ->join('shipping_charges', 'delivery_address.city', '=', 'shipping_charges.id')
                                ->where('users_id', Auth::id())
                                ->first();

        return view('checkout.review_order',compact(
            'shipping_address', 
            'cart_datas', 
            'total_price', 
            'shipping_date'
        ));
    }

    public function order(Request $request) 
    {
        $session_id = Session::get('session_id');
        $carts = Cart_model::where('session_id', $session_id)->get();

        $input_data = $request->all();
        $payment_method = $input_data['payment_method'];
        $order = Orders_model::create($input_data);
        
        $orderStatus = new OrderStatus();
        $orderStatus->user_id = Auth::user()->id;
        $orderStatus->order_id = $order->id;
        $orderStatus->status = 'pending';
        $orderStatus->save();

        foreach ($carts as $cart) 
        {
            $detailOrder = new DetailOrder();
            $detailOrder->order_id = $order->id;
            $detailOrder->products_id = $cart->products_id;
            $detailOrder->product_name = $cart->product_name;
            $detailOrder->price = $cart->price;
            $detailOrder->quantity = $cart->quantity;
            $detailOrder->user_email = $cart->user_email;
            $detailOrder->session_id = $session_id;
            $detailOrder->created_at = time();
            $detailOrder->updated_at = time();
            $detailOrder->save();

            $cart->delete();
        }

        if ($payment_method == "COD") {
            return redirect('/cod');
        } else {
            return redirect('/bank');
        }
    }

    public function cod() 
    {
        $user_order = Orders_model::where('users_id', Auth::id())->first();
        return view('payment.cod',compact('user_order'));
    }

    public function paypal(Request $request)
    {
        $who_buying = Orders_model::where('users_id', Auth::id())->first();
        return view('payment.paypal',compact('who_buying'));
    }

    public function paymentConfirmation(Request $request) 
    {
        $filename = time().'.'.request()->file_transfer->getClientOriginalExtension();
        request()->file_transfer->move(public_path('payment'), $filename);

        $paymentConfirmation = new PaymentConfirmation();
        $paymentConfirmation->order_id = $request->order_id;
        $paymentConfirmation->bank_user = $request->bank_user;
        $paymentConfirmation->bank_name = $request->bank_name;
        $paymentConfirmation->file_transfer = $filename;
        $paymentConfirmation->accept_tnc = 1;
        $paymentConfirmation->save();

        $orderStatus = new OrderStatus();
        $orderStatus->user_id = Auth::user()->id;
        $orderStatus->order_id = $request->order_id;
        $orderStatus->status = 'confirm_payment';
        $orderStatus->save();

        $order =  Orders_model::where('id', $request->order_id)->first();
        $order->order_status = 'confirm payment';
        $order->save();

        return redirect('/order/status');
    }

    public function orderStatus() {
        $orders =  Orders_model::with('detail')
                    ->where('users_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
        $total_order = $orders->count();

        return view('frontEnd.orderstatus', compact('orders', 'total_order'));
    }

    public function date_sort($a, $b) {
        return strtotime($a) - strtotime($b);
    }
}
