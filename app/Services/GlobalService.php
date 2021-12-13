<?php

namespace App\Services;

use App\OpenOrder;

class GlobalService {

    public static function openOrder()
    {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $openOrder = OpenOrder::query()->orderBy('tanggal', 'desc')->first();
        $now = time();

        $order = "Pengiriman Setiap Hari Selasa dan Jum'at";
        if ($openOrder->tanggal > $now) {
            $order = strftime("Untuk Pengiriman Tanggal %d %B %Y", $openOrder->tanggal);
        }

        return $order;
    }
}