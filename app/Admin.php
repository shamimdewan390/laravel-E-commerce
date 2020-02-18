<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    // protected $guarded = ['id'];

    // protected $hidden = [
    // 	'password', 'remember_token',
    // ];

    // public function getAuthPassword()
    // {
    // 	return $this->password;
    // }

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'created_at'
    ];
}
