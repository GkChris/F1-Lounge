<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class constructor_descriptions extends Model
{
    protected $fillable = [
        'descId', 'constructorId', 'description',
        'source', 'sourceURL', 'status'
    ];

    protected $primaryKey = 'descId';

    public $incrementing = false;



    public function constructors()
    {
        return $this->belongsTo(constructors::class, 'constructorId');
    }



    public function thisConstructorDescript($id){
        $data = DB::table('constructor_descriptions')->where('constructorId','=',$id)->get();
        return $data;
    }



    
    public function thisConstructorDescriptions($constructorId){
        $data = DB::table('constructor_descriptions')
        ->select('*')
        ->where(['constructorId' => $constructorId])
        ->get();

        return $data;
    }
}
