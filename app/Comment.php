<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    function reply(){
        return $this->hasOne('App\Reply', 'comment_id');
    }
    function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
