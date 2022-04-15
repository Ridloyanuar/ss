<?php

namespace App\Services;

use App\Cart_model;
use App\OpenOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GlobalService {

    public static function openOrder()
    {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $openOrder = OpenOrder::query()->orderBy('tanggal', 'desc')->first();
        $now = time();

        $order = "Pesan Malam, Diantar Pagi - Siang. Garansi 100%";
        if ($openOrder->tanggal > $now) {
            $order = strftime("Untuk Pengiriman Tanggal %d %B %Y", $openOrder->tanggal);
        }

        return $order;
    }

    public static function countCart() {
        $session_id = Session::get('session_id');
        $cart = Cart_model::where('session_id', $session_id)->count();

        return $cart;
    }
}