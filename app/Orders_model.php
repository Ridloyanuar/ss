<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_model extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'users_email',
        'name',
        'address',
        'city',
        'state',
        'pincode',
        'country',
        'mobile',
        'shipping_charges',
        'shipping_date',
        'coupon_code',
        'coupon_amount',
        'order_status',
        'payment_method',
        'grand_total'
    ];

    public function detail()
    {
        return $this->hasMany(DetailOrder::class, 'order_id', 'id');
    }
}
