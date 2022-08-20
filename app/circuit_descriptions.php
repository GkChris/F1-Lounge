<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class circuit_descriptions extends Model
{
    protected $fillable = [
        'descId', 'circuitId', 'description',
        'source', 'sourceURL', 'status'
    ];

    protected $primaryKey = 'descId';

    public $incrementing = false;



    public function circuits()
    {
        return $this->belongsTo(Circuits::class, 'circuitId');
    }



    public function thisCircuitDescriptions($circuitId){
        $data = DB::table('circuit_descriptions')
        ->select('circuit_descriptions.*')
        ->where(['circuitId' => $circuitId])
        ->get();

        return $data;
    }



}
