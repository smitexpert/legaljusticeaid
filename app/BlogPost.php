<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'article',
        'slug',
        'cover',
        'featured',
        'user_id',
        'status'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function category(){
        return $this->hasManyThrough(
            'App\BlogCategory',
            'App\BlogPostCategory',
            'post_id',
            'id',
            'id',
            'cateogry_id'
        );
    }

    public function tags(){
        return $this->hasMany('App\BlogPostTag', 'post_id', 'id');
    }

    public function comments(){
        return $this->hasMany('App\BlogComment', 'post_id', 'id')->where('status', 1);
    }
}
