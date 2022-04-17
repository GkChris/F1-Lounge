<?php

namespace App\Http\Controllers;

use App\races;
use App\circuits;
use App\drivers;
use App\constructors;
use App\driver_standings;
use App\constructor_standings;
use App\results;
use App\qualifying;
use App\pit_stops;
use App\race_descriptions;
use App\posts;
use App\tags;
use App\sprint_results;

use Illuminate\Http\Request;

class RacesController extends Controller
{

    public function index()
    {
        $data = new races;
        $allRaces = $data->allRaces();
        return $allRaces;
    }

    public function show($year, $round)
    {
        $data = new races;
        $thisRace = $data->thisRace($year, $round);
        // return $thisRace;

        $circuit_data = new circuits;
        $thisCircuit = $circuit_data->thisCircuit($thisRace->circuitId);
        // return $thisCircuit;


        //Retrieving races descending data of that season
        $last_races_data = new races;
        $thisLastRaces = $last_races_data->thisRacesDesc($year);
        // return $thisLastRaces;

        
        //Retrieving driver's standings data of that season
        $driverStandings_data = new driver_standings;
        $thisDriverStandings = $driverStandings_data->thisDriverStandings($thisRace->raceId);
        // return $thisDriverStandings;


        //Retrieving driver's team
        $Full_driverStandings_data = new drivers;
        $thisFullDriverStandings = $Full_driverStandings_data->addDriverTeam($thisDriverStandings, $thisLastRaces);
        // return $thisFullDriverStandings;


        //Retrieving constructor's standings data of that season
        $constructorStandings_data = new constructor_standings;
        $thisConstructorStandings = $constructorStandings_data->thisConstructorStandings($thisRace->raceId);
        // return $thisConstructorStandings;


        //Retrieving race results data of that race
        $results_data = new results;
        $thisFullResults = $results_data->thisFullResults($thisRace->raceId);
        // return $thisFullResults;


        //Retrieving qualifying results data of that race
        $qualifying_data = new qualifying;
        $thisFullQualifying = $qualifying_data->thisFullQualifying($thisRace->raceId);
        // return $thisFullQualifying;


        //Retrieving pit stop data of that race by time order
        $pitStop_data = new pit_stops;
        $thisRacePitStops = $pitStop_data->thisRacePitStops($thisRace->raceId);
        // return $thisRacePitStops;


        //Retrieving last race of season Id
        $last_race = new races;
        $thisLastRace = $last_race->thisLastRace($year);
        // return $thisLastRace;

        //Retrieving first race of season Id
        $first_race = new races;
        $thisFirstRace = $first_race->thisFirstRace($year);
        // return $thisFirstRace;

        //Retrieving last race of the season with standings available 
        $current_this_season_standings_id = new driver_standings;
        $thisCurrentSeasonLastRaceId = $current_this_season_standings_id->thisCurrentSeasonLastRaceId($thisLastRaces);
        // return $thisCurrentSeasonLastRaceId[0]->raceId;

        //Retrieving driver's standings data of that season after end
        $driverStandingsEndOfSeason_data = new driver_standings;
        if($thisCurrentSeasonLastRaceId[0]->raceId != $thisLastRace[0]->raceId){
            $thisSeasonDriverStandings = $driverStandingsEndOfSeason_data->thisDriverStandings($thisCurrentSeasonLastRaceId);
            // return $thisSeasonDriverStandings;
        }else{
            $thisSeasonDriverStandings = $driverStandingsEndOfSeason_data->thisDriverStandings($thisLastRace);
            // return $thisSeasonDriverStandings;
        }
 


        //Retrieving driver's team
        $Full_SeasondriverStandings_data = new drivers;
        $thisSeasonFullDriverStandings = $Full_SeasondriverStandings_data->addDriverTeam($thisSeasonDriverStandings, $thisLastRaces);
        // return $thisSeasonFullDriverStandings;

        
        //Retrieving constructor's standings data of that season after end
        $constructorSeasonStandings_data = new constructor_standings;
        if($thisCurrentSeasonLastRaceId[0]->raceId != $thisLastRace[0]->raceId){
            $thisSeasonConstructorStandings = $constructorSeasonStandings_data->thisConstructorStandings($thisCurrentSeasonLastRaceId);
            // return $thisSeasonConstructorStandings;
        }else{
            $thisSeasonConstructorStandings = $constructorSeasonStandings_data->thisConstructorStandings($thisLastRace);
            // return $thisSeasonConstructorStandings;
        }

        //Retrieving race's info
        $data2 = new race_descriptions;
        $thisRaceDescriptions = $data2->thisRaceDescript($thisRace->raceId);
        // return $thisRaceDescriptions[0]->source;


        //Locate whitch posts to fetch by tags
        $data3 = new tags;
        $thisTags = $data3->race_show($thisRace->raceId);
        // return $thisTags;


        //fetch posts adding tags
        $data4 = new posts;
        $thisPosts = $data4->fetch_post_by_tag($thisTags);
        // return $thisPosts;


        //exchange tag's id numbers to names
        $data5 = new posts;
        $thisPosts = $data5->id_to_name($thisPosts);
        // return $thisPosts;


        //Retrieving constructor participants
        $constructorParticipants = new constructors;
        $thisConstructorParticipants = $constructorParticipants->thisConstructorParticipants($thisRace->raceId);
        // return $thisConstructorParticipants;


        //Retrieving season's point system
        $pointSystem = new races;
        $thisPointSystem = $pointSystem->thisRacePointSystem($thisRace->year);
        // return $thisPointSystem;


        //Retrieving sprint race points
        $sprint_data = new races;
        $thisSprintRacePoints = $sprint_data->thisSprintRacePoints($thisRace->raceId, $thisRace->year);
        // return $thisSprintRacePoints;

        //Retrieving fastest lap points
        $fastestLapPoints_data = new races;
        $thisFastestLapPoints = $fastestLapPoints_data->thisFastestLapPoints($thisRace->raceId, $thisRace->year);
        // return $thisFastestLapPoints;


        //Retrieving sprint race results data 
        $sprint_results_data = new sprint_results;
        $thisSprintFullResults = $sprint_results_data->thisSprintFullResults($thisRace->raceId);
        // return $thisSprintFullResults;
        
        if($thisCurrentSeasonLastRaceId[0]->raceId != $thisLastRace[0]->raceId){
            $isFinalStandings = false;
        }else{
            $isFinalStandings = true;
        }
        if(!$isFinalStandings && $thisRace->raceId == $thisCurrentSeasonLastRaceId[0]->raceId){
            $isFinalOfCurrent = true;
        }else{
            $isFinalOfCurrent = false;
        }


        return view('races.show', compact('thisRace', 'thisCircuit', 'thisFullDriverStandings', 
        'thisConstructorStandings', 'thisFullResults', 'thisFullQualifying', 'thisRacePitStops', 
        'thisSeasonFullDriverStandings', 'thisSeasonConstructorStandings', 'thisRaceDescriptions', 
        'thisPosts', 'thisLastRace', 'thisFirstRace', 'thisConstructorParticipants', 'thisPointSystem',
        'thisSprintRacePoints', 'thisFastestLapPoints', 'thisSprintFullResults', 'isFinalStandings', 'isFinalOfCurrent'));
    }

}
