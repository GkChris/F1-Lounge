<?php

namespace App\Http\Controllers;

use App\circuits;
use App\circuit_descriptions;
use App\posts;
use App\tags;
use Illuminate\Http\Request;



class CircuitsController extends Controller
{

    public function index()
    {
        $data = new circuits;
        $allCircuitsByCountry = $data->allCircuitsByCountry();
        // return $allCircuitsByCountry;

        $data3 = new circuits;
        $allCircuits = $data3->allCircuits();
        // return $allCircuits;

        $data4 = new circuits;
        $allCircuitsDistinctCountries = $data4->allCircuitsDistinctCountries();
        // return $allCircuitsDistinctCountries;

        
        return view('circuits.index', compact('allCircuitsByCountry', 'allCircuits', 'allCircuitsDistinctCountries'));
    }






    public function show($circuits)
    {
        $data = new circuits;
        $thisCircuit = $data->thisCircuitRef($circuits);
        // return $thisCircuit;

        //Locate whitch posts to fetch by tags
        $data3 = new tags;
        $thisTags = $data3->circuit_show($thisCircuit->circuitId);
        // return $thisTags;


        //fetch posts adding tags
        $data4 = new posts;
        $thisPosts = $data4->fetch_post_by_tag($thisTags);
        // return $thisPosts;


        //exchange tag's id numbers to names
        $data5 = new posts;
        $thisPosts = $data5->id_to_name($thisPosts);
        // return $thisPosts;


        $data6 = new circuits;
        $thisCircuitDebut = $data6->thisCircuitDebut($thisCircuit->circuitId);
        // return $thisCircuitDebut;

        $data7 = new circuits;
        $thisCircuitTotalRaces = $data7->thisCircuitTotalRaces($thisCircuit->circuitId);
        // return $thisCircuitTotalRaces;

        $data8 = new circuits;
        $thisCircuitLastRace = $data8->thisCircuitLastRace($thisCircuit->circuitId);
        // return $thisCircuitLastRace;


        $data9 = new circuit_descriptions;
        $thisCircuitDescriptions = $data9->thisCircuitDescriptions($thisCircuit->circuitId);
        // return $thisCircuitDescriptions;


        $thisCircuitStats = new circuits;
        if(isset($thisCircuitDebut[0]->date)){
            $thisCircuitStats->circuitDebut = $thisCircuitDebut[0]->date;
        }else{
            $thisCircuitStats->circuitDebut = '-';
        }
        if(isset($thisCircuitLastRace[0]->date)){
            $thisCircuitStats->circuitLastRace = $thisCircuitLastRace[0]->date;
        }else{
            $thisCircuitStats->circuitLastRace = '-';
        }
        if($thisCircuitDebut == null){
            $thisCircuitStats->circuitTotalRaces = '0';
        }else{
            $thisCircuitStats->circuitTotalRaces = $thisCircuitTotalRaces;
        }
        

        

        return view('circuits.show', compact('thisCircuit', 'thisPosts',
        'thisCircuitStats', 'thisCircuitDescriptions'));
    }



}
