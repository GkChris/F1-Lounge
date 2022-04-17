<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DatabaseHandlingServices\circuits_update;
use App\Http\Controllers\DatabaseHandlingServices\drivers_update;
use App\Http\Controllers\DatabaseHandlingServices\constructors_update;
use App\Http\Controllers\DatabaseHandlingServices\seasons_update;
use App\Http\Controllers\DatabaseHandlingServices\status_update;
use App\Http\Controllers\DatabaseHandlingServices\dbupdate;

use Illuminate\Http\Request;



class DatabaseHandling extends Controller
{
    public function Update_Circuits(){

        $data = new circuits_update;
        $data2 = $data->Update();
        return $data2;

    }

    public function Update_Drivers(){

        $data = new drivers_update;
        $data2 = $data->Update();
        return $data2;

    }

    public function Update_Constructors(){

        $data = new constructors_update;
        $data2 = $data->Update();
        return $data2;

    }

    public function Update_Seasons(){

        $data = new seasons_update;
        $data2 = $data->Update();
        return $data2;

    }

    public function Update_Status(){

        $data = new status_update;
        $data2 = $data->Update();
        return $data2;

    }


    public function dbupdate(){
        $data = new dbupdate;
        $data2 = $data->Update();
        return $data2;
    }


}



