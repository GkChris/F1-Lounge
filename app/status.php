<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $fillable = [
        'statusId', 'status',
    ];

    public function results()
    {
        return $this->hasMany('App\results', 'statusId');
    }
}
