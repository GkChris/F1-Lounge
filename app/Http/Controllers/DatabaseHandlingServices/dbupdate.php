<?php

namespace App\Http\Controllers\DatabaseHandlingServices;

use App\circuits;
use App\drivers;
use App\constructors;
use App\races;
use App\seasons;
use App\circuit_descriptions;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class dbupdate
{
    public function Update(){


        $circuitslist = Seasons::all();
        $circuitsCount = $circuitslist->count();
        // echo $circuitsCount;

        $allId = DB::table('seasons')->select('year')->orderBy('year')->get();
        // return $allId;
        // dd($allId);



        $i = 1;
        foreach($allId as $id){
            DB::table('season_descriptions')
            ->updateOrInsert(
                ['year' => $id->year],
                ['descId' => $i, 'description' => '', 'source' => '', 'sourceURL' => '', 'pointsSystem' => '' ]
            );
            $i += 1;
        }

    }
}