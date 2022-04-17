<?php

namespace App\Http\Controllers\DatabaseHandlingServices;

use App\seasons;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


// IMPORTANT NOTE. ITS BEST TO UPDATE THIS MANUALLY THROUGHT CSV


// drivers->constructors->circuits->status->seasons->races->results->laptimes->
// ->pitstops->qualifying->driver_stadnings->constructor_standings->constructor_resultss