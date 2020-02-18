<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    function get_comment(){
        return $this->belongsTo('App\Comment', 'comment_id');
    }
    function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
