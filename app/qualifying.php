<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class qualifying extends Model
{
    protected $fillable = [
        'qualifyingId', 'raceId', 'driverId',
        'constructorId', 'number', 'position',
        'q1', 'q2', 'q3',
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


    public function thisFullQualifying($raceId){

        //check if int or response
        if(is_int($raceId)){
            $res2 = $raceId;
        }else{
            $responseId = json_decode(json_encode($raceId), true);
            $res2 = $responseId[0]['raceId'];
        }


        
        $data = DB::table('qualifying')
        ->join('drivers', 'drivers.driverId', '=', 'qualifying.driverId')
        ->join('constructors', 'constructors.constructorId', '=', 'qualifying.constructorId')
        ->select('qualifying.*', 'drivers.*', 'constructors.*')
        ->where(['qualifying.raceId' => $res2])
        ->orderBy('qualifying.position', 'asc')
        ->get();

        
        return $data;
    }
}
