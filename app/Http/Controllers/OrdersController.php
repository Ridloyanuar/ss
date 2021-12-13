<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\DetailOrder;
use App\BankInformation;
use App\Mail\SendEmail;
use App\OpenOrder;
use App\Orders_model;
use App\OrderStatus;
use App\PaymentConfirmation;
use App\Products_model;
use App\Services\GlobalService;
use App\Services\TelegramService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index() 
    {
        $session_id = Session::get('session_id');
        $cart_datas = Cart_model::with('product')->where('session_id', $session_id)->get();
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
            $monday [] =  date("l d M Y", strtotime('+'.$i.' Monday'));          
            $thursday [] = date("l d M Y", strtotime('+'.$i.' Friday'));
        }

        $shipping_date = array_merge($monday, $thursday);

        usort($shipping_date, array($this,'date_sort'));

        $shipping_address = DB::table('delivery_address')
                                ->join('shipping_charges', 'delivery_address.city', '=', 'shipping_charges.id')
                                ->where('users_id', Auth::id())
                                ->first();

        $order = GlobalService::openOrder();

        $sendDate = 0;
        $openOrder = OpenOrder::query()->orderBy('tanggal', 'desc')->first();
        $now = time();
        $tanggal = "";

        if ($openOrder->tanggal > $now) {
            $sendDate = $openOrder->tanggal;
            $tanggal = strftime("%d %B %Y", $sendDate);
        }

        return view('checkout.review_order',compact(
            'shipping_address', 
            'cart_datas', 
            'total_price', 
            'shipping_date',
            'order',
            'sendDate',
            'tanggal'
        ));
    }

    public function order(Request $request) 
    {
        return $request->all();
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

        $dataMessage  = "";
        for($i = 0; $i < count($carts); $i++) {
            $dataMessage .= "- ".$carts[$i]->product_name." (x".$carts[$i]->quantity. ") " . " (Rp".$carts[$i]->price. ") " ."\n";
        }

        $shippingDate = strftime("%d %B %Y", strtotime($request->shipping_date));
        
        $telegramMessage = "Pesanan Baru! dari $request->name \n\nSayur yang dibeli:\n$dataMessage \nNomor Order: sayursmb-$order->id \nTanggal Pengiriman: $shippingDate \nAlamat Pengiriman: $request->address, $request->city, $request->state \nNo Handphone: $request->mobile \nMetode Pembayaran: $request->payment_method \nOngkir: Rp$request->shipping_charges \nTotal Pembayaran: Rp$request->grand_total";

        (new TelegramService(env('TELEGRAM_BOT_TOKEN'), env('TELEGRAM_CHAT_ID')))->send($telegramMessage);

        //send email order
        $pelanggan = User::where('id', Auth::user()->id)->first();
        $subject = "Berhasil Memesan";
        $data = [
            'user' => $pelanggan,
            'confirm' => (env('APP_ENV') == 'local') ? env('LOCAL_SS_URL') .'/bank?order=sayursmb-' . $order->id : env('SS_URL') .'/bank?order=sayursmb-' . $order->id
        ];
    
        // Mail::send(new SendEmail($pelanggan->email, $subject, 'mailer.order', $data));

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

            $product = Products_model::where('id', $cart->products_id)->first();
            if ($payment_method == "COD") {
                $product->stock = $product->stock - $cart->quantity;
            }
            $product->save();

            $cart->delete();
        }


        if ($payment_method == "COD") {
            return redirect('/cod');
        } else {
            return redirect('/bank?order=sayursmb-'.$order->id);
        }
    }

    public function cod() 
    {
        $user_order = Orders_model::where('users_id', Auth::id())->first();
        $order = GlobalService::openOrder();

        return view('payment.cod',compact('user_order', 'order'));
    }

    public function paypal(Request $request)
    {
        $who_buying = Orders_model::query();
        if ($request->has('order') != null) {
            $orderRequest = $request->get('order');
            $orderID = substr($orderRequest, 9);
            $who_buying = $who_buying->where('id', $orderID)->first();
        } else {
            $who_buying = $who_buying->where('users_id', Auth::id())
                                    ->where('order_status', 'pending')
                                    ->where('payment_method', 'Bank')
                                    ->get()->last();
        }
        
                                    
        $order = GlobalService::openOrder();
        $bankInformation = BankInformation::first();
        
        return view('payment.paypal',compact('who_buying', 'order', 'bankInformation'));
    }

    public function paymentConfirmation(Request $request) 
    {
        $filename = time().'.'.request()->file_transfer->getClientOriginalExtension();
        request()->file_transfer->move(public_path('payment'), $filename);

        $paymentConfirmation = new PaymentConfirmation();
        $paymentConfirmation->user_id = Auth::user()->id;
        $paymentConfirmation->order_id = $request->order_id;
        $paymentConfirmation->bank_user = $request->bank_user;
        $paymentConfirmation->bank_name = $request->bank_name;
        $paymentConfirmation->file_transfer = $filename;
        $paymentConfirmation->accept_tnc = 1;
        $paymentConfirmation->save();

        $user = User::select('id', 'name')->where('id', Auth::user()->id)->first();

        $order =  Orders_model::with('detail')->where('id', $request->order_id)->first();
        $order->order_status = 'confirm_payment';
        $order->save();

        foreach($order->detail as $detailOrder) {
            $product = Products_model::where('id', $detailOrder->products_id)->first();
            $product->stock = $product->stock - $detailOrder->quantity;
            $product->save();
        }

        $telegramMessage = "Konfirmasi Pembayaran! oleh $user->name \n\nNomor Order: sayursmb-$request->order_id \nBank User: $request->bank_user \nNama Bank: $request->bank_name";

        (new TelegramService(env('TELEGRAM_BOT_TOKEN'), env('TELEGRAM_CHAT_ID')))->send($telegramMessage);

        return redirect('/order/status');
    }

    public function orderStatus() {
        $orders =  Orders_model::with('detail')
                    ->where('users_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
        $total_order = $orders->count();
        $order = GlobalService::openOrder();

        return view('frontEnd.orderstatus', compact('orders', 'total_order', 'order'));
    }

    public function date_sort($a, $b) {
        return strtotime($a) - strtotime($b);
    }

    private function orderMessage(array $data, string $subject) {
        $dataMessage  = "";
        for($i = 0; $i < count($data); $i++) {
            $dataMessage .= $data[$i]->product_name." (".$data[$i]->quantity. ") " . " (".$data[$i]->price. ") " ."\n";
        }

        $telegramMessage = "$subject \n\n $dataMessage";

        return $telegramMessage;
    }
}
