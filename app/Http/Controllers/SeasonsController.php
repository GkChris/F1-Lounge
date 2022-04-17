<?php

namespace App\Http\Controllers;

use App\seasons;
use Illuminate\Http\Request;

use App\races;
use App\drivers;
use App\constructors;
use App\driver_standings;
use App\constructor_standings;
use App\season_descriptions;
use App\posts;
use App\tags;
use App\results;

use Illuminate\Support\Facades\DB;

class SeasonsController extends Controller
{

    public function index()
    {
        $data = new seasons;
        $allSeasons = $data->allSeasons();
        // return $allSeasons;


        return view('seasons.index', compact('allSeasons'));
    }




    public function show($seasons)
    {
        
        if($seasons != '2022'){     //all seasons (no current)
            //Retrieving season data
            $season_data = new seasons;
            $thisSeason = $season_data->thisSeason($seasons);
            // return $thisSeason;



            //Retrieving race data of that season
            $race_data = new races;
            $thisRaces = $race_data->thisRaces($seasons);
            // return $thisRaces;


            //Retrieving last race data of that season
            $last_race_data = new races;
            $thisLastRace = $last_race_data->thisLastRace($seasons);
            // return $thisLastRace;


            //Retrieving races descending data of that season
            $last_races_data = new races;
            $thisLastRaces = $last_races_data->thisRacesDesc($seasons);
            // return $thisLastRaces;


            //Retrieving driver's standings data of that season
            $driverStandings_data = new driver_standings;
            $thisDriverStandings = $driverStandings_data->thisDriverStandings($thisLastRace);
            // return $thisDriverStandings;


            //Retrieving driver's team
            $Full_driverStandings_data = new drivers;
            $thisFullDriverStandings = $Full_driverStandings_data->addDriverTeam($thisDriverStandings, $thisLastRaces);
            // return $thisFullDriverStandings;

            //Add drivers' races on that season
            $Full_driverStandings_data = new drivers;
            $thisFullDriverStandings = $Full_driverStandings_data->addDriverRaces($thisFullDriverStandings, $thisRaces);
            // return $thisFullDriverStandings;



            //Retrieving constructor's standings data of that season
            $constructorStandings_data = new constructor_standings;
            $thisConstructorStandings = $constructorStandings_data->thisConstructorStandings($thisLastRace);
            // return $thisConstructorStandings;

            //Add constructors' races on that season
            $constructorStandings_data = new constructors;
            $thisConstructorStandings = $constructorStandings_data->addConstructorRaces($thisConstructorStandings, $thisRaces);
            // return $thisConstructorStandings;


            //Aadding data to thisSeason
            $numberOfCountries = new seasons;
            $thisSeason->noc = $numberOfCountries->thisNumberOfCountries($thisSeason);
            $thisSeason->rounds = count($thisRaces);
            $thisSeason->drivers = count($thisFullDriverStandings);
            $thisSeason->constructors = count($thisConstructorStandings);
            // return $thisSeason;


            //Retrieving season's info
            $data2 = new season_descriptions;
            $thisSeasonDescriptions = $data2->thisSeasonDescript($thisSeason->year);
            // return $thisSeasonDescriptions[0]->source;


            //Locate whitch posts to fetch by tags
            $data3 = new tags;
            $thisTags = $data3->season_show($thisSeason->year);
            // return $thisTags;


            //fetch posts adding tags
            $data4 = new posts;
            $thisPosts = $data4->fetch_post_by_tag($thisTags);
            // return $thisPosts;


            //exchange tag's id numbers to names
            $data5 = new posts;
            $thisPosts = $data5->id_to_name($thisPosts);
            // return $thisPosts;

            //get distinct race winners of that season
            $data6 = new results;
            $thisDistinctWinners = $data6->thisDistinctWinners($thisSeason->year);
            // return $thisDistinctWinners;
            $thisDistinctWinners = count($thisDistinctWinners);

            //get distinct race winners of that season for constructors
            $data7 = new results;
            $thisDistinctWinnersConstructors = $data7->thisDistinctWinnersConstructors($thisSeason->year);
            // return $thisDistinctWinnersConstructors;
            $thisDistinctWinnersConstructors = count($thisDistinctWinnersConstructors);


            //get distinct race podium finishers of that season
            $data8 = new results;
            $thisDistinctPodiumFinishers = $data8->thisDistinctPodiumFinishers($thisSeason->year);
            // return $thisDistinctPodiumFinishers;
            $thisDistinctPodiumFinishers = count($thisDistinctPodiumFinishers);

            //get distinct race podium finishers of that season for constructors
            $data9 = new results;
            $thisDistinctPodiumFinishersConstructors = $data9->thisDistinctPodiumFinishersConstructors($thisSeason->year);
            // return $thisDistinctPodiumFinishersConstructors;
            $thisDistinctPodiumFinishersConstructors = count($thisDistinctPodiumFinishersConstructors);
            


            return view('seasons.show', compact('thisSeason', 'thisRaces', 'thisFullDriverStandings', 
                'thisConstructorStandings', 'thisSeasonDescriptions', 'thisPosts',
                'thisDistinctWinners', 'thisDistinctWinnersConstructors', 'thisDistinctPodiumFinishers', 'thisDistinctPodiumFinishersConstructors'));


        }else{      //current season

            //Retrieving season data
            $season_data = new seasons;
            $thisSeason = $season_data->thisSeason($seasons);
            // return $thisSeason;

            //adding current round to season data
            $season_current = new seasons;
            $currRound = $season_current->currentSeasonRound($seasons);
            // return $currRound;
            $thisSeason->currentRound = $currRound;
            // return $thisSeason;

            //Retrieving race data of that season
            $race_data = new races;
            $thisRaces = $race_data->thisRaces($seasons);
            // return $thisRaces;


            //Retrieving last race data of that season
            $last_race_data = new races;
            $previousRace = $last_race_data->previousRace($seasons);
            // return $previousRace;

            //Retrieving next race data of that season
            $next_race_data = new races;
            $nextRace = $next_race_data->nextRace($seasons);
            // return $nextRace;


            //Retrieving races descending data of that season
            $last_races_data = new races;
            $thisLastRaces = $last_races_data->thisRacesDesc($seasons);
            // return $thisLastRaces;

            //Retrieving driver's standings data of that season
            $driverStandings_data = new driver_standings;
            $thisDriverStandings = $driverStandings_data->thisDriverStandings($previousRace);
            // return $thisDriverStandings;


            //Retrieving driver's team
            $Full_driverStandings_data = new drivers;
            $thisFullDriverStandings = $Full_driverStandings_data->addDriverTeam($thisDriverStandings, $thisLastRaces);
            // return $thisFullDriverStandings;

            //Add drivers' races on that season
            $Full_driverStandings_data = new drivers;
            $thisFullDriverStandings = $Full_driverStandings_data->addDriverRaces($thisFullDriverStandings, $thisRaces);
            // return $thisFullDriverStandings;


            //Retrieving constructor's standings data of that season
            $constructorStandings_data = new constructor_standings;
            $thisConstructorStandings = $constructorStandings_data->thisConstructorStandings($previousRace);
            // return $thisConstructorStandings;

            //Add constructors' races on that season
            $constructorStandings_data = new constructors;
            $thisConstructorStandings = $constructorStandings_data->addConstructorRaces($thisConstructorStandings, $thisRaces);
            // return $thisConstructorStandings;


            //Aadding data to thisSeason
            $numberOfCountries = new seasons;
            $thisSeason->noc = $numberOfCountries->thisNumberOfCountries($thisSeason);
            $thisSeason->rounds = count($thisRaces);
            $thisSeason->drivers = count($thisFullDriverStandings);
            $thisSeason->constructors = count($thisConstructorStandings);
            // return $thisSeason;


            //Retrieving season's info
            $data2 = new season_descriptions;
            $thisSeasonDescriptions = $data2->thisSeasonDescript($thisSeason->year);
            // return $thisSeasonDescriptions[0]->source;
            

            //Locate whitch posts to fetch by tags
            $data3 = new tags;
            $thisTags = $data3->season_show($thisSeason->year);
            // return $thisTags;


            //fetch posts adding tags
            $data4 = new posts;
            $thisPosts = $data4->fetch_post_by_tag($thisTags);
            // return $thisPosts;


            //exchange tag's id numbers to names
            $data5 = new posts;
            $thisPosts = $data5->id_to_name($thisPosts);
            // return $thisPosts;


            //Retrieving live weather
            $weather_data = new seasons;
            $thisWeatherData = $weather_data->liveSeasonWeather($nextRace);
            // return $thisWeatherData;

            //Retrieving last gp podium
            $podium_data = new seasons;
            $thisLastGpPodium = $podium_data->thisLastGpPodium();
            // return $thisLastGpPodium;

            //Retrieving next race countdown
            $countdown_data = new seasons;
            $thisNextGpCountdown = $countdown_data->thisNextGpCountdown();
            // return $thisNextGpCountdown;

            //Retrieving sprint race points
            $sprint_data = new seasons;
            $thisSprintRacePoints = $sprint_data->thisSprintRacePoints($thisSeason->year);
            // return $thisSprintRacePoints;

            //Retrieving fastest lap points
            $fastestLapPoints_data = new seasons;
            $thisFastestLapPoints = $fastestLapPoints_data->thisFastestLapPoints($thisSeason->year);
            // return $thisFastestLapPoints;

            //get distinct race winners of that season
            $data6 = new results;
            $thisDistinctWinners = $data6->thisDistinctWinners($thisSeason->year);
            // return $thisDistinctWinners;
            $thisDistinctWinners = count($thisDistinctWinners);

            //get distinct race winners of that season for constructors
            $data7 = new results;
            $thisDistinctWinnersConstructors = $data7->thisDistinctWinnersConstructors($thisSeason->year);
            // return $thisDistinctWinnersConstructors;
            $thisDistinctWinnersConstructors = count($thisDistinctWinnersConstructors);


            //get distinct race podium finishers of that season
            $data8 = new results;
            $thisDistinctPodiumFinishers = $data8->thisDistinctPodiumFinishers($thisSeason->year);
            // return $thisDistinctPodiumFinishers;
            $thisDistinctPodiumFinishers = count($thisDistinctPodiumFinishers);

            //get distinct race podium finishers of that season for constructors
            $data9 = new results;
            $thisDistinctPodiumFinishersConstructors = $data9->thisDistinctPodiumFinishersConstructors($thisSeason->year);
            // return $thisDistinctPodiumFinishersConstructors;
            $thisDistinctPodiumFinishersConstructors = count($thisDistinctPodiumFinishersConstructors);


            return view('seasons.current_season', compact('thisSeason', 'thisRaces', 'thisFullDriverStandings', 
            'thisConstructorStandings', 'thisSeasonDescriptions', 'thisPosts', 'thisLastGpPodium', 'thisNextGpCountdown',
            'thisSprintRacePoints', 'thisFastestLapPoints', 'thisWeatherData',  
            'thisDistinctWinners', 'thisDistinctWinnersConstructors', 'thisDistinctPodiumFinishers', 'thisDistinctPodiumFinishersConstructors'));
        }
        
       
    }





}
