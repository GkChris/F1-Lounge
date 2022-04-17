<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class race_descriptions extends Model
{
    protected $fillable = [
        'descId', 'raceId', 'description',
        'source', 'sourceURL'
    ];

    protected $primaryKey = 'descId';

    public $incrementing = false;


    public function races()
    {
        return $this->belongsTo(races::class, 'raceId');
    }



    public function thisRaceDescript($id){
        $data = DB::table('race_descriptions')->where('raceId','=',$id)->get();
        return $data;
    }
}
