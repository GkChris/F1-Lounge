<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\circuits;
use App\constructor_results;
use App\constructor_standings;
use App\constructors;
use App\driver_standings;
use App\drivers;
use App\lap_times;
use App\pit_stops;
use App\qualifying;
use App\races;
use App\results;
use App\seasons;
use App\status;
use App\sprint_races;


class UpdateDatabaseController extends Controller
{
    public function show($option){
        //Options to be updated
        $UpdatableOptions = array(
            'circuits',
            'constructor_results',   
            'constructor_standings',
            'constructors',        
            'driver_standings',      
            'drivers',              
            'lap_times',
            'pit_stops',             
            'qualifying',          
            'races',                
            'results',              
            'seasons',              
            'status',               
            'sprint_races', 
            'season_descriptions'
        );


        //Check if given URL contains an Updatable option
        if (in_array($option, $UpdatableOptions)){
            switch($option){
                case 'circuits':
                   
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
