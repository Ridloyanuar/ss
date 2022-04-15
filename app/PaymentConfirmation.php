<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    protected $table = 'payment_confirmation';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->select('id', 'name');
    }

    public function order()
    {
        return $this->hasOne(Orders_model::class, 'id', 'order_id')->select('id', 'grand_total');
    }
}
