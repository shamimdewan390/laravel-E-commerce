<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blog_title',
        'blog_slug',
        'blog_details',
        'blog_image',
    ];
}
