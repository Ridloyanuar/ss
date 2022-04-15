<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    public function index()
    {
        $menu_active = 8;
        $banners = Banner::all();      

        return view('backEnd.banner.index', compact('menu_active', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active = 8;
        return view('backEnd.banner.create',compact('menu_active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|integer',
            'image' => 'required|mimes:png,jpg,jpeg|max:5000',
        ]);

        $input_data = $request->all();

        if ($request->file('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $fileName = time(). 'banner'.'.'.$image->getClientOriginalExtension();
                $large_image_path = public_path('banner/large/' . $fileName);
                $medium_image_path = public_path('banner/medium/' . $fileName);
                $small_image_path = public_path('banner/small/' . $fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600,600)->save($medium_image_path);
                Image::make($image)->resize(300,300)->save($small_image_path);
                $input_data['image'] = $fileName;
            }
        }

        Banner::create($input_data);
        return back()->with('message', 'Add Banner Already');   
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
        $delete = Banner::findOrFail($id);
        $image_large = public_path().'/banner/large/'.$delete->image;
        $image_medium = public_path().'/banner/medium/'.$delete->image;
        $image_small = public_path().'/banner/small/'.$delete->image;
        if($delete->delete()){
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        return redirect()->route('banner.index')->with('message','Delete Success!');
    }
}
