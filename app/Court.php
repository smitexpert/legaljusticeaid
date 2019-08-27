<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Court extends Model
{
    //
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'updated_at',
    ];

    public function courts(){
        return $this->hasManyThrough(
            'App\Lawyer',
            'App\LawyerCourt',
            'courts_id',
            'id',
            'id',
            'lawyers_id'
        );
    }
    
}
