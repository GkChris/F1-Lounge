@extends('layouts.blured_background_image')
<script src="{{ asset('js/posts.js') }}" defer></script>
<script src="{{ asset('js/current_season.js') }}" defer></script>
<link href="{{ asset('/css/seasons_current.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/info_card.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/small_option_bar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/post_section.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/options_bar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/previous_next.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/current_season/driver_standings.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/current_season/constructor_standings.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/current_season/driver_participants.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/current_season/constructor_participants.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/current_season/calendar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/current_season/overview.css') }}" rel="stylesheet" type="text/css" />




{{-- style --}}
<style>
.standings{
    display: none;
}

.calendar{
    display: none;
}

.participants{
    display:none;
}

.constructor_standings{
    display:none;
}

.constructor_participants{
    display: none;
}


/* PREVIOUS NEXT MOBILE */
#prev_next{
    width: 50% !important;
    margin-bottom: .6rem;
}

.prev_next_mobile_subdiv{
    width: 35%;
    background-color: white;
    display: flex;
    justify-content: center;
    padding: .2rem .4rem;
    border: 1px solid black;
}

.prev_next_mobile_subdiv a{
    color: black;
}


p{
    font-size: 1.4rem;
}




</style>
    
<script>

</script>

@section('main_content')

@include('layouts.menu_bar')



    {{-- page container --}}
    <div class="container">
        

        <div class="row">
            <div class="col-12">
                <div class="page_info d-flex flex-column text-center">
                    <h1>2023 Championship </h1>
                    <h4>Next Race: March 2023</h4>
                    <h5>Formula 1 is currently on winter break</h5>
                    {{-- is supposed to be $thisSeason->intenseLelel --}}
                </div>
            </div>
        </div>


        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">
                <h1>What to expect from the new season?</h1>
                <p>
                    Formula 1 2023 season is expected to be an full of action. Teams are getting 
                    familiar with the new techincal regulations. More teams will be fighting for podium finishers
                    and more track battles between drivers are expected to happen.
                </p>
                <h1>2023 season data are going to be updated soon</h1> 
                <p>
                These informations will include driver changes, new circuits and the brand new calendar.
                </p>
            </div>
        </div>



    </div>



@endsection


