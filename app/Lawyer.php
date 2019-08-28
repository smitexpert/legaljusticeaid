<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawyer extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'location',
        'experience',
        'description',
        'gender',
        'picture',
    ];

    public function courts(){
        return $this->hasManyThrough(
            'App\Court',
            'App\LawyerCourt',
            'lawyers_id',
            'id',
            'id',
            'courts_id'
        );
    }

    public function practiceAreas(){
        return $this->hasManyThrough(
            'App\PracticeArea',
            'App\LawyerPracticeAreas',
            'lawyers_id',
            'id',
            'id',
            'practice_areas_id'
        );
    }

    public function specializations(){
        return $this->hasManyThrough(
            'App\Specialization',
            'App\LawyerSpecializations',
            'lawyers_id',
            'id',
            'id',
            'specializations_id'
        );
    }

    public function ratings(){
        return $this->hasMany('App\LawyerRatings', 'lawyers_id', 'id')->where('status', 1)->orderBy('id','DESC');
    }

}