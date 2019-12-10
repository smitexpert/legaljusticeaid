<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePostCategory extends Model
{
    protected $fillable = [
        'service_id',
        'service_categorie_id'
    ];
}
