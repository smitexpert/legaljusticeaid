<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function specializations(){
        return $this->hasManyThrough(
            'App\Lawyer',
            'App\LawyerSpecializations',
            'specializations_id',
            'id',
            'id',
            'lawyers_id'
        );
    }
}
