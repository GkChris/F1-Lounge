<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class circuits extends Model
{
    protected $fillable = [
        'circuitId', 'circuitRef', 'name',
        'location', 'country', 'lat',
        'lng', 'alt', 'url',
    ];

    protected $primaryKey = 'circuitRef';

    public $incrementing = false;

    

    public function races()
    {
        return $this->hasMany('App\races', 'circuitId');
    }

    public function tags()
    {
        return $this->hasMany('App\tags', 'circuitId');
    }

    public function circuit_descriptions(){
        return $this->hasOne('App\circuit_descriptions', 'circuitId');
    }

    public function allCircuits(){      //return all circuits
        $data = Circuits::all();
        return $data;
    }

    public function allCircuitsAlpha(){      //return all circuits
        $data = DB::table('Circuits')->orderBy('name')->paginate(10);
        return $data;
    }

    public function allCircuitsByCountry(){      //return all circuits
        $data = DB::table('Circuits')->orderBy('country')->paginate(10);
        return $data;
    }

    public function thisCircuit($id){       //return specific circuit
        $data = Circuits::where('circuitId','=',$id)->firstOrFail();
        return $data;
    }

    public function thisCircuitRef($id){       //return specific circuit throught reference
        $data = Circuits::where('circuitRef','=',$id)->firstOrFail();
        return $data;
    }



    public function name_to_id($name){

        $data = DB::table('circuits')
        ->select('circuitId')
        ->where(['name' => $name])
        ->get();


        return $data;
    }


    public function thisCircuitDebut($circuitId){
        date_default_timezone_set('Europe/London');
        $date = date('Y/m/d', time());
        $date = str_replace("/", '-', $date );

        $data = DB::table('races')
        ->select('races.date', 'races.year', 'races.name')
        ->where(['circuitId' => $circuitId])
        ->orderBy('date', 'asc')
        ->take(1)
        ->get();


         
        if(count($data) == 1 && $data[0]->date > $date){
            return null;
        }
        
        
        
        if(isset($data[0])){
            $data[0]->date = str_replace("-", '/', $data[0]->date );
            return $data;
        }else{
            return null;
        }
        
    }


    public function thisCircuitLastRace($circuitId){

        // Change the line below to your timezone!
        date_default_timezone_set('Europe/London');
        $date = date('Y/m/d', time());
        $date = str_replace("/", '-', $date );

        $data = DB::table('races')
        ->select('races.date', 'races.year', 'races.name')
        ->where(['circuitId' => $circuitId])
        ->whereDate('date', '<=', $date)
        ->orderBy('races.date', 'desc')
        ->take(1)
        ->get();

        if(isset($data[0])){
            $data[0]->date = str_replace("-", '/', $data[0]->date );
            return $data;
        }else{
            return null;
        }
        
    }


    public function thisCircuitTotalRaces($circuitId){

        $data = DB::table('races')
        ->select('races.raceId')
        ->where(['circuitId' => $circuitId])
        ->get();

        return count($data);
        
    }


    public function allCircuitsDistinctCountries(){
        $data = DB::table('circuits')
        ->select('country')
        ->distinct()
        ->count('country');

        return $data;

    }

}
