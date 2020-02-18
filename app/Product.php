<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    function get_category(){

        return $this->belongsTo('App\Category', 'category_id');

    }function get_cart(){

        return $this->belongsTo('App\Cart', 'product_id');

    }
    protected $fillable = [
        'product_name',
        'slug',
        'category_id',
        'product_summary',
        'product_description',
        'product_price',
        'product_quantity',
        'alart_quantity',
        'product_image',
    ];
}
