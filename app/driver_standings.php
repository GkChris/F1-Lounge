<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class driver_standings extends Model
{
    protected $fillable = [
        'driverStandingsId', 'raceId', 'driverId',
        'points', 'position', 'positionText',
        'wins',
    ];

    protected $primaryKey = 'driverStandingsId';

    public function drivers()
    {
        return $this->belongsTo('App\drivers', 'driverId');
    }

    public function races()
    {
        return $this->belongsTo('App\races', 'raceId');
    }

    public function thisDriverStandings($raceId){      //driver standings with driver details 

        //check if int or response
        if(is_int($raceId)){
            $res2 = $raceId;
        }else{
            $responseId = json_decode(json_encode($raceId), true);
            $res2 = $responseId[0]['raceId'];
        }


        $data = DB::table('driver_standings')
        ->join('drivers', 'drivers.driverId', '=', 'driver_standings.driverId')
        ->select('driver_standings.*', 'drivers.*')
        ->where(['driver_standings.raceId' => $res2])
        ->orderBy('position', 'asc')
        ->get();

        
        //fix floats
        foreach ($data as $value) {
            if(intval($value->points) != 0){
                if($value->points / intval($value->points) == 1){
                    $value->points = intval($value->points);
                }
            }elseif($value->points > 0 && $value->points < 1){
                continue;
            }else{
                $value->points = intval($value->points);
            }
            $value->dob = str_replace("-", '/', $value->dob );
        }


        return $data;
    }



    public function thisCurrentSeasonLastRaceId($races){

        foreach($races as $res){
            $data = DB::table('driver_standings')
            ->select('raceId')
            ->where(['raceId' => $res->raceId])
            ->orderBy('raceId', 'desc')
            ->take(1)
            ->get();
            if(isset($data[0])){
                break;
            }
        }
        return $data;
    }
}
