<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category_model;
use App\ImageGallery_model;
use App\OpenOrder;
use App\ProductAtrr_model;
use App\Products_model;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request) 
    {
        $products = Products_model::orderBy('stock', 'desc')->get();
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();

        $categories = Category_model::select([
                                'id', 
                                'name', 
                                'url', 
                                'local_url', 
                                'icon'
                            ])->where('status', 1)->get();

        $banners = Banner::where('status', 1)->get();
        
        $active = 'all';
        if ($request->has('category')) {
            $category = $request->get('category');
            
            if ($category == 'all') {
                // $active = 'all';
                $products = $products;
            } else {
                $active = $category;
                $products = $products->where('categoryname', $category);
            }
            
        }

        return view('frontEnd.index',[
            "products" => $products, 
            "categories" => $categories,
            "active" => $active,
            "order" => $order,
            "countCart" => $countCart,
            "banners" => $banners
        ]);
    }

    public function shop(Request $request)
    {
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();

        $products = Products_model::query()->orderBy('stock', 'desc');
        $categories = Category_model::select('id', 'name', 'url')->where('status', 1)->get();

        $active = 0;
        if ($request->has('category')) {
            $category = $request->get('category');
            
            if ($category == 'all') {
                $products = $products;
            } else {
                $active = $category;
                $products = $products->where('categories_id', $category);
            }
            
        }

        $vegetableProducts = $products->paginate(12);

        return view('frontEnd.shop', [
                "products" => $vegetableProducts, 
                "categories" => $categories,
                "active" => $active,
                "order" => $order,
                "countCart" => $countCart
            ]
        );
    }

    public function about() {
        return view('frontEnd.about');
    }

    public function contact() {
        return view('frontEnd.contact');
    }

    public function listByCat($id){
        $list_product=Products_model::where('categories_id',$id)->get();
        $byCate=Category_model::select('name')->where('id',$id)->first();
        return view('frontEnd.products',compact('list_product','byCate'));
    }
    public function detialpro($id){
        $detail_product = Products_model::findOrFail($id);
        $imagesGalleries = ImageGallery_model::where('products_id', $id)->get();
        $totalStock = ProductAtrr_model::where('products_id', $id)->sum('stock');
        $relateProducts = Products_model::where([['id','!=', $id],['categories_id', $detail_product->categories_id]])->get();
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();

        return view('frontEnd.product_details',compact('detail_product', 'imagesGalleries', 'totalStock', 'relateProducts', 'order', 'countCart'));
    }
    public function getAttrs(Request $request){
        $all_attrs=$request->all();
        //print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];
        $result_select=ProductAtrr_model::where(['products_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }

    public function format(LengthAwarePaginator $paginator)
    {
        $paginatorData = $paginator->toArray();
        $object = (object) [];

        $object->Records = $paginatorData['data'];
        $object->CurrentPage = (int) $paginatorData['current_page'];
        $object->FirstPage = (int) $paginatorData['from'];
        $object->LastPage = (int) $paginatorData['last_page'];
        $object->PerPage = (int) $paginatorData['per_page'];
        $object->Total = (int) $paginatorData['total'];

        return $object;
    }

    public function help()
    {
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();


        return view('frontEnd.help', [
            'order' => $order,
            'countCart' => $countCart
        ]);
    }
}
