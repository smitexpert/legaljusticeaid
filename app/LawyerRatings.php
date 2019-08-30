<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LawyerRatings extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'lawyers_id',
        'users_id',
        'ratings',
        'feedback',
        'status'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'users_id');
    }

    public function lawyer(){
        return $this->hasOne('App\Lawyer', 'id', 'lawyers_id');
    }
}
