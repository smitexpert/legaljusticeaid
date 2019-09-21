<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdviceAnswer extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'answer',
        'is_best',
        'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
