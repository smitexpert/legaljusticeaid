<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $fillable = [
        'slug',
        'name',
        'phone',
        'email',
        'address',
        'description',
        'logo'
    ];
}
