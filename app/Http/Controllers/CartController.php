<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\OpenOrder;
use App\ProductAtrr_model;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $order = GlobalService::openOrder();

        $session_id = Session::get('session_id');
        $cart_datas = Cart_model::with('product')->where('session_id',$session_id)->get();
        $cart_count = $cart_datas->count();
        $total_price = 0;

        foreach ($cart_datas as $cart_data) {
            $total_price += $cart_data->price * $cart_data->quantity;
        }
        return view('frontEnd.cart', compact('cart_datas', 'total_price', 'cart_count', 'order'));
    }

    public function addToCart(Request $request)
    {
        $inputToCart = $request->all();
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        
            $stockAvailable = DB::table('products')
                                ->select('stock', 'p_code')
                                ->where('id', $inputToCart['products_id'])
                                ->first();

                                // return response()->json($stockAvailable);

            if ($stockAvailable->stock >= $inputToCart['quantity']) {
                $inputToCart['user_email'] = 'weshare@gmail.com';
                $session_id = Session::get('session_id');
                if (empty($session_id)) {
                    $session_id = str_random(40);
                    Session::put('session_id', $session_id);
                }

                $inputToCart['session_id'] = $session_id;
                $inputToCart['product_code'] = $stockAvailable->p_code;
                $count_duplicateItems = Cart_model::where([
                                        'products_id' => $inputToCart['products_id'],
                                        'session_id' => $inputToCart['session_id']
                                        ])->count();

                if ($count_duplicateItems > 0) {
                    return redirect()->route('cart')->with('message', 'Sayur ini udah ada dikeranjang');
                } else {
                    Cart_model::create($inputToCart);
                    return redirect()->route('cart')->with('message', 'Sayur ditambahkan');
                }

            } else {
                return back()->with('message', 'Yahh, Stok Kosong!');
            }
        
    }
    public function deleteItem($id=null){
        $delete_item=Cart_model::findOrFail($id);
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with('message','Deleted Success!');
    }

    public function updateQuantity($id, $quantity)
    {
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');

        $sku_size = DB::table('cart')->select('product_code', 'quantity')
                                        ->where('id', $id)
                                        ->first();

        $stockAvailable = DB::table('products')->select('stock')
                                        ->where([
                                            'p_code' => $sku_size->product_code
                                        ])->first();

        $updated_quantity = $sku_size->quantity + $quantity;

        if ($stockAvailable->stock >= $updated_quantity) {
            if ($updated_quantity == 0) {
                DB::table('cart')->where('id', $id)->delete();
                return back()->with('message','Produk terhapus');
            }
            
            DB::table('cart')->where('id', $id)->increment('quantity',$quantity);
            return back()->with('message','Jumlah dirubah');
        } else {
            return back()->with('message','Stok tidak tersedia');
        }
    }

    public function directBuy($id) {

    }
}
