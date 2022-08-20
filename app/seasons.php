<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class seasons extends Model
{
    protected $fillable = [
        'year', 'url',
    ];

    protected $primaryKey = 'year';


    public function season_descriptions(){
        return $this->hasOne('App\season_descriptions', 'year');
    }


    public function races()
    {
        return $this->hasMany('App\races', 'year');
    }

    public function tags()
    {
        return $this->hasMany('App\tags', 'year');
    }

    public function allSeasons(){       //return all seasons
        $data = Seasons::all();
        return $data;
    }

    public function thisSeason($id){        //return specific season
        $data = Seasons::findOrFail($id);
        return $data;
    }


    public function thisNumberOfCountries($season){     //return the number of countries participated in that season


        $for_noc = DB::table('races')
        ->join('circuits', 'circuits.circuitId', '=', 'races.circuitId')
        ->select('circuits.country')
        ->where(['races.year' => $season->year])
        ->get();
        $noc = json_decode(json_encode($for_noc), true);
    
        $nocCountries = [];
        for($i=0; $i <count($noc); $i++){
            array_push($nocCountries, $noc[$i]['country']);
        }
        $ncc = array_unique($nocCountries);
        $final_noc = count($ncc);
        return $final_noc;
    }




    public function currentSeasonRound($seasons){

        // // Change the line below to your timezone!
        // date_default_timezone_set('Europe/London');
        // $date = date('Y/m/d', time());
        // $date = str_replace("/", '-', $date );
        // // $date = '2022-03-26';

        // $round = DB::table('races')
        // ->select('races.round')
        // ->where(['year' => $seasons])
        // ->whereDate('date', '<=', $date)
        // ->orderBy('round', 'desc')
        // ->take(1)
        // ->get();

        // $round2 = DB::table('races')
        // ->select('races.round')
        // ->where(['year' => $seasons])
        // ->orderBy('round', 'desc')
        // ->take(1)
        // ->get();


        // if($round < $round2){
        //     return $round[0]->round+1;
        // }else{
        //     return '-';
        // }

        date_default_timezone_set('UTC');
        $date = date('Y-m-d', time());
        

        $raceId = DB::table('races')
        ->select('races.raceId', 'races.time', 'races.date')
        ->where(['year' => $seasons])
        ->whereDate('date', '<=', $date)
        ->orderBy('round', 'desc')
        ->take(1)
        ->get();

        

        $date1=date_create($date);
        $date2=date_create($raceId[0]->date.' '.$raceId[0]->time);
        $diff=date_diff($date1,$date2);

        if($diff->format('%d') < '1'){
            $raceId = DB::table('races')
            ->select('races.round')
            ->where(['year' => $seasons])
            ->whereDate('date', '<', $date)
            ->orderBy('round', 'desc')
            ->take(1)
            ->get();
            return $raceId[0]->round+1;
        }else{
            $raceId = DB::table('races')
            ->select('races.round')
            ->where(['year' => $seasons])
            ->whereDate('date', '<=', $date)
            ->orderBy('round', 'desc')
            ->take(1)
            ->get();
            return $raceId[0]->round+1;
        }
        
    }



    public function thisLastGpPodium($seasons){

        // // Change the line below to your timezone!
        // date_default_timezone_set('Europe/London');
        // $date = date('Y/m/d', time());
        // $date = str_replace("/", '-', $date );
        // // $date = '2022-03-26';


        // $raceId = DB::table('races')
        // ->select('races.raceId')
        // ->whereDate('date', '<=', $date)
        // ->orderBy('date', 'desc')
        // ->take(1)
        // ->get();
        date_default_timezone_set('UTC');
        $date = date('Y-m-d', time());
        

        $raceId = DB::table('races')
        ->select('races.raceId', 'races.time', 'races.date')
        ->where(['year' => $seasons])
        ->whereDate('date', '<=', $date)
        ->orderBy('round', 'desc')
        ->take(1)
        ->get();

        

        $date1=date_create($date);
        $date2=date_create($raceId[0]->date.' '.$raceId[0]->time);
        $diff=date_diff($date1,$date2);

        if($diff->format('%d') < '1'){
            $raceId = DB::table('races')
            ->select('races.raceId')
            ->where(['year' => $seasons])
            ->whereDate('date', '<', $date)
            ->orderBy('round', 'desc')
            ->take(1)
            ->get();
            // return $raceId;
        }else{
            $raceId = DB::table('races')
            ->select('races.raceId')
            ->where(['year' => $seasons])
            ->whereDate('date', '<=', $date)
            ->orderBy('round', 'desc')
            ->take(1)
            ->get();
            // return $raceId;
        }



        $podium = DB::table('results')
        ->join('drivers', 'drivers.driverId', '=', 'results.driverId')
        ->select('drivers.forename', 'drivers.surname', 'drivers.driverRef')
        ->where(['results.raceId' => $raceId[0]->raceId ])
        ->orderBy('position', 'asc')
        ->take(3)
        ->get();



        return $podium;
    }



    public function thisNextGpCountdown(){
        // Change the line below to your timezone!
        date_default_timezone_set('UTC');
        $daydate = date('Y-m-d', time());
        $date = date('Y-m-d H:i:s', time());
        // $date = '2022-03-26 13:00:00';


        $raceDate = DB::table('races')
        ->select('races.date', 'races.time')
        ->whereDate('date', '>=', $daydate)
        ->orderBy('date', 'asc')
        ->take(1)
        ->get();

        $date1=date_create($date);
        $date2=date_create($raceDate[0]->date.' '.$raceDate[0]->time);
        $diff=date_diff($date1,$date2);

        
   
        return $diff->format("%a day(s), %H hour(s), %i minute(s)");
    }



    public function thisSprintRacePoints($year){
        

        $data = DB::table('season_descriptions')
        ->select('sprintRacePoints')
        ->where(['year' => $year])
        ->get();

      
        return $data[0]->sprintRacePoints;

    }


    public function thisFastestLapPoints($year){

        $data = DB::table('season_descriptions')
        ->select('fastestLapPoints')
        ->where(['year' => $year])
        ->get();

      
        return $data[0]->fastestLapPoints;
        
    }





    public function liveSeasonWeather($nextRace){



        $data = DB::table('circuits')
        ->select('lat', 'lng')
        ->where(['circuitId' => $nextRace[0]->circuitId])
        ->get();

        // return $data[0]->lat;

        $lat = $data[0]->lat;
        $lng = $data[0]->lng;
        $key = '4d1b49c9b5e643c69cf201038220704';
        $days = '1';
        $aqi = 'yes';
        $alert = 'yes';

        $oneLineForecast = 'http://api.weatherapi.com/v1/forecast.json?key='.$key.'&q='.$lat.','.$lng.'&days='.$days.'&aqi=yes&alerts='.$alert;
        $oneLine = 'http://api.weatherapi.com/v1/current.json?key='.$key.'&q='.$lat.','.$lng.'&aqi='.$aqi;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $oneLine,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            return null;
        } else {
            $x = json_decode($response, true);
            $current = $x['current'];

            $temp = $current['temp_c'];
            $wind = $current['wind_kph'];
            $humidity = $current['humidity'];
            $cloud = $current['cloud'];
            $feelslike = $current['feelslike_c'];

            $condition = $current['condition'];
            $weather = $condition['text'];

            $weatherData = array(
                'Temperature' => $temp.'°C',
                'Wind' => $wind.'Km/h',
                'Humidity' => $humidity.'%',
                'Clouds' => $cloud.'%',
                'Feels Like' => $feelslike.'°C',
                'Weather' => $weather
            );


            return $weatherData;

         
        }

    }
    
}