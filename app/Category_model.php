<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_model extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'url',
        'local_url',
        'icon',
        'status'
    ];

}
