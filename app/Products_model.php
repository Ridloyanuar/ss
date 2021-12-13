<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_model extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'categories_id',
        'p_name',
        'p_code',
        'description',
        'price',
        'satuan',
        'stock',
        'promo',
        'final_price',
        'image'
    ];

    protected $appends = [
        'jenis_satuan'
    ];

    public function getjenissatuanAttribute()
    {
        $satuan = $this->satuan;
        $jenis_satuan = Satuan::where('id', $satuan)->first();

        if ($jenis_satuan == null) {
            return null;
        }

        return $jenis_satuan->jenis;
    }

    public function category() 
    {
        return $this->belongsTo(Category_model::class,'categories_id','id');
    }

    public function attributes() 
    {
        return $this->hasMany(ProductAtrr_model::class,'products_id','id');
    }
}
