<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    protected $fillable = [
        'resultId', 'raceId', 'driverId',
        'constructorId', 'number', 'grid',
        'position', 'positionText', 'positionOrder',
        'points', 'laps', 'time',
        'milliseconds', 'fastestLap', 'rank',
        'fastestLapTime', 'fastestLapSpeed', 'statusId',
    ];


    public function races()
    {
        return $this->belongsTo('App\races', 'raceId');
    }

    public function drivers()
    {
        return $this->belongsTo('App\drivers', 'driverId');
    }

    public function constructors()
    {
        return $this->belongsTo('App\constructors', 'constructorId');
    }

    public function status()
    {
        return $this->belongsTo('App\status', 'statusId');
    }


    public function thisFullResults($raceId){

        //check if int or response
        if(is_int($raceId)){
            $res2 = $raceId;
        }else{
            $responseId = json_decode(json_encode($raceId), true);
            $res2 = $responseId[0]['raceId'];
        }


        
        $data = DB::table('results')
        ->join('drivers', 'drivers.driverId', '=', 'results.driverId')
        ->join('constructors', 'constructors.constructorId', '=', 'results.constructorId')
        ->join('status', 'status.statusId', '=', 'results.statusId')
        ->select('drivers.nationality as driverNationality', 'results.*', 'drivers.*', 'constructors.*', 'status.*')
        ->where(['results.raceId' => $res2])
        ->orderBy('results.position', 'asc')
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



    public function thisDistinctWinners($year){
        $data = DB::table('results')
        ->join('races', 'races.raceId', '=', 'results.raceId')
        ->select('results.driverId')
        ->where(['races.year' => $year])
        ->where(['results.position' => '1'])
        ->distinct('results.driverId')
        ->get();

        return $data;
    }

    public function thisDistinctWinnersConstructors($year){
        $data = DB::table('results')
        ->join('races', 'races.raceId', '=', 'results.raceId')
        ->select('results.constructorId')
        ->where(['races.year' => $year])
        ->where(['results.position' => '1'])
        ->distinct('results.constructorId')
        ->get();

        return $data;
    }


    public function thisDistinctPodiumFinishers($year){
        $data = DB::table('results')
        ->join('races', 'races.raceId', '=', 'results.raceId')
        ->select('results.driverId')
        ->where(['races.year' => $year])
        ->where('results.position', '<=', '3')
        ->distinct('results.driverId')
        ->get();

        return $data;
    }


    public function thisDistinctPodiumFinishersConstructors($year){
        $data = DB::table('results')
        ->join('races', 'races.raceId', '=', 'results.raceId')
        ->select('results.constructorId')
        ->where(['races.year' => $year])
        ->where('results.position', '<=', '3')
        ->distinct('results.constructorId')
        ->get();

        return $data;
    }
}
