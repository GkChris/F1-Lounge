<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class driver_descriptions extends Model
{
    protected $fillable = [
        'descId', 'driverId', 'description',
        'source', 'sourceURL', 'status'
    ];

    protected $primaryKey = 'descId';

    public $incrementing = false;



    public function drivers()
    {
        return $this->belongsTo(drivers::class, 'driverId');
    }




    public function thisDriverDescriptions($driverId){
        $data = DB::table('driver_descriptions')
        ->select('*')
        ->where(['driverId' => $driverId])
        ->get();

        return $data;
    }
}
