<?php

namespace App\Http\Controllers\DatabaseHandlingServices;

use App\status;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// IMPORTANT NOTE. ITS BEST TO UPDATE THIS MANUALLY THROUGHT CSV
class status_update
{
    public function Update(){


        $curl = curl_init();

        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPGET => 1,
            CURLOPT_URL => 'http://ergast.com/api/f1/status.json?limit=1000000'
        ]);

        
        $response = json_decode(curl_exec($curl),true);
        curl_close($curl);
        
        $MRData = $response['MRData'];
        // print_r($MRData);


        $StatusTable = $MRData['StatusTable'];
        $Status = $StatusTable['Status'];
        
        $allStatusesId = [];
        $allStatuses = [];
        for($i=0; $i<count($Status); $i++){
            array_push($allStatuses, $Status[$i]['status']);
            array_push($allStatusesId, $Status[$i]['statusId']);
        }
        print_r($allStatusesId);
        print_r($allStatuses);

        // TO BE CONTINUED. DATA FROM DOWNLOADED CSV ARE DIFFERENT FROM THE API
       

    }


}
