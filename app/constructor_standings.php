<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class constructor_standings extends Model
{
    protected $fillable = [
        'constructorStandingsId', 'raceId', 'constructorId',
        'points', 'position', 'positionText',
        'wins',
    ];

    public function constructors()
    {
        return $this->belongsTo('App\constructors', 'constructorId');
    }

    public function races()
    {
        return $this->belongsTo('App\races', 'raceId');
    }


    public function thisConstructorStandings($raceId){      //constructor standings & constructor details 

        //check if int or response
        if(is_int($raceId)){
            $res2 = $raceId;
        }else{
            $responseId = json_decode(json_encode($raceId), true);
            $res2 = $responseId[0]['raceId'];
        }
  

        $data = DB::table('constructor_standings')
        ->join('constructors', 'constructors.constructorId', '=', 'constructor_standings.constructorId')
        ->select('constructor_standings.*', 'constructors.*')
        ->where(['constructor_standings.raceId' => $res2])
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
        }


       

        return $data;
    }
    
}
