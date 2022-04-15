<?php

namespace App\Http\Controllers;

use App\DetailOrder;
use App\OpenOrder;
use App\Orders_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active = 5;
        $i=0;
        $orders = Orders_model::orderBy('id', 'desc')->get();

        return view('backEnd.order.index',compact('menu_active', 'orders', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active = 5;
        return view('backEnd.order.create',compact('menu_active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tanggal' => 'required|date_format:Y-m-d|after:today',
        ]);
        
        $openOrder = new OpenOrder();
        $openOrder->tanggal = strtotime($request->tanggal);
        $openOrder->save();

        return redirect()->route('order.create')->with('message','Tanggal Berhasil Dibuat!');
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
        $menu_active = 5;
        $orders = Orders_model::findOrFail($id);

        return view('backEnd.order.edit', compact('menu_active','orders'));
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

    public function printInvoice($id)
    {
        $orders = Orders_model::with('detail.product')->where('id', $id)->first();

        $view = View::make('pdf.invoice', ['data' => $orders])->render();

        $mpdf = new Mpdf([
            'tempDir' => storage_path('logs'),
            'default_font' => 'roboto',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
            'format' => 'A4',
            'mode' => 'utf-8'
        ]);      
        $mpdf->SetTitle('sayursmb-'. $id);
        $mpdf->WriteHTML($view);
        $mpdf->Output();
    }
}
