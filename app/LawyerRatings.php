<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class LawyerRatings extends Model
{
    //
    use SoftDeletes, Notifiable;

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
