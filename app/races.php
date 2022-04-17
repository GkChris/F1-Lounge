<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class races extends Model
{
    protected $fillable = [
        'raceId', 'year', 'round',
        'circuitId', 'name', 'date',
        'time', 'url',
    ];

    protected $primaryKey = 'raceId';


    public function race_descriptions(){
        return $this->hasOne('App\race_descriptions', 'raceId');
    }

    public function sprint_results(){
        return $this->hasMany('App\sprint_results', 'raceId');
    }

    public function circuits()
    {
        return $this->belongsTo('App\circuits', 'circuitId');
    }

    public function seasons()
    {
        return $this->belongsTo('App\seasons', 'year');
    }

    public function qualifying()
    {
        return $this->hasMany('App\qualifying', 'raceId');
    }

    public function pit_stops()
    {
        return $this->hasMany('App\pit_stops', 'raceId');
    }

    public function lap_times()
    {
        return $this->hasMany('App\lap_times', 'raceId');
    }

    public function results()
    {
        return $this->hasMany('App\results', 'raceId');
    }

    public function driver_standings()
    {
        return $this->hasMany('App\driver_standings', 'raceId');
    }

    public function tags()
    {
        return $this->hasMany('App\tags', 'raceId');
    }

    public function constructor_standings()
    {
        return $this->hasMany('App\constructor_standings', 'raceId');
    }

    public function constructor_results()
    {
        return $this->hasMany('App\constructor_results', 'raceId');
    }


    public function allRaces(){     //return all races
        $data = Races::all();
        return $data;
    }

    //Get specific race
    public function thisRace($year, $round){        //return specific race
        $data = Races::select('races.*')
        ->where(['year' => $year])
        ->where(['round' => $round])
        ->get();


        //crop time
        $data[0]['time'] = substr($data[0]['time'],0,-3);

        
        foreach($data as $dt){
            $dt->date = str_replace("-", '/', $dt->date );
        }
 


        return $data[0];
    }

    
    public function thisRaces($year){       //return all races of a year with circuit details
        $data = DB::table('races')
        ->join('circuits', 'circuits.circuitId', '=', 'races.circuitId')
        ->select('races.name as Rname', 'races.*', 'circuits.*')
        ->where(['year' => $year])
        ->orderBy('round', 'asc')
        ->get();

        foreach($data as $dt){
            $dt->date = str_replace("-", '/', $dt->date );
        }
        

        return $data;
    }

    public function thisLastRace($year){        //return the last race of a season
        $raceId = DB::table('races')
        ->select('races.raceId')
        ->where(['year' => $year])
        ->orderBy('round', 'desc')
        ->take(1)
        ->get();
        return $raceId;
    }


    public function thisFirstRace($year){        //return the last race of a season
        $raceId = DB::table('races')
        ->select('races.raceId')
        ->where(['year' => $year])
        ->orderBy('round', 'asc')
        ->take(1)
        ->get();
        return $raceId;
    }


    public function thisRacesDesc($year){       //return all races of a year on descending order
        $for_racesId = DB::table('races')
        ->select('raceId')
        ->where(['year' => $year])
        ->orderBy('round', 'desc')
        ->get();
        return $for_racesId;
    }

    

    public function year_and_round_to_id($year, $round){

        $data = DB::table('races')
        ->select('raceId')
        ->where(['year' => $year])
        ->where(['round' => $round])
        ->get();


        return $data;
    }



    public function thisRacePointSystem($year){

        $data = DB::table('season_descriptions')
        ->select('pointsSystem')
        ->where(['year' => $year])
        ->get();

        return $data;
    }



    public function previousRace($seasons){

        // Change the line below to your timezone!
        date_default_timezone_set('Europe/London');
        $date = date('Y/m/d', time());
        $date = str_replace("/", '-', $date );
        

        $raceId = DB::table('races')
        ->select('races.raceId')
        ->where(['year' => $seasons])
        ->whereDate('date', '<=', $date)
        ->orderBy('round', 'desc')
        ->take(1)
        ->get();


        return $raceId;
    }


    public function thisSprintRacePoints($raceId,$year){
        

        $data = DB::table('season_descriptions')
        ->select('sprintRacePoints')
        ->where(['year' => $year])
        ->get();

        if(isset($data[0]) && $data[0]->sprintRacePoints != null){
            $data2 = DB::table('sprint_results')
            ->select('raceId')
            ->where(['raceId' => $raceId])
            ->exists();
            
            if($data2){
                return $data[0]->sprintRacePoints;
            }else{
                return null;
            }


            
        }else{
            return null;
        }
        

    }


    public function thisFastestLapPoints($raceId, $year){

        $data = DB::table('season_descriptions')
        ->select('fastestLapPoints')
        ->where(['year' => $year])
        ->get();

        if(isset($data[0]) && $data[0]->fastestLapPoints != null){
            return $data[0]->fastestLapPoints;
        }else{
            return null;
        }
        
        
    }




    public function nextRace($seasons){

        // Change the line below to your timezone!
        date_default_timezone_set('Europe/London');
        $date = date('Y/m/d', time());
        $date = str_replace("/", '-', $date );
        

        $raceId = DB::table('races')
        ->select('races.*')
        ->where(['year' => $seasons])
        ->whereDate('date', '>=', $date)
        ->orderBy('round', 'asc')
        ->take(1)
        ->get();


        return $raceId;
    }


}
