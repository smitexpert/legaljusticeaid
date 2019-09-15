<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdviceAnswer extends Model
{
    protected $fillable = [
        'answer',
        'is_best',
        'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
