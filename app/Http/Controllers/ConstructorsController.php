<?php

namespace App\Http\Controllers;

use App\constructors;
use App\constructor_descriptions;
use App\posts;
use App\tags;
use Illuminate\Http\Request;

class ConstructorsController extends Controller
{


    public function index()
    {
        $data = new constructors;
        $allConstructors = $data->allConstructors();
        // return $allConstructors;

        $data2 = new constructors;
        $allConstructorsByCountry = $data2->allConstructorsByCountry();
        // dd($allConstructorsByCountry);
        // return $allConstructorsByCountry;

        
        $data3 = new constructors;
        foreach ($allConstructorsByCountry as $team){
            $thisConstructorSeasonEntries = $data3->thisConstructorSeasonEntries($team->constructorId);
            if(isset($thisConstructorSeasonEntries)){
                $team->entries = count($thisConstructorSeasonEntries);            
            }
        }


        $data4 = new constructors;
        $allConstructorsDistinctCountries = $data4->allConstructorsDistinctCountries();
        // return $allConstructorsDistinctCountries;


        
        return view('constructors.index', compact('allConstructors', 'allConstructorsByCountry', 'allConstructorsDistinctCountries'));
    }

    public function show($constructor)
    {
        $data = new constructors;
        $thisConstructor = $data->thisConstructor($constructor);
        // return $thisConstructor;

        //Retrieving constructor's info
        $data2 = new constructor_descriptions;
        $thisConstructorDescriptions = $data2->thisConstructorDescript($thisConstructor->constructorId);
        // return $thisConstructorDescriptions;


        //Locate whitch posts to fetch by tags
        $data3 = new tags;
        $thisTags = $data3->constructor_show($thisConstructor->constructorId);
        // return $thisTags;


        //fetch posts adding tags
        $data4 = new posts;
        $thisPosts = $data4->fetch_post_by_tag($thisTags);
        // return $thisPosts;


        //exchange tag's id numbers to names
        $data5 = new posts;
        $thisPosts = $data5->id_to_name($thisPosts);
        // return $thisPosts;

        
        $data6 = new constructor_descriptions;
        $thisConstructorDescriptions = $data6->thisConstructorDescriptions($thisConstructor->constructorId);
        // return $thisConstructorDescriptions;

        $data7 = new constructors;
        $thisConstructorTotalWins = $data7->thisConstructorTotalWins($thisConstructor->constructorId);
        // return $thisConstructorTotalWins;

        $data7 = new constructors;
        $thisConstructorDebut = $data7->thisConstructorDebut($thisConstructor->constructorId);
        // return $thisConstructorDebut;


        $data8 = new constructors;
        $thisConstructorLastRace = $data8->thisConstructorLastRace($thisConstructor->constructorId);
        // return $thisConstructorLastRace;
        

        $data9 = new constructors;
        $thisConstructorTotalRaces = $data9->thisConstructorTotalRaces($thisConstructor->constructorId);
        // return $thisConstructorTotalRaces;


        $data10 = new constructors;
        $thisConstructorTotalPodiums = $data10->thisConstructorTotalPodiums($thisConstructor->constructorId);
        // return $thisConstructorTotalPodiums;
        
        $data11 = new constructors;
        $thisConstructorTotalPoles = $data11->thisConstructorTotalPoles($thisConstructor->constructorId);
        // return $thisConstructorTotalPoles;
        
        $data12 = new constructors;
        $thisConstructorTotalPoints = $data12->thisConstructorTotalPoints($thisConstructor->constructorId);
        // return $thisConstructorTotalPoints;
        
        $data13 = new constructors;
        $thisConstructorTotalDrivers = $data13->thisConstructorTotalDrivers($thisConstructor->constructorId);
        // return $thisConstructorTotalDrivers;
        
        $data14 = new constructors;
        $thisConstructorTotalOneTwoFinishes = $data14->thisConstructorTotalOneTwoFinishes($thisConstructor->constructorId);
        // return $thisConstructorTotalOneTwoFinishes;
        
        $data15 = new constructors;
        $thisConstructorTotalFrontRowLockouts = $data15->thisConstructorTotalFrontRowLockouts($thisConstructor->constructorId);
        // return $thisConstructorTotalFrontRowLockouts;
        
        $data16 = new constructors;
        $thisConstructorChampionships = $data16->thisConstructorChampionships($thisConstructor->constructorId);
        // return $thisConstructorChampionships;
        
        $data17 = new constructors;
        $thisConstructorSeasonEntries = $data17->thisConstructorSeasonEntries($thisConstructor->constructorId);
        // return $thisConstructorSeasonEntries;
        
        $data18 = new constructors;
        $thisConstructorBestRaceFinish = $data18->thisConstructorBestRaceFinish($thisConstructor->constructorId);
        // return $thisConstructorBestRaceFinish;
        
        $data19 = new constructors;
        $thisConstructorBestQualifyFinish = $data19->thisConstructorBestQualifyFinish($thisConstructor->constructorId);
        // return $thisConstructorBestQualifyFinish;
        
        $data20 = new constructors;
        $thisConstructorTotalRetirements = $data20->thisConstructorTotalRetirements($thisConstructor->constructorId);
        // return $thisConstructorTotalRetirements;
        
        $data21 = new constructors;
        $thisConstructorTotalPointFinishes = $data21->thisConstructorTotalPointFinishes($thisConstructor->constructorId);
        // return $thisConstructorTotalPointFinishes;
        
        $data22 = new constructors;
        $thisConstructorActiveLineup = $data22->thisConstructorActiveLineup($thisConstructor->constructorId);
        // return $thisConstructorActiveLineup;

        $data23 = new constructors;
        $thisConstructorBestSeasonFinish = $data23->thisConstructorBestSeasonFinish($thisConstructor->constructorId);
        // return $thisConstructorBestSeasonFinish;


        $data24 = new constructors;
        $thisConstructorDriversChampionships = $data24->thisConstructorDriversChampionships($thisConstructor->constructorId);
        // return $thisConstructorDriversChampionships;





        $thisConstructorStats = new constructors;
        $thisConstructorStats->constructorTotalWins = $thisConstructorTotalWins;
        if(isset($thisConstructorDebut[0]->date)){
            $thisConstructorStats->constructorDebutDate = $thisConstructorDebut[0]->date;
        }else{
            $thisConstructorStats->constructorDebutDate = '-';
        }

        if(isset($thisConstructorLastRace[0]->date)){
            $thisConstructorStats->constructorLastRaceDate = $thisConstructorLastRace[0]->date;
        }else{
            $thisConstructorStats->constructorLastRaceDate = '-';
        }
        
        $thisConstructorStats->constructorTotalRaces = $thisConstructorTotalRaces;
        $thisConstructorStats->constructorTotalPodiums = $thisConstructorTotalPodiums;
        $thisConstructorStats->constructorTotalPoles = $thisConstructorTotalPoles;
        $thisConstructorStats->constructorTotalPoints = $thisConstructorTotalPoints;
        $thisConstructorStats->constructorTotalDrivers = count($thisConstructorTotalDrivers);
        $thisConstructorStats->constructorTotalOneTwoFinishes = count($thisConstructorTotalOneTwoFinishes);
        $thisConstructorStats->constructorTotalFrontRowLockouts = count($thisConstructorTotalFrontRowLockouts);
        $thisConstructorStats->constructorChampionships = $thisConstructorChampionships;
        $thisConstructorStats->constructorSeasonEntries = count($thisConstructorSeasonEntries);


        if(isset($thisConstructorBestRaceFinish[0]->position)){
            $thisConstructorStats->constructorBestRaceFinish = $thisConstructorBestRaceFinish[0]->position;
        }else{
            $thisConstructorStats->constructorBestRaceFinish = '-';
        }

        if(isset($thisConstructorBestQualifyFinish[0]->position)){
            $thisConstructorStats->constructorBestQualifyFinish = $thisConstructorBestQualifyFinish[0]->position;
        }else{
            $thisConstructorStats->constructorBestQualifyFinish = '-';
        }
        if(isset($thisConstructorBestSeasonFinish[0]->position)){
           $thisConstructorStats->constructorBestSeasonFinish = $thisConstructorBestSeasonFinish[0]->position;
        }else{
           $thisConstructorStats->constructorBestSeasonFinish = '-';
        }
        $thisConstructorStats->constructorDriversChampionships = count($thisConstructorDriversChampionships);
         
        $thisConstructorStats->constructorTotalRetirements = $thisConstructorTotalRetirements;
        $thisConstructorStats->constructorTotalPointFinishes = count($thisConstructorTotalPointFinishes);
        if(isset($thisConstructorActiveLineup->driver1) && isset($thisConstructorActiveLineup->driver2)){
            $thisConstructorStats->constructorActiveDriver1 = $thisConstructorActiveLineup->driver1;
            $thisConstructorStats->constructorActiveDriver2 = $thisConstructorActiveLineup->driver2;
            $thisConstructorStats->constructorActiveDriver1Ref = $thisConstructorActiveLineup->driver1Ref;
            $thisConstructorStats->constructorActiveDriver2Ref = $thisConstructorActiveLineup->driver2Ref;
        }

        return view('constructors.show', compact('thisConstructor', 'thisPosts',
        'thisConstructorDescriptions', 'thisConstructorStats'));
    }


}
