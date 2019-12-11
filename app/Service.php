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

    public function category(){
        return $this->hasManyThrough(
            'App\ServiceCategory',
            'App\ServicePostCategory',
            'service_id',
            'id',
            'id',
            'service_categorie_id'
        );
    }
}
