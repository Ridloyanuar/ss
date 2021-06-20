<?php

namespace App\Http\Controllers;

use App\Orders_model;
use App\PaymentConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return redirect()->back();
    }

    public function index()
    {
        $menu_active = 6;
        $payments = DB::table('payment_confirmation')
                            ->join('users', 'payment_confirmation.user_id', '=', 'users.id')
                            ->join('orders', 'payment_confirmation.order_id', '=', 'orders.id')
                            ->where('order_status', 'confirm_payment')
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
