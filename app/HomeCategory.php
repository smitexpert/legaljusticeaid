<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    protected $fillable = ['table_name', 'category_id'];

    public function category()
    {
        return $this->hasOne('App\BlogCategory', 'id', 'category_id');
    }
}
