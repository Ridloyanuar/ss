<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Orders_model;
use App\PaymentConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmPayment(Request $request, $orderId)
    {
        $order = Orders_model::where('id', $orderId)->first();
        $order->order_status = $request->order_status;
        $order->save();

        //send email payment
        $subject = "Pembayaran Sukses";
        $data = [
            'name' => $order->name,
            'email' => $order->users_email,
            // 'confirm' => (env('APP_ENV') == 'local') ? env('LOCAL_SS_URL') .'/bank?order=sayursmb-' . $order->id : env('SS_URL') .'/bank?order=sayursmb-' . $order->id
        ];
    
        Mail::send(new SendEmail($data['email'], $subject, 'mailer.paymentconfirmation', $data));

        return redirect()->back();
    }

    public function index()
    {
        $menu_active = 6;
        $payments = PaymentConfirmation::with(['user', 'order'])
                                        ->whereHas('order', function($q) {
                                            $q->where('order_status', 'confirm_payment');
                                        })
                                        ->orderBy('id', 'desc')
                                        ->get();                    

        return view('backEnd.payment.index',compact('menu_active', 'payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
