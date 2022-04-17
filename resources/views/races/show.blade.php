@extends('layouts.blured_background_image')
<script src="{{ asset('js/races_show.js') }}" defer></script>
<script src="{{ asset('js/posts.js') }}" defer></script>
<link href="{{ asset('/css/races_show.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/info_card.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/options_bar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/small_option_bar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/races_show/overview.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/races_show/race.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/races_show/extras.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/driver_participants.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/constructor_participants.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/post_section.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

{{-- style --}}
<style>
/* BACKGROUND IMAGE */
.background_image_blured{
    background-image: url('/images/jpg/circuits/bg/{{ $thisCircuit->circuitRef }}.jpg'); 
}

/* DISPLAYS */
.race{
    display: none;
}

.qualifying{
    display: none;
}

#q_sr_div{
    display: none;
}

.extras{
    display: none;
}

.pit_stops{
    display: none;
}

.fastest_laps{
    display: none;
}

.participants{
    display: none;
}

.circuit{
    display: none;
}


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


#prev_next_desktop{
    display: flex;
    justify-content: space-between
}


#prev_desktop{
    position: relative;
    top: -1.8rem;
    left: -2rem;
}

#next_desktop{
    position: relative;
    top: -1.8rem;
    right: -2rem;
}

#prev_desktop a, #next_desktop a{
    color: white;
    text-decoration: underline;
    font-style: italic;
    font-size: 0.8rem;
}

h1 a{
    color: black;
    cursor: pointer;
}

h1 a:hover{
    color: black;
}


/* MEDIA */
@media only screen and (max-width: 1199.98px){



}

@media only screen and (min-width: 1200px) {


}

</style>
    


@section('main_content')

@include('layouts.menu_bar')

    {{-- page container --}}
    <div class="container" id="conty">


        <div class="row">
            <div class="col-12">
                <div class="page_info d-flex flex-column text-center">
                    <h1>{{ $thisRace->name }} <a href="/{{ $thisRace->year }}">{{ $thisRace->year }}</a></h1>
                    <h4>Round {{ $thisRace->round }} | {{ $thisRace->date }}@if(isset($data[0]['time']) && $data[0]['time']!= '\N') | {{ $thisRace->time }}@endif</h4>
                    <h5>{{ $thisCircuit->name }}</h5>
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
                    @if ($thisRace->raceId != $thisFirstRace[0]->raceId)
                        <div id="prev_desktop"><a href="{{ $thisRace->round - 1 }}">Previous Race</a></div>
                    @endif
                    @if ($thisRace->raceId != $thisLastRace[0]->raceId)
                        <div id="next_desktop"><a href="{{ $thisRace->round + 1 }}">Next Race</a></div>
                    @endif
                </div>
                @endif

                 {{-- 1st row --}}
                 <div class="row">  
                    @if (!$agent->isDesktop())         
                    <div class="options_bar" id="prev_next">
                        @if ($thisRace->raceId != $thisFirstRace[0]->raceId)
                            <div class="prev_next_mobile_subdiv"><a href="{{ $thisRace->round - 1 }}">Previous Race</a></div>
                        @endif
                        @if ($thisRace->raceId != $thisLastRace[0]->raceId)
                            <div class="prev_next_mobile_subdiv"><a href="{{ $thisRace->round + 1 }}">Next Race</a></div>
                        @endif
                    </div>
                    @endif
                    <div class="options_bar">
                        <div class="nav_options" id="overview" onclick="changeNav(this);"><p>Overview</p></div>
                        <div class="nav_options" id="race" onclick="changeNav(this);"><p>Race</p></div>
                        @if (isset($thisFullQualifying->first()->forename))
                            <div class="nav_options" id="qualifying" onclick="changeNav(this);"><p>Qualifying</p></div>
                        @else
                            <div class="nav_options" id="qualifying" style="cursor: not-allowed; opacity:0.5;" title="No qualifying data"><p>Qualifying</p></div>
                        @endif
                        <div class="nav_options" id="extras" onclick="changeNav(this);"><p>Extra</p></div>
                    </div>
                </div>


                
                <div class="row cont_row">

                    <div class="overview" id="overview_div">
                        @include('layouts.races_show.overview')
                    </div>

                    <div class="race" id="race_div">
                        @include('layouts.races_show.race')
                    </div>

                    <div class="qualifying" id="qualifying_div">
                        @include('layouts.races_show.qualifying')
                    </div>

                    <div class="extras" id="extras_div">
                        @include('layouts.races_show.extras')
                    </div>         

                </div>
                


                {{-- post section --}}
                @include('layouts.post_section')


            </div>
        </div>



    </div>

   
    @include('layouts.races_show.modal')





@endsection
