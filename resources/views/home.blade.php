@extends('layouts.blured_background_image')
<link href="{{ asset('/css/home.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/info_card.css') }}" rel="stylesheet" type="text/css" />

<style>



</style>



@section('main_content')



    {{-- page container --}}
    <div class="home_container">
        <div class="row">
            <div class="welcome_info col-12 d-flex flex-column text-center">
                <h1>Welcome to {{ config('app.name') }}!</h1>
                <h4>Statistics, results & information about Formula1</h4>
                <h5>Containing data since 1950</h5>
            </div>
        </div>
        

        {{-- 1st row --}}
        <div class="row home_bar">

        
            <div class="col-xl-4 d-flex justify-content-center">
                <div class="testo">
                    <a href="/2022"><div class="testo_content text-center">
                        <p>2022 Season</p>
                        @if ($agent->isDesktop())
                            <img class="desktop_image_home" src="/images/jpg/home/current_season.jpg">
                        @endif
                    </div></a>
                </div>
            </div>



            <div class="col-xl-4 d-flex justify-content-center">
                <div class="testo">
                    <a href="/seasons"><div class="testo_content text-center">
                        <p>All seasons</p>
                        @if ($agent->isDesktop())
                            <img class="desktop_image_home" src="/images/jpg/home/all_seasons.jpg">
                        @endif             
                    </div></a>
                </div>      
            </div>


            <div class="col-xl-4 d-flex justify-content-center">
                <div class="testo">                
                    <a href="/circuits"><div class="testo_content text-center">
                        <p>Circuits</p>
                        @if ($agent->isDesktop())
                        <img class="desktop_image_home" src="/images/jpg/home/circuits.jpg">
                        @endif 
                    </div></a>
                </div>
            </div>


            <div class="col-xl-4 d-flex justify-content-center">
                <div class="testo">             
                    <a href="/drivers"><div class="testo_content text-center">
                        <p>Drivers</p>
                        @if ($agent->isDesktop())
                            <img class="desktop_image_home" src="/images/jpg/home/drivers.jpg">
                        @endif 
                    </div></a>
                </div>
            </div>


            <div class="col-xl-4 d-flex justify-content-center">
                <div class="testo">                 
                    <a href="/constructors"><div class="testo_content text-center">
                        <p>Constructors</p>
                        @if ($agent->isDesktop())
                            <img class="desktop_image_home" src="/images/jpg/home/constructors.jpg">
                        @endif 
                    </div></a>                  
                </div>
            </div>


            <div class="col-xl-4 d-flex justify-content-center">
                <div class="testo">           
                    <a href="/statistics"><div class="testo_content text-center">
                        <p>Statistics</p>
                        @if ($agent->isDesktop())
                            <img class="desktop_image_home" src="/images/jpg/home/statistics.jpg">
                        @endif 
                    </div></a>
                </div>
            </div>
            

        </div>
    </div>

    

@endsection
{{-- @include('layouts.menu_bar') --}}