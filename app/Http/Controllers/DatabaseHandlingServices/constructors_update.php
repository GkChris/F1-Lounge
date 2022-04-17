<?php

namespace App\Http\Controllers\DatabaseHandlingServices;

use App\constructors;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// IMPORTANT NOTE. ITS BEST TO UPDATE THIS MANUALLY THROUGHT CSV
class constructors_update
{
    public function Update(){


        $curl = curl_init();

        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPGET => 1,
            CURLOPT_URL => 'http://ergast.com/api/f1/constructors.json?limit=1000000'
        ]);

        
        $response = json_decode(curl_exec($curl),true);
        curl_close($curl);
        
        $MRData = $response['MRData'];
        // print_r($MRData);
        $currentcount = $MRData['total'];
        // echo $currentcount;


        $constructorslist = Constructors::all();
        $constructorsCount = $constructorslist->count();
        // echo $constructorsCount;


        if($currentcount != $constructorsCount){

            if($currentcount > $constructorsCount){
                $allId = [];



                $ConstructorTable = $MRData['ConstructorTable'];
                $Constructors = $ConstructorTable['Constructors'];
                for($i=0; $i<$currentcount;$i++){
                    array_push($allId, $Constructors[$i]['driverId']);
                }

                for($j=0;$j<count($allId);$j++){
                    if (DB::table('constructors')->where('constructorRef', '=', $allId[$j])->exists()) {
                        print_r('ok');
                    }else{
                        $temppId = DB::table('constructors')->latest('constructorId')->first();
                        $values = array(
                            'constructorId' => $temppId->constructorId + 1, 
                            'constructorRef' => $Drivers[$j]['constructorId'], 
                            'name' => $Drivers[$j]['name'], 
                            'nationality' => $Drivers[$j]['nationality'],
                            'url' => $Drivers[$j]['url']
                        );
                        DB::table('constructors')->insert($values);
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

