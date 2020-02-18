<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    function get_category(){

        return $this->belongsTo('App\Category', 'category_id');

    }
}
