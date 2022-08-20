<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class reports extends Model
{
    protected $fillable = [
        'repId', 'comment', 'id',
    ];

    protected $primaryKey = 'year';



    public function last_reportId(){
        $data = DB::table('reports')->select('repId')->orderBy('repId','desc')->first();
        return $data->repId;
    }


}
