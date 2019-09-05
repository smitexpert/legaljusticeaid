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
}
