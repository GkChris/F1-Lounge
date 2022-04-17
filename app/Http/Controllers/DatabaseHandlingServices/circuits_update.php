<?php

namespace App\Http\Controllers\DatabaseHandlingServices;

use App\circuits;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// IMPORTANT NOTE. ITS BEST TO UPDATE THIS MANUALLY THROUGHT CSV
class circuits_update
{
    public function Update(){


        $curl = curl_init();

        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPGET => 1,
            CURLOPT_URL => 'http://ergast.com/api/f1/circuits.json?limit=1000000'
        ]);

        
        $response = json_decode(curl_exec($curl),true);
        curl_close($curl);
        
        $MRData = $response['MRData'];
        // print_r($MRData);
        $currentcount = $MRData['total'];
        // echo $currentcount;


        $circuitlist = Circuits::all();
        $circuitCount = $circuitlist->count();
        // echo $circuitCount;


        if($currentcount != $circuitCount){

            if($currentcount > $circuitCount){
                $allId = [];
                $CircuitTable = $MRData['CircuitTable'];
                $Circuits = $CircuitTable['Circuits'];
                for($i=0; $i<$currentcount;$i++){
                    array_push($allId, $Circuits[$i]['circuitId']);
                }

                for($j=0;$j<count($allId);$j++){
                    if (DB::table('circuits')->where('circuitRef', '=', $allId[$j])->exists()) {
                        print_r('ok');
                    }else{
                        $temppId = DB::table('circuits')->latest('circuitId')->first();
                        $values = array('circuitId' => $temppId->circuitId+1, 
                            'circuitRef' => $Circuits[$j]['circuitId'], 
                            'name' => $Circuits[$j]['circuitName'], 
                            'location' => $Circuits[$j]['Location']['locality'], 
                            'country' => $Circuits[$j]['Location']['country'], 
                            'lat' => $Circuits[$j]['Location']['lat'],
                            'lng' => $Circuits[$j]['Location']['long'], 
                            'alt' => '\N', 
                            'url' => $Circuits[$j]['url']
                        );
                        DB::table('circuits')->insert($values);
                    }
                }
                
            }else{
                echo 'DELETE_THAT';
            }


        }else{
            echo 'Well Done';
        }

    }


    public function Delete(){
        DB::table('circuits')->where('circuitId', 80)->delete();
    }
}

