<?php

namespace App;

use App\constructors;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class constructors extends Model
{
    protected $fillable = [
        'constructorId', 'constructorRef', 'name',
        'nationality', 'url',
    ];

    protected $primaryKey = 'constructorRef';

    public $incrementing = false;

    public function results()
    {
        return $this->hasMany('App\results', 'constructorId');
    }

    public function sprint_results(){
        return $this->hasMany('App\sprint_results', 'constructorId');
    }

    public function qualifying()
    {
        return $this->hasMany('App\qualifying', 'constructorId');
    }

    public function constructor_results()
    {
        return $this->hasMany('App\constructor_results', 'constructorId');
    }

    public function constructor_standings()
    {
        return $this->hasMany('App\constructor_standings', 'constructorId');
    }

    public function tags()
    {
        return $this->hasMany('App\tags', 'constructorId');
    }


    public function constructor_descriptions(){
        return $this->hasOne('App\constructor_descriptions', 'constructorId');
    }


    public function allConstructors(){      //return all constructors
        $data = Constructors::all();
        return $data;
    }

    public function thisConstructor($id){       //return specific constructor
        $data = Constructors::findOrFail($id);
        return $data;
    }

    
    public function allConstructorsByCountry(){

        $data = DB::table('Constructors')->orderBy('nationality')->paginate(10);

        $data = DB::table('Constructors')->get();
        foreach($data as $constructor){
            $results = DB::table('results')
            ->select('raceId')
            ->where(['constructorId' => $constructor->constructorId])
            ->orderBy('raceId', 'desc')
            ->take(999)
            ->get();
            $racesId = [];
            foreach($results as $res){
                array_push($racesId, $res->raceId);
            }

            $races = DB::table('races')
            ->select('year')
            ->whereIn('raceId', $racesId)
            ->orderBy('year', 'desc')
            ->take(1)
            ->get();


            if(isset($races[0])){
                $constructor->lastRace = $races[0]->year;
            }
            
            
        }


        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });

        return $data->sortByDesc('lastRace')->paginate(10);
    }


    public function addConstructorRaces($json, $seasonRacesId){       //add number of races a team participated on a season
        
        $racesId = json_decode(json_encode($seasonRacesId), true);

        foreach($json as $team){
            $sum = 0;
            for($i=0; $i<count($racesId); $i++){
                $data = DB::table('results')
                ->select('results.constructorId')
                ->where(['raceId' => $racesId[$i]['raceId']])
                ->where(['constructorId' => $team->constructorId])
                ->exists();

                if ($data) {
                    $sum += 1;
                }
            }

            $team->NumOfRaces = $sum;


        }
    
        return $json;

    }




    public function name_to_id($name){

        $data = DB::table('constructors')
        ->select('constructorId')
        ->where(['name' => $name])
        ->get();


        return $data;
    }



    public function thisConstructorParticipants($raceId){

        $data = DB::table('constructors')
        ->join('results', 'results.constructorId', '=', 'constructors.constructorId')
        ->select('constructors.*')
        ->distinct()
        ->where(['results.raceId' => strval($raceId)])
        ->get();

        return $data;
    }



    public function thisConstructorTotalWins($constructorId){

        $data = DB::table('results')
        ->select('results.*')
        ->where(['results.constructorId' => $constructorId])
        ->where('results.position', '=', '1')
        ->get();

        return count($data);
        
    }

    public function thisConstructorDebut($constructorId){

        $data = DB::table('races')
        ->join('results', 'results.raceId', '=', 'races.raceId')
        ->select('races.date', 'races.year', 'races.name')
        ->where(['results.constructorId' => $constructorId])
        ->orderBy('races.date', 'asc')
        ->take(1)
        ->get();

        

        if(isset($data[0])){
            $data[0]->date = str_replace("-", '/', $data[0]->date );
            return $data;
        }else{
            return null;
        }
        
        
    }

    public function thisConstructorLastRace($constructorId){

        $data = DB::table('races')
        ->join('results', 'results.raceId', '=', 'races.raceId')
        ->select('races.date', 'races.year', 'races.name')
        ->where(['results.constructorId' => $constructorId])
        ->orderBy('races.date', 'desc')
        ->take(1)
        ->get();

        if(isset($data[0])){
            $data[0]->date = str_replace("-", '/', $data[0]->date );
            return $data;
        }else{
            return null;
        }
        
    }


    public function thisConstructorTotalRaces($constructorId){

        $data = DB::table('races')
        ->join('results', 'results.raceId', '=', 'races.raceId')
        ->select('races.raceId')
        ->distinct()
        ->where(['results.constructorId' => $constructorId])
        ->get();

        return count($data);
        
    }


    public function thisConstructorTotalPodiums($constructorId){

        $data = DB::table('races')
        ->join('results', 'results.raceId', '=', 'races.raceId')
        ->select('results.resultId')
        ->where(['results.constructorId' => $constructorId])
        ->whereBetween('results.position', ['1', '3'])
        ->get();

        return count($data);
        
    }



    
    public function thisConstructorTotalPoles($constructorId){

        $data = DB::table('results')
        ->select('results.*')
        ->where(['results.constructorId' => $constructorId])
        ->where('results.grid', '1')
        ->get();

        return count($data);
        
    }



    
    public function thisConstructorTotalPoints($constructorId){

        $data = DB::table('results')
        ->select('results.points')
        ->where(['results.constructorId' => $constructorId])
        ->sum('results.points');

        if($data - intval($data) == 0){
            $data = intval($data);
        }

        return $data;
        
    }




    public function thisConstructorTotalDrivers($constructorId){

        $data = DB::table('results')
        ->select('results.driverId')
        ->distinct()
        ->where(['results.constructorId' => $constructorId])
        ->get();

        return $data;
        
    }



    
    public function thisConstructorTotalOneTwoFinishes($constructorId){

        $data = DB::table('results')
        ->select('results.raceId')
        ->where(['results.constructorId' => $constructorId])
        ->where(['results.position' => '1'])
        ->get();

        $oneTwo = [];
        foreach($data as $dt){
            $data2 = DB::table('results')
            ->select('results.raceId')
            ->where(['results.constructorId' => $constructorId])
            ->where(['results.raceId' => $dt->raceId])
            ->where(['results.position' => '2'])
            ->get();
            if(isset($data2[0])){
                array_push($oneTwo, $data2[0]->raceId);
            }
        }


        return $oneTwo;
        
    }



    public function thisConstructorTotalFrontRowLockouts($constructorId){

        $data = DB::table('results')
        ->select('results.raceId')
        ->where(['results.constructorId' => $constructorId])
        ->where(['results.grid' => '1'])
        ->get();

        $oneTwo = [];
        foreach($data as $dt){
            $data2 = DB::table('results')
            ->select('results.raceId')
            ->where(['results.constructorId' => $constructorId])
            ->where(['results.raceId' => $dt->raceId])
            ->where(['results.grid' => '2'])
            ->get();
            if(isset($data2[0])){
                array_push($oneTwo, $data2[0]->raceId);
            }
        }


        return $oneTwo;
        
    }



    public function thisConstructorChampionships($constructorId){

    
        $data = DB::table('seasons')
        ->select('year')
        ->whereBetween('year', ['1950', '2022'])
        ->get();

        
        $lastRacesId = [];
        foreach($data as $year){
            $data2 = DB::table('races')
            ->select('races.raceId')
            ->where(['year' => $year->year])
            ->orderBy('round', 'desc')
            ->take(1)
            ->get();
            array_push($lastRacesId, $data2[0]->raceId);
        }

        // return $lastRacesId;
        $allChamps = [];
        for($i = 0; $i < count($lastRacesId); $i++){
            $data3 = DB::table('constructor_standings')
            ->select('*')
            ->where(['raceId' => $lastRacesId[$i]])
            ->where(['constructorId' => $constructorId])
            ->where(['position' => '1'])
            ->get();
            if(isset($data3[0])){
                array_push($allChamps, $data3[0]->constructorId);
            }
        }

        return count($allChamps);
        
    }


    public function thisConstructorSeasonEntries($constructorId){

        $data = DB::table('results')
        ->join('races', 'races.raceId', '=', 'results.raceId')
        ->select('races.year')
        ->distinct()
        ->where(['results.constructorId' => $constructorId])
        ->get();

        return $data;
        
    }


    public function thisConstructorBestRaceFinish($constructorId){

        $data = DB::table('results')
        ->select('results.position')
        ->where(['results.constructorId' => $constructorId])
        ->orderBy('results.position', 'asc')
        ->take(1)  
        ->get();

        

        return $data;
        
    }


    public function thisConstructorBestQualifyFinish($constructorId){

        $data = DB::table('qualifying')
        ->select('qualifying.position')
        ->where(['qualifying.constructorId' => $constructorId])
        ->orderBy('qualifying.position', 'asc')
        ->take(1)  
        ->get();

        

        return $data;
        
    }



    public function thisConstructorTotalRetirements($constructorId){

        $data = DB::table('results')
        ->select('results.positionText')
        ->where(['results.constructorId' => $constructorId])
        ->where(['results.positionText' => 'R'])
        ->get();


        return count($data);
        
    }



    public function thisConstructorTotalPointFinishes($constructorId){

        $data = DB::table('results')
        ->select('results.raceId')
        ->distinct()
        ->where(['results.constructorId' => $constructorId])
        ->whereBetween('results.points', ['1', '10000'])
        ->get();

        return $data;
        
    }


    //Has to be manually
    public function thisConstructorActiveLineup($constructorId){

        $data = DB::table('constructor_descriptions')
        ->select('status')
        ->where(['constructorId' => $constructorId])
        ->get();

        if($data[0]->status == 'Active Formula 1 Constructor'){

            $teamLineup = new constructors;
            switch($constructorId){
                case '131':     //Mercedes
                    $driverId_1 = 1;     //Hamilton
                    $driverId_2 = 847;     //Russel
                    break;
                case '9':       //red bull
                    $driverId_1 = 830;     //Verstappen
                    $driverId_2 = 815;     //Perez
                    break;
                case '6':       //Ferrari
                    $driverId_1 = 844;     //Leclerc
                    $driverId_2 = 832;     //Sainz
                    break;
                case '1':       //mclaren
                    $driverId_1 = 846;     //Norris
                    $driverId_2 = 817;     //Ricciardo
                    break;
                case '214':     //Alpine
                    $driverId_1 = 4;     //Alonso
                    $driverId_2 = 839;     //Ocon
                    break;
                case '213':       //Alpha tauri
                    $driverId_1 = 842;     //Gasly
                    $driverId_2 = 852;     //Tsunoda
                    break;
                case '117':     //Aston martin
                    $driverId_1 = 20;     //Vettel    
                    $driverId_2 = 840;     //Stroll
                    break;
                case '3':       //Williams
                    $driverId_1 = 849;     //Latifi
                    $driverId_2 = 848;     //Albon
                    break;
                case '51':     //Alfa romeo
                    $driverId_1 = 822;     //Bottas
                    $driverId_2 = 855;     //Zhou
                    break;
                case '210':       //Haas
                    $driverId_1 = 854;     //Schumacher
                    $driverId_2 = 825;     //Magnussen
                    break;
            }

            
            $data2 = DB::table('drivers')
            ->select('forename', 'surname', 'driverRef')
            ->where(['driverId' => $driverId_1])
            ->get();
            $data3= DB::table('drivers')
            ->select('forename', 'surname', 'driverRef')
            ->where(['driverId' => $driverId_2])
            ->get();

            $teamLineup->driver1 = $data2[0]->forename.' '.$data2[0]->surname;
            $teamLineup->driver2 = $data3[0]->forename.' '.$data3[0]->surname;
            $teamLineup->driver1Ref = $data2[0]->driverRef;
            $teamLineup->driver2Ref = $data3[0]->driverRef;
            return $teamLineup;
        }else{
            return null;
        }
    

    }



    public function allConstructorsDistinctCountries(){
        $data = DB::table('constructors')
        ->select('nationality')
        ->distinct()
        ->count('nationality');

        return $data;

    }




    public function thisConstructorBestSeasonFinish($constructorId){

        $data = DB::table('results')
        ->join('races', 'races.raceId', '=', 'results.raceId')
        ->select('races.year')
        ->where(['results.constructorId' => $constructorId])
        ->distinct('races.year')
        ->get();
        

        $racesId = [];
        foreach($data as $year){
            $data2 = DB::table('races')
            ->select('raceId')
            ->where(['year' => $year->year])
            ->orderBy('round', 'desc')
            ->take(1)
            ->get();
            array_push($racesId, $data2[0]->raceId);
        }



        $data3 = DB::table('constructor_standings')
        ->select('position')
        ->whereIn('raceId', $racesId)
        ->where(['constructorId' => $constructorId])
        ->orderBy('position', 'asc')
        ->take(1)
        ->get();





        return $data3;

    }




    public function thisConstructorDriversChampionships($constructorId){

        $data = DB::table('results')
        ->join('races', 'races.raceId', '=', 'results.raceId')
        ->select('races.year')
        ->where(['results.constructorId' => $constructorId])
        ->distinct('races.year')
        ->get();
        $yearsArray = [];
        foreach($data as $year){
            array_push($yearsArray, $year->year);
        }
        

        $racesId = [];
        foreach($data as $year){
            $data2 = DB::table('races')
            ->select('raceId')
            ->where(['year' => $year->year])
            ->orderBy('round', 'desc')
            ->take(1)
            ->get();
            array_push($racesId, $data2[0]->raceId);
        }


        $champs = [];
        for($i=0;$i<count($racesId);$i++){
            $data3 = DB::table('driver_standings')
            ->select('driverId')
            ->where(['raceId' => $racesId[$i]])
            ->orderBy('position', 'asc')
            ->take(1)
            ->get();
            
            if(isset($data3[0]->driverId)){
                array_push($champs, $data3[0]->driverId);
            }
            
        }


        $champs_for_team = [];
        for($j=0;$j<count($champs);$j++){
            $data4 = DB::table('results')
            ->join('races', 'races.raceId', '=', 'results.raceId')
            ->select('results.constructorId', 'results.driverId')
            ->where(['driverId' => $champs[$j]])
            ->where(['races.year' => $yearsArray[$j]])
            ->orderBy('races.round', 'desc')
            ->get();

            if(isset($data4[0]->constructorId) && isset($data4[0]->driverId) && $data4[0]->constructorId == $constructorId){
                array_push($champs_for_team, $data4[0]->driverId);
            }
        }



        return $champs_for_team;
    }


}
