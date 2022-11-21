<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class pit_stops extends Model
{
    protected $fillable = [
        'raceId', 'driverId', 'stop',
        'lap', 'time', 'duration',
        'milliseconds', 
    ];

    public function races()
    {
        return $this->belongsTo('App\races', 'raceId');
    }

    public function drivers()
    {
        return $this->belongsTo('App\drivers', 'driverId');
    }


    public function thisRacePitStops($raceId){

        //check if int or response
        if(is_int($raceId)){
            $res2 = $raceId;
        }else{
            $responseId = json_decode(json_encode($raceId), true);
            $res2 = $responseId[0]['raceId'];
        }



        $data = DB::table('pit_stops')
        ->join('drivers', 'drivers.driverId', '=', 'pit_stops.driverId')
        ->select('pit_stops.*', 'drivers.*')
        ->where(['pit_stops.raceId' => strval($res2)])
        ->orderBy('pit_stops.time', 'asc')
        ->get();


        return $data;


    }
}


        