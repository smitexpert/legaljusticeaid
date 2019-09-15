<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts(){
        return $this->hasManyThrough(
            'App\BlogPost',
            'App\BlogPostCategory',
            'cateogry_id',
            'id',
            'id',
            'post_id'
        );
    }
}
