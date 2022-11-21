<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class drivers extends Model
{
    protected $fillable = [
        'driverId', 'driverRef', 'number',
        'code', 'forname', 'surname',
        'dob', 'nationality', 'url',
    ];

    protected $primaryKey = 'driverRef';

    public $incrementing = false;

    public function driver_standings()
    {
        return $this->hasMany('App\driver_standings', 'driverId');
    }

    public function sprint_results(){
        return $this->hasMany('App\sprint_results', 'driverId');
    }

    public function tags()
    {
        return $this->hasMany('App\tags', 'driverId');
    }

    public function results()
    {
        return $this->hasMany('App\results', 'driverId');
    }

    public function qualifying()
    {
        return $this->hasMany('App\qualifying', 'driverId');
    }

    public function pit_stops()
    {
        return $this->hasMany('App\pit_stops', 'driverId');
    }

    public function lap_times()
    {
        return $this->hasMany('App\lap_times', 'driverId');
    }


    public function driver_descriptions(){
        return $this->hasOne('App\driver_descriptions', 'driverId');
    }


    public function allDrivers(){       //return all drivers
        $data = Drivers::all();
        return $data;
    }

    public function allDriversByYear(){

        $data = DB::table('Drivers')->orderBy('dob', 'desc')->paginate(10);

        return $data;
    }

    public function thisDriver($id){        //return specific driver
        $data = Drivers::findOrFail($id);
        return $data;
    }



    public function addDriverTeam($json, $descRacesId){     //return a json of driver(s) with their team of that season added


        $racesId = json_decode(json_encode($descRacesId), true);
        
    

        foreach($json as $driver){
            for($i=0; $i<count($racesId); $i++){
                if(isset($raceId)){unset($raceId);}
                if(isset($raceId)){unset($for_raceId);}
                $for_raceId = DB::table('constructors')
                ->join('results', 'results.constructorId', '=', 'constructors.constructorId')
                ->select('constructors.constructorRef', 'constructors.name')
                ->where(['raceId' => $racesId[$i]['raceId']])
                ->where(['driverId' => $driver->driverId])
                ->get();
                $raceId = json_decode(json_encode($for_raceId), true);
                if(!empty($raceId)){
                    $driver->constructorRef = $raceId[0]['constructorRef'];
                    $driver->constructorName = $raceId[0]['name'];
                    break;
                }
            }
        }
       
        return $json;
    }


    public function addDriverRaces($json, $seasonRacesId){       //add number of races a driver participated on a season

        $racesId = json_decode(json_encode($seasonRacesId), true);

        foreach($json as $driver){
            $sum = 0;
            for($i=0; $i<count($racesId); $i++){
                $data = DB::table('results')
                ->select('results.driverId')
                ->where(['raceId' => $racesId[$i]['raceId']])
                ->where(['driverId' => $driver->driverId])
                ->exists();

                if ($data) {
                    $sum += 1;
                }
            }

            $driver->NumOfRaces = $sum;


        }
    
        return $json;

    }



    public function name_to_id($name){

        $nameSeparator = explode(' ',trim($name));
        // echo $nameSeparator[0]; // will print Test

        $data = DB::table('drivers')
        ->select('driverId')
        ->where(['forename' => $nameSeparator[0]])
        ->where(['surname' => $nameSeparator[1]])
        ->get();


        return $data;
    }



    public function thisDriverDebut($driverId){

        $data = DB::table('races')
        ->join('results', 'results.raceId', '=', 'races.raceId')
        ->select('races.date', 'races.year', 'races.name')
        ->where(['results.driverId' => $driverId])
        ->orderBy('races.date', 'asc')
        ->take(1)
        ->get();

        $data[0]->date = str_replace('-', '/', $data[0]->date);

        return $data;
        
    }

    public function thisDriverLastRace($driverId){

        $data = DB::table('races')
        ->join('results', 'results.raceId', '=', 'races.raceId')
        ->select('races.date', 'races.year', 'races.name')
        ->where(['results.driverId' => $driverId])
        ->orderBy('races.date', 'desc')
        ->take(1)
        ->get();

        $data[0]->date = str_replace('-', '/', $data[0]->date);
        return $data;
        
    }


    public function thisDriverTotalRaces($driverId){

        $data = DB::table('races')
        ->join('results', 'results.raceId', '=', 'races.raceId')
        ->select('races.raceId')
        ->where(['results.driverId' => $driverId])
        ->get();

        return count($data);
        
    }


    public function thisDriverTotalWins($driverId){

        $data = DB::table('results')
        ->select('results.*')
        ->where(['results.driverId' => $driverId])
        ->where('results.position', '=', '1')
        ->get();

        return count($data);
        
    }


    public function thisDriverTotalPodiums($driverId){

        $data = DB::table('results')
        ->select('results.*')
        ->where(['results.driverId' => $driverId])
        ->whereBetween('results.position', ['1', '3'])
        ->get();

        return count($data);
        
    }


    public function thisDriverTotalFastestLaps($driverId){

        $data = DB::table('results')
        ->select('results.*')
        ->where(['results.driverId' => $driverId])
        ->where('results.rank', '1')
        ->get();

        return count($data);
        
    }


    public function thisDriverTotalPoints($driverId){

        $data = DB::table('results')
        ->select('results.points')
        ->where(['results.driverId' => $driverId])
        ->sum('results.points');

        if($data - intval($data) == 0){
            $data = intval($data);
        }

        return $data;
        
    }


    public function thisDriverChampionships($driverId){

    
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
            $data3 = DB::table('driver_standings')
            ->select('*')
            ->where(['raceId' => $lastRacesId[$i]])
            ->where(['driverId' => $driverId])
            ->where(['position' => '1'])
            ->get();
            if(isset($data3[0])){
                array_push($allChamps, $data3[0]->driverId);
            }
        }

        return count($allChamps);
        
    }


    public function thisDriverTotalRetirements($driverId){

        $data = DB::table('results')
        ->select('results.positionText')
        ->where(['results.driverId' => $driverId])
        ->where(['results.positionText' => 'R'])
        ->get();


        return count($data);
        
    }



    public function thisDriverTotalConstructors($driverId){

        $data = DB::table('results')
        ->select('results.constructorId')
        ->distinct()
        ->where(['results.driverId' => $driverId])
        ->get();

        return $data;
        
    }


    public function thisDriverTotalPoles($driverId){

        $data = DB::table('results')
        ->select('results.grid')
        ->where(['grid' => '1'])
        ->where(['results.driverId' => $driverId])
        ->get();

        return count($data);
        
    }


    public function thisDriverSeasonEntries($driverId){

        $data = DB::table('results')
        ->join('races', 'races.raceId', '=', 'results.raceId')
        ->select('races.year')
        ->distinct()
        ->where(['results.driverId' => $driverId])
        ->get();

        return $data;
        
    }


    public function thisDriverTotalWinsFromPole($driverId){

        $data = DB::table('results')
        ->select('results.raceId')
        ->where(['grid' => '1'])
        ->where(['position' => '1'])
        ->where(['results.driverId' => $driverId])
        ->get();

        return $data;
        
    }


    public function thisDriverTotalFrontRowStarts($driverId){

        $data = DB::table('results')
        ->select('results.raceId')
        ->where(['results.driverId' => $driverId])
        ->whereBetween('results.grid', ['1', '2'])
        ->get();

        return $data;
        
    }


    public function thisDriverTotalPointFinishes($driverId){

        $data = DB::table('results')
        ->select('results.raceId')
        ->where(['results.driverId' => $driverId])
        ->whereBetween('results.points', ['1', '10000'])
        ->get();

        return $data;
        
    }


    public function thisDriverTotalCareerLaps($driverId){

        $data = DB::table('results')
        ->select('results.laps')
        ->where(['results.driverId' => $driverId])
        ->sum('results.laps');

        return $data;
        
    }

    public function thisDriverTotalGrandSlams($driverId){

        $data = DB::table('results')
        ->join('qualifying', 'qualifying.raceId', '=', 'results.raceId')
        ->select('results.laps', 'results.raceId')
        ->where(['results.driverId' => $driverId])
        ->where(['results.grid' => '1'])
        ->where(['results.rank' => '1'])
        ->where(['qualifying.position' => '1'])
        ->where(['results.position' => '1'])
        ->get();

        
        $grand_slams = 0;
        foreach($data as $dt){
            $data2 = DB::table('lap_times')
            ->select('lap_times.position')
            ->where(['lap_times.driverId' => $driverId])
            ->where(['lap_times.raceId' => $dt->raceId])
            ->where(['lap_times.position' => '1'])
            ->get();
            if($dt->laps == count($data2)){
                $grand_slams += 1;
            }
        }


        return $grand_slams;
        
    }


    public function thisDriverAge($driverId){
        date_default_timezone_set('Europe/London');
        $date = date('Y/m/d', time());
        $date = str_replace("/", '-', $date );

        $data = DB::table('drivers')
        ->select('dob')
        ->where(['driverId' => $driverId])
        ->get();


        $datetime1 = date_create($date);
        $datetime2 = date_create($data[0]->dob);
       
        $interval = $datetime1->diff($datetime2);
        // $diffInSeconds = $interval->s; //45
        // $diffInMinutes = $interval->i; //23
        // $diffInHours   = $interval->h; //8
        // $diffInDays    = $interval->d; //21
        // $diffInMonths  = $interval->m; //4
        $diffInYears   = $interval->y; //1

        return strval($diffInYears);
    }


    public function thisDriverBestRaceFinish($driverId){

        $data = DB::table('results')
        ->select('results.position')
        ->where(['results.driverId' => $driverId])
        ->orderBy('results.position', 'asc')
        ->take(1)  
        ->get();

        

        return $data;
        
    }


    public function thisDriverBestQualifyFinish($driverId){

        $data = DB::table('qualifying')
        ->select('qualifying.position')
        ->where(['qualifying.driverId' => $driverId])
        ->orderBy('qualifying.position', 'asc')
        ->take(1)  
        ->get();

        

        return $data;
        
    }


        //Has to be manually
        public function thisDriverActiveTeam($driverId){

            $data = DB::table('driver_descriptions')
            ->select('status')
            ->where(['driverId' => $driverId])
            ->get();
    
            if($data[0]->status == 'Contract - Active Formula 1 Driver'){
    
                $drivingFor = new drivers;
                switch($driverId){
                    case '1':     //Hamilton
                        $constructorId = 131;     //Mercedes
                        break;
                    case '847':       //Russel
                        $constructorId = 131;     //Mercedes
                        break;
                    case '830':       //Verstappenn
                        $constructorId = 9;     //Red Bull
                        break;
                    case '815':       //Perez
                        $constructorId = 9;     //Red Bull
                        break;
                    case '844':     //Leclerc
                        $constructorId = 6;     //Ferrari
                        break;
                    case '832':       //Sainz
                        $constructorId = 6;     //Ferrari
                        break;
                    case '846':     //Norris
                        $constructorId = 1;     //McLaren    
                        break;
                    case '817':       //Ricciardo
                        $constructorId = 1;     //McLaren
                        break;
                    case '4':     //Alonso
                        $constructorId = 214;     //Alpine
                        break;
                    case '839':       //Ocon
                        $constructorId = 214;     //Alpine
                        break;
                    case '842':     //Gasly
                        $constructorId = 213;     //Alpha Tauri
                        break;
                    case '852':       //Tsunoda
                        $constructorId = 213;     //Alpha Tauri
                        break;
                    case '20':       //Vettel
                        $constructorId = 117;     //Aston Martin
                        break;
                    case '840':       //Stroll
                        $constructorId = 117;     //Aston Martin
                        break;
                    case '849':     //Latifi
                        $constructorId = 3;     //Williams
                        break;
                    case '848':       //Albon
                        $constructorId = 3;     //Williams
                        break;
                    case '822':     //Bottas
                        $constructorId = 51;     //Alfa Romeo    
                        break;
                    case '855':       //Zhou
                        $constructorId = 51;     //Alfa Romeo
                        break;
                    case '854':     //Schumacher
                        $constructorId = 210;     //Haas
                        break;
                    case '825':       //Magnussen
                        $constructorId = 210;     //Haas
                        break;
                }
    
                
                $data2 = DB::table('constructors')
                ->select('constructorRef', 'name')
                ->where(['constructorId' => $constructorId])
                ->get();

    
                $drivingFor->constructor = $data2[0]->name;
                $drivingFor->constructorRef = $data2[0]->constructorRef;
                return $drivingFor;
            }else{
                return null;
            }
        
    
        }



        public function allDriversDistinctCountries(){
            $data = DB::table('drivers')
            ->select('nationality')
            ->distinct()
            ->count('nationality');

            return $data;

        }



        public function thisDriverBestSeasonFinish($driverId){

            $data = DB::table('results')
            ->join('races', 'races.raceId', '=', 'results.raceId')
            ->select('races.year')
            ->where(['results.driverId' => $driverId])
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



            $data3 = DB::table('driver_standings')
            ->select('position')
            ->whereIn('raceId', $racesId)
            ->where(['driverId' => $driverId])
            ->orderBy('position', 'asc')
            ->take(1)
            ->get();




    
            return $data3;

        }


        public function thisStatChampionships(){

            $dr = DB::table('drivers')
            ->select('driverId')
            ->get();


            $data = DB::table('seasons')
            ->select('year')
            ->get();

            
            $lastRacesId = [];
            foreach($data as $year){
                $data2 = DB::table('races')
                ->select('races.raceId')
                ->where(['year' => $year->year])
                // ->where('year', '!=', '2005')
                ->orderBy('round', 'desc')
                ->take(1)
                ->get();
                if(isset( $data2[0]->raceId)){
                    array_push($lastRacesId, $data2[0]->raceId);
                }
                
            }


            $data3 = DB::table('driver_standings')
            ->join('drivers', 'drivers.driverId', '=', 'driver_standings.driverId')
            ->select('drivers.surname','drivers.driverRef','drivers.forename', DB::raw('count(*) as total'))
            ->groupBy('driver_standings.driverId')
            ->where(['driver_standings.position' => '1'])
            ->whereIn('driver_standings.raceId', $lastRacesId)
            ->orderBy('total', 'desc')
            ->get();

            return $data3;
    }
}
