<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function gallery(){

        return view('footer.gallery');
    }


    public function contact(){

        return view('footer.contact');
    }


    public function about(){

        return view('footer.about');
    }


    public function report(){

        return view('footer.report');
    }
}