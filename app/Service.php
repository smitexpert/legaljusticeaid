<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function tags(){
        return $this->hasMany('App\ServiceTag', 'service_id', 'id');
    }
}
