<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $fillable = [
        'tagId', 'postId', 'driverId_1',
        'driverId_2', 'driverId_3', 'constructorId_1',
        'constructorId_2', 'constructorId_3', 'circuitId_1', 
        'circuitId_2', 'circuitId_3', 'year_1',
        'year_2', 'year_3', 'raceId_1',
        'raceId_2', 'raceId_3', 'defaultDriver',
        'defaultConstructor', 'defaultCircuit', 'defaultSeason', 
        'defaultRace'
    ];

    protected $primaryKey = 'tagId';

    public $incrementing = false;


    
    public function drivers(){
        return $this->hasMany('App\drivers', 'driverId');
    }

    public function constructors(){
        return $this->hasMany('App\constructors', 'constructorId');
    }

    public function circuits(){
        return $this->hasMany('App\circuits', 'circuitId');
    }

    public function seasons(){
        return $this->hasMany('App\seasons', 'year');
    }

    public function races(){
        return $this->hasMany('App\races', 'raceId');
    }



    public function circuit_show($circuitId){

        $data = DB::table('tags')
        ->select('tags.postId')
        ->where('defaultCircuit','=', $circuitId)
        ->orWhere('circuitId_1','=', $circuitId)
        ->orWhere('circuitId_2', '=', $circuitId)
        ->orWhere('circuitId_3', '=', $circuitId)
        ->get();

        return $data;
    }

    public function driver_show($driverId){

        $data = DB::table('tags')
        ->select('tags.postId')
        ->where('defaultDriver','=', $driverId)
        ->orWhere('driverId_1','=', $driverId)
        ->orWhere('driverId_2', '=', $driverId)
        ->orWhere('driverId_3', '=', $driverId)
        ->get();

        return $data;
    }

    public function constructor_show($constructorId){

        $data = DB::table('tags')
        ->select('tags.postId')
        ->where('defaultConstructor','=', $constructorId)
        ->orWhere('constructorId_1','=', $constructorId)
        ->orWhere('constructorId_2', '=', $constructorId)
        ->orWhere('constructorId_3', '=', $constructorId)
        ->get();

        return $data;
    }

    public function season_show($year){

        $data = DB::table('tags')
        ->select('tags.postId')
        ->where('defaultSeason', '=', $year)
        ->orWhere('year_1','=', $year)
        ->orWhere('year_2', '=', $year)
        ->orWhere('year_3', '=', $year)
        ->get();

        return $data;
    }

    public function race_show($raceId){

        $data = DB::table('tags')
        ->select('tags.postId')
        ->where('defaultRace', '=', $raceId)
        ->orWhere('raceId_1','=', $raceId)
        ->orWhere('raceId_2', '=', $raceId)
        ->orWhere('raceId_3', '=', $raceId)
        ->get();

        return $data;
    }






}
