<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{
    
    public function index()
    {
        $menu_active = 7;
        $satuans = Satuan::all();      

        return view('backEnd.satuan.index',compact('menu_active', 'satuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active = 7;
        return view('backEnd.satuan.create',compact('menu_active'));
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
            'jenis' => 'required|string|unique:satuan,jenis',
        ]);

        $input_data = $request->all();

        Satuan::create($input_data);
        return back()->with('message', 'Add Satuan Already');   
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
        $menu_active = 7;

        $satuan = Satuan::where('id', $id)->first();

        return view('backEnd.satuan.edit', [
            'satuan' => $satuan,
            'menu_active' => $menu_active
        ]);
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
        $this->validate($request,[
            'jenis' => 'sometimes|required|string|unique:satuan,jenis',
        ]);

        $satuan = Satuan::where('id', $id)->first();
        $satuan->jenis = $request->jenis;
        $satuan->save();

        return back()->with('message', 'Add Satuan Already');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $satuan = Satuan::where('id', $id)->first();

        $satuan->delete();

        return redirect()->back();
    }
}
