<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sprint_results extends Model
{
    protected $fillable = [
        'resultId', 'raceId', 'driverId',
        'constructorId', 'number', 'grid', 
        'position', 'positionText', 'positionOrder',
        'points', 'laps', 'time',
        'milliseconds', 'fastestLap', 'fastestLapTime',
        'statusId'
    ];

    protected $primaryKey = 'resultId';


    public function drivers(){
        return $this->hasOne('App\drivers', 'driverId');
    }
    public function constructors(){
        return $this->hasOne('App\constructors', 'constructorId');
    }
    public function races()
    {
        return $this->hasMany('App\races', 'raceId');
    }




    public function thisSprintFullResults($raceId){

        //check if int or response
        if(is_int($raceId)){
            $res2 = $raceId;
        }else{
            $responseId = json_decode(json_encode($raceId), true);
            $res2 = $responseId[0]['raceId'];
        }


        $data = DB::table('sprint_results')
        ->select('raceId')
        ->where(['raceId' => $res2])
        ->exists();
        
        if($data){        
            $data2 = DB::table('sprint_results')
            ->join('drivers', 'drivers.driverId', '=', 'sprint_results.driverId')
            ->join('constructors', 'constructors.constructorId', '=', 'sprint_results.constructorId')
            ->join('status', 'status.statusId', '=', 'sprint_results.statusId')
            ->select('drivers.nationality as driverNationality', 'sprint_results.*', 'drivers.*', 'constructors.*', 'status.*')
            ->where(['sprint_results.raceId' => $res2])
            ->orderBy('sprint_results.position', 'asc')
            ->get();
    
            //fix floats
            foreach ($data2 as $value) {
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
    
            
            return $data2;
        }else{
            return null;
        }


            
    
        
        
    }
}
