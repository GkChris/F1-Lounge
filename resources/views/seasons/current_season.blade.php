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
                    <h1>{{ $thisSeason->year }} Championship </h1>
                    <h4>Next Race: {{ $thisNextGpCountdown }}</h4>
                    <h5>{{ $thisSeason->rounds }} Rounds , {{ $thisSeason->noc }} different countries , {{ $thisSeason->drivers }} Drivers 
                    @if($thisSeason->year > 1957)    , {{ $thisSeason->constructors }} Teams @endif</h5>
                    {{-- is supposed to be $thisSeason->intenseLelel --}}
                </div>
            </div>
        </div>


        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">

                @if (\Session::has('success'))
                <div class="alert alert-success">
                        <div>
                            {!! \Session::get('success') !!}
                        </div>
                    </div>
                @endif


                {{-- previous next --}}
                @if ($agent->isDesktop()) 
                <div id="prev_next_desktop">
                    <div id="prev_desktop"><a href="{{ $thisSeason->year - 1 }}">Previous Season</a></div>
                </div>
                @endif
    
                



                {{-- 1st row --}}
                <div class="row">
                    @if (!$agent->isDesktop())
                    <div class="options_bar" id="prev_next">
                        <div class="prev_next_mobile_subdiv"><a href="{{ $thisSeason->year - 1 }}">Previous Season</a></div>
                    </div>
                    @endif

                    
                    <div class="options_bar">
                        <div class="nav_options" id="overview" onclick="changeNav(this);"><p>Overview</p></div>
                        <div class="nav_options" id="standings" onclick="changeNav(this);"><p>Standings</p></div>
                        <div class="nav_options" id="calendar" onclick="changeNav(this);"><p>Calendar</p></div>
                        <div class="nav_options" id="participants" onclick="changeNav(this);"><p>Participants</p></div>
                    </div>


                </div>


                <div class="row">
                    <div class="overview" id="overview_div">
                        @include('layouts.current_season.overview')
                    </div>

                    <div class="standings" id="standings_div">
                        @include('layouts.current_season.standings')             
                    </div>

                    <div class="calendar" id="calendar_div">
                        @include('layouts.current_season.calendar')                    
                    </div>


                    
                    <div class="participants" id="participants_div">
                        @include('layouts.current_season.participants')
                    </div>
                    

                </div>



                {{-- post section --}}
                @include('layouts.post_section')

            </div>
        </div>



    </div>



@endsection


