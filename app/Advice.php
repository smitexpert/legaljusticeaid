<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advice extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'details',
        'is_answerd',
        'status'
    ];

    public function category(){
        return $this->hasManyThrough(
            'App\PracticeArea',
            'App\AdviceCategory',
            'advice_id',
            'id',
            'id',
            'practicearea_id'
        );
    }

    public function answers(){
        return $this->hasMany('App\AdviceAnswer', 'advice_id', 'id')->orderBy('is_best', 'DESC');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
