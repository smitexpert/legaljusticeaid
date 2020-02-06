<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PracticeArea extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function practiceAreasLawyers(){
        return $this->hasManyThrough(
            'App\Lawyer',
            'App\LawyerPracticeAreas',
            'practice_areas_id',
            'id',
            'id',
            'lawyers_id'
        );
    }

    public function advices(){
        return $this->hasManyThrough(
            'App\Advice',
            'App\AdviceCategory',
            'practicearea_id',
            'id',
            'id',
            'advice_id'
        );
        
    }
}
