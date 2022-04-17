<?php

namespace App\Http\Controllers\DatabaseHandlingServices;

use App\drivers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// NOTE: DRIVER'S NUMBER AND CODE ARE MISSING DURING UPDATE. HAVE TO BE UPDATED MANUALLY

// IMPORTANT NOTE. ITS BEST TO UPDATE THIS MANUALLY THROUGHT CSV
class drivers_update
{
    public function Update(){


        $curl = curl_init();

        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPGET => 1,
            CURLOPT_URL => 'http://ergast.com/api/f1/drivers.json?limit=1000000'
        ]);

        
        $response = json_decode(curl_exec($curl),true);
        curl_close($curl);
        
        $MRData = $response['MRData'];
        // print_r($MRData);
        $currentcount = $MRData['total'];
        // echo $currentcount;


        $driverslist = Drivers::all();
        $driversCount = $driverslist->count();
        // echo $driversCount;


        if($currentcount != $driversCount){

            if($currentcount > $driversCount){
                $allId = [];



                $DriverTable = $MRData['DriverTable'];
                $Drivers = $DriverTable['Drivers'];
                for($i=0; $i<$currentcount;$i++){
                    array_push($allId, $Drivers[$i]['driverId']);
                }

                for($j=0;$j<count($allId);$j++){
                    if (DB::table('drivers')->where('driverRef', '=', $allId[$j])->exists()) {
                        print_r('ok');
                    }else{
                        $temppId = DB::table('drivers')->latest('driverId')->first();
                        $values = array(
                            'driverId' => $temppId->driverId + 1, 
                            'driverRef' => $Drivers[$j]['driverId'], 
                            'forename' => $Drivers[$j]['givenName'], 
                            'surname' => $Drivers[$j]['familyName'], 
                            'dob' => $Drivers[$j]['dateOfBirth'], 
                            'nationality' => $Drivers[$j]['nationality'],
                            'url' => $Drivers[$j]['url']
                        );
                        DB::table('drivers')->insert($values);
                        
                    }
                }
                
            }else{
                echo 'DELETE_THAT';
            }


        }else{
            echo 'Well Done';
        }

    }


}

