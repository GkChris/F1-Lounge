<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\drivers;

class StatisticsController extends Controller
{

    public function index()
    {

        
        return view('statistics.index');
    }




    public function show($option){
        //Options to be updated
        $StatisticsOptions = array(
            'championships',
        );


        //Check if given URL contains an Statistics option
        if (in_array($option, $StatisticsOptions)){
            switch($option){
                case 'championships':
                    $data = new drivers;
                    $thisStatChampionships = $data->thisStatChampionships();
                    // return $thisStatChampionships;
                    return  view('statistics.show.'.$option, compact('thisStatChampionships'));
                    break;
                case 'constructor_results':

                    break;
                case 'constructor_standings':

                    break;
                case 'constructors':

                    break;
                case 'driver_standings':

                    break;
                case 'drivers':
                   
                    break;
                case 'lap_times':

                    break;
                case 'pit_stops':

                    break;
                case 'qualifying':

                    break;
                case 'races':

                    break;
                case 'results':

                    break;
                case 'seasons':

                    break;
                case 'status':

                    break;
                case 'sprint_races':

                    break;
                case 'season_descriptions':

                    break;
            }
            



        }else{
          return 'not in array';
        }





    }
}
