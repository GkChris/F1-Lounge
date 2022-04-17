<?php

namespace App\Http\Controllers;

use App\reports;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report(Request $request){



        $user = Auth::user();
        
        $forId = new reports;
        $last_reportId = $forId->last_reportId();
        
        //[[POST AREA]]
        $report = new reports;
        $report->repId = $last_reportId+1;
        $report->comment = $request->report_comment;
        $report->id = $user->id;
        $report->save();
          
        return redirect()->back()->with('success', 'Your report was sent successfully!');  
    
        
    }
}
