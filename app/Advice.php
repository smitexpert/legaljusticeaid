<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    //

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
        return $this->hasMany('App\AdviceAnswer', 'advice_id', 'id');
    }

}
