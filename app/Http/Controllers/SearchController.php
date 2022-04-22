<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\search;

class SearchController extends Controller
{

    public function driverSearch(Request $request){

        $input = $request->value;
        if($input != ''){
            $input2 = explode(" ",$input);
       
            if(count($input2) == 1){
                $data = DB::table('drivers')
                ->select('driverRef','forename', 'surname', 'nationality')
                ->Where('forename','LIKE','%'.$input."%")
                ->orWhere('surname','LIKE','%'.$input."%")
                ->orWhere('nationality','LIKE','%'.$input."%")
                ->get();
            }elseif(count($input2) == 2){
                $data = DB::table('drivers')
                ->select('driverRef','forename', 'surname', 'nationality')
                ->Where('forename','LIKE','%'.$input2[0]."%")
                ->Where('surname','LIKE','%'.$input2[1]."%")
                ->get();
            }else{
                $data = null;
            }
        }else{
            $data = null;
        }

       

        return $data;

    }

    public function constructorSearch(Request $request){

        $input = $request->value;

        $data = DB::table('constructors')
        ->select('constructorRef','name', 'nationality')
        ->where('constructorRef','LIKE','%'.$input."%")
        ->orWhere('name','LIKE','%'.$input."%")
        ->orWhere('nationality','LIKE','%'.$input."%")
        ->get();


        return $data;

    }



    public function circuitSearch(Request $request){

        $input = $request->value;

        $data = DB::table('circuits')
        ->select('circuitRef','name', 'location', 'country')
        ->where('name','LIKE','%'.$input."%")
        ->orWhere('location','LIKE','%'.$input."%")
        ->orWhere('country','LIKE','%'.$input."%")
        ->orWhere('circuitRef','LIKE','%'.$input."%")
        ->get();


        return $data;


    }



    public function searchAll(Request $request){

        $input = $request->value;

        switch ($request->toSearch) {
            case 'drivers':
                $data = DB::table('drivers')
                ->select('driverRef','forename', 'surname', 'nationality')
                ->Where('forename','LIKE','%'.$input."%")
                ->orWhere('surname','LIKE','%'.$input."%")
                ->orWhere('nationality','LIKE','%'.$input."%")
                ->get();
                break;
            case 'constructors':
                $data = DB::table('constructors')
                ->select('constructorRef','name', 'nationality')
                ->where('constructorRef','LIKE','%'.$input."%")
                ->orWhere('name','LIKE','%'.$input."%")
                ->orWhere('nationality','LIKE','%'.$input."%")
                ->get();
                break;
            case 'circuits':
                $data = DB::table('circuits')
                ->select('circuitRef','name', 'location', 'country')
                ->where('name','LIKE','%'.$input."%")
                ->orWhere('location','LIKE','%'.$input."%")
                ->orWhere('country','LIKE','%'.$input."%")
                ->orWhere('circuitRef','LIKE','%'.$input."%")
                ->get();
                break;
            case 'seasons':
                $data = DB::table('seasons')
                ->select('seasons.*')
                ->where('year','LIKE','%'.$input."%")
                ->get();
                break;
            case 'races':
                $data = DB::table('races')
                ->select('races.*')
                ->where('round','LIKE','%'.$input."%")
                ->where('year','LIKE','%'.$input."%")
                ->get();
                break;
        }

        return $data;
        
    }





    public function searchUsername(Request $request){

        $input = $request->value;


        $data = DB::table('users')
        ->select('name')
        ->where(['name' => $input])
        ->exists();

        if($data){
            return 'Username already exist';
        }else{
            return 'Free to use';
        }

        return $data;

    }


    public function searchMail(Request $request){

        $input = $request->value;


        $data = DB::table('users')
        ->select('email')
        ->where(['email' => $input])
        ->exists();

        if($data){
            return 'Email already exist';
        }else{
            return 'Free to use';
        }

        return $data;

    }
}
