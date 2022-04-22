<?php

namespace App\Http\Controllers;

use App\drivers;
use App\driver_descriptions;
use App\posts;
use App\tags;
use Illuminate\Http\Request;

class DriversController extends Controller
{


    public function index()
    {
        $data = new drivers;
        $allDrivers = $data->allDrivers();
        // return $allDrivers;

        $data2 = new drivers;
        $allDriversByYear = $data2->allDriversByYear();
        // return $allDriversByYear;
        

        $data3 = new drivers;
        $data4 = new drivers;
        $data5 = new driver_descriptions;
        foreach ($allDriversByYear as $driver){
            $thisDriverDebut = $data3->thisDriverDebut($driver->driverId);
            $thisDriverLastRace = $data4->thisDriverLastRace($driver->driverId);
            $thisDriverDescriptions = $data5->thisDriverDescriptions($driver->driverId);
            $driver->firstRace = $thisDriverDebut[0]->year;
            $driver->lastRace = $thisDriverLastRace[0]->year;
            $driver->status = $thisDriverDescriptions[0]->status;
            $driver->dob = $date = str_replace("-", '/', $driver->dob );
        }


        $data6 = new drivers;
        $allDriversDistinctCountries = $data6->allDriversDistinctCountries();
        // return $allDriversDistinctCountries;

        return view('drivers.index', compact('allDrivers', 'allDriversByYear', 'allDriversDistinctCountries'));
    }




    public function show($drivers)
    {
        $data = new drivers;
        $thisDriver = $data->thisDriver($drivers);
        // return $thisDriver;

        $thisDriver->dob = $date = str_replace("-", '/', $thisDriver->dob );

        //Retrieving driver's info
        $data2 = new driver_descriptions;
        $thisDriverDescriptions = $data2->thisDriverDescriptions($thisDriver->driverId);
        // return $thisDriverDescriptions;


        //Locate whitch posts to fetch by tags
        $data3 = new tags;
        $thisTags = $data3->driver_show($thisDriver->driverId);
        // return $thisTags;


        //fetch posts adding tags
        $data4 = new posts;
        $thisPosts = $data4->fetch_post_by_tag($thisTags);
        // return $thisPosts;


        //exchange tag's id numbers to names
        $data5 = new posts;
        $thisPosts = $data5->id_to_name($thisPosts);
        // return $thisPosts;
        

        
        $data6 = new drivers;
        $thisDriverDebut = $data6->thisDriverDebut($thisDriver->driverId);
        // return $thisDriverDebut;

        $data7 = new drivers;
        $thisDriverTotalRaces = $data7->thisDriverTotalRaces($thisDriver->driverId);
        // return $thisDriverTotalRaces;

        $data8 = new drivers;
        $thisDriverLastRace = $data8->thisDriverLastRace($thisDriver->driverId);
        // return $thisDriverLastRace;

        $data9 = new drivers;
        $thisDriverTotalWins = $data9->thisDriverTotalWins($thisDriver->driverId);
        // return $thisDriverTotalWins;

        $data10 = new drivers;
        $thisDriverTotalPodiums = $data10->thisDriverTotalPodiums($thisDriver->driverId);
        // return $thisDriverTotalPodiums;


        $data11 = new drivers;
        $thisDriverTotalFastestLaps = $data11->thisDriverTotalFastestLaps($thisDriver->driverId);
        // return $thisDriverTotalFastestLaps;

        $data12 = new drivers;
        $thisDriverTotalPoints = $data12->thisDriverTotalPoints($thisDriver->driverId);
        // return $thisDriverTotalPoints;

        $data13 = new drivers;
        $thisDriverChampionships = $data13->thisDriverChampionships($thisDriver->driverId);
        // return $thisDriverChampionships;
        
        $data14 = new drivers;
        $thisDriverTotalRetirements = $data14->thisDriverTotalRetirements($thisDriver->driverId);
        // return $thisDriverTotalRetirements;
        
        $data15 = new drivers;
        $thisDriverTotalConstructors = $data15->thisDriverTotalConstructors($thisDriver->driverId);
        // return $thisDriverTotalConstructors;
        
        $data16 = new drivers;
        $thisDriverTotalPoles = $data16->thisDriverTotalPoles($thisDriver->driverId);
        // return $thisDriverTotalPoles;
        
        $data17 = new drivers;
        $thisDriverSeasonEntries = $data17->thisDriverSeasonEntries($thisDriver->driverId);
        // return $thisDriverSeasonEntries;
        
        $data18 = new drivers;
        $thisDriverTotalWinsFromPole = $data18->thisDriverTotalWinsFromPole($thisDriver->driverId);
        // return $thisDriverTotalWinsFromPole;
        
        $data19 = new drivers;
        $thisDriverTotalFrontRowStarts = $data19->thisDriverTotalFrontRowStarts($thisDriver->driverId);
        // return $thisDriverTotalFrontRowStarts;
        
        $data20 = new drivers;
        $thisDriverTotalPointFinishes = $data20->thisDriverTotalPointFinishes($thisDriver->driverId);
        // return $thisDriverTotalPointFinishes;
        
        $data21 = new drivers;
        $thisDriverTotalCareerLaps = $data21->thisDriverTotalCareerLaps($thisDriver->driverId);
        // return $thisDriverTotalCareerLaps;
        
        $data22 = new drivers;
        $thisDriverTotalGrandSlams = $data22->thisDriverTotalGrandSlams($thisDriver->driverId);
        // return $thisDriverTotalGrandSlams;
        
        $data23 = new drivers;
        $thisDriverAge = $data23->thisDriverAge($thisDriver->driverId);
        // return $thisDriverAge;
        
        $data24 = new drivers;
        $thisDriverBestRaceFinish = $data24->thisDriverBestRaceFinish($thisDriver->driverId);
        // return $thisDriverBestRaceFinish;
        
        $data25 = new drivers;
        $thisDriverBestQualifyFinish = $data25->thisDriverBestQualifyFinish($thisDriver->driverId);
        // return $thisDriverBestQualifyFinish;
        
        $data26 = new drivers;
        $thisDriverActiveTeam = $data26->thisDriverActiveTeam($thisDriver->driverId);
        // return $thisDriverActiveTeam;

        $data27 = new drivers;
        $thisDriverBestSeasonFinish = $data27->thisDriverBestSeasonFinish($thisDriver->driverId);
        // return $thisDriverBestSeasonFinish;



        $thisDriverStats = new drivers;
        $thisDriverStats->driverDebutDate = $thisDriverDebut[0]->date;
        $thisDriverStats->driverTotalRaces = $thisDriverTotalRaces;
        $thisDriverStats->driverLastRaceDate = $thisDriverLastRace[0]->date;
        $thisDriverStats->driverTotalWins = $thisDriverTotalWins;
        $thisDriverStats->driverTotalPodiums = $thisDriverTotalPodiums;

        $thisDriverStats->driverTotalFastestLaps = $thisDriverTotalFastestLaps;
        $thisDriverStats->driverTotalPoints = $thisDriverTotalPoints;
        $thisDriverStats->driverTotalChampionships = $thisDriverChampionships;
        $thisDriverStats->driverTotalRetirements = $thisDriverTotalRetirements;
        $thisDriverStats->driverTotalConstructors = count($thisDriverTotalConstructors);
        $thisDriverStats->driverTotalPoles = $thisDriverTotalPoles;
        $thisDriverStats->driverTotalSeasonEntries = count($thisDriverSeasonEntries);
        $thisDriverStats->driverTotalWinsFromPole = count($thisDriverTotalWinsFromPole);
        $thisDriverStats->driverTotalFrontRowStarts = count($thisDriverTotalFrontRowStarts);
        $thisDriverStats->driverTotalPointFinishes = count($thisDriverTotalPointFinishes);
        $thisDriverStats->driverTotalLaps = $thisDriverTotalCareerLaps;
        $thisDriverStats->driverTotalGrandSlams = $thisDriverTotalGrandSlams;
        $thisDriverStats->driverAge = $thisDriverAge;
        $thisDriverStats->driverBestRaceFinish = $thisDriverBestRaceFinish[0]->position;
        if(isset($thisDriverBestQualifyFinish[0])){
            $thisDriverStats->driverBestQualifyFinish = $thisDriverBestQualifyFinish[0]->position;
        }
        if(isset($thisDriverActiveTeam->constructor) && isset($thisDriverActiveTeam->constructorRef)){
            $thisDriverStats->driverActiveTeam = $thisDriverActiveTeam->constructor;
            $thisDriverStats->driverActiveTeamRef = $thisDriverActiveTeam->constructorRef;
        }
        $thisDriverStats->driverBestSeasonFinish = $thisDriverBestSeasonFinish[0]->position;
        

        return view('drivers.show', compact('thisDriver', 'thisDriverDescriptions', 'thisPosts', 'thisDriverStats'));
    }


}
