<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class constructor_results extends Model
{
    protected $fillable = [
        'constructorResultsId', 'raceId', 'constructorId',
        'points', 'status', 
    ];

    public function constructors()
    {
        return $this->belongsTo('App\constructors', 'constructorId');
    }

    public function races()
    {
        return $this->belongsTo('App\races', 'raceId');
    }
}
