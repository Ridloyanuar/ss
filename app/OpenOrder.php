<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenOrder extends Model
{
    protected $table = 'open_order';
    protected $fillable = [
        'id',
        'tanggal'
    ];
}
