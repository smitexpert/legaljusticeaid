<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedPost extends Model
{
    //

    public function blog_post(){
        return $this->hasOne('App\BlogPost', 'id', 'post_id');
    }
}
