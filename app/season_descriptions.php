<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class season_descriptions extends Model
{
    protected $fillable = [
        'descId', 'year', 'description',
        'source', 'sourceURL', 'pointsSystem',
        'fastestLapPoints' , 'sprintRacePoints'
    ];

    protected $primaryKey = 'descId';

    public $incrementing = false;


    public function seasons()
    {
        return $this->belongsTo(seasons::class, 'year');
    }



    public function thisSeasonDescript($id){
        $data = DB::table('season_descriptions')->where('year','=',$id)->get();
        return $data;
    }
}
