<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_orders';
    protected $primaryKey = 'id';

    public function product()
    {
        return $this->hasOne(Products_model::class, 'id', 'products_id')->select('id', 'satuan');
    }
}
