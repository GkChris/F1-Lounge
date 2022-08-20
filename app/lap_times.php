<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lap_times extends Model
{
    protected $fillable = [
        'raceId', 'driverId', 'lap',
        'position', 'time', 'milliseconds',
    ];

    public function races()
    {
        return $this->belongsTo('App\races', 'raceId');
    }

    public function drivers()
    {
        return $this->belongsTo('App\drivers', 'driverId');
    }
}
