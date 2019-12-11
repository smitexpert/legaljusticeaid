<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'slug'
    ];

    public function services(){
        return $this->hasManyThrough(
            'App\Service',
            'App\ServicePostCategory',
            'service_categorie_id',
            'id',
            'id',
            'service_id'
        );
    }
}
