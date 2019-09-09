<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogComment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status'
    ];

    public function username(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function post(){
        return $this->belongsTo('App\BlogPost', 'post_id', 'id');
    }
}
