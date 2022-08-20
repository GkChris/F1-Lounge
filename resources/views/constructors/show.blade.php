@extends('layouts.blured_background_image')
<link href="{{ asset('/css/constructors_show.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/post_section.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('js/posts.js') }}" defer></script>


{{-- style --}}
<style>




</style>
    


@section('main_content')

@include('layouts.menu_bar')

    {{-- page container --}}
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="page_info d-flex flex-column text-center">
                    <h1>{{ $thisConstructor->name }}</h1>
                    <h4>{{ $thisConstructor->nationality }}</h4>
                    <h5>Season Entries: {{ $thisConstructorStats->constructorSeasonEntries }}</h5>
                    {{-- Status Active OR Status not active, Last Grand Prix was hold on XX-XX-XXXX --}}
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

                {{-- 1st row --}}
                <div class="row" id="circ_show_cont">
                    <div class="row circuit_grid">
                        <div class="circuit_info">
                            <h3><strong>{{ $thisConstructorDescriptions[0]->status }}</strong></h3>
                            <h4>{{ $thisConstructorStats->constructorTotalRaces }} Grand Prix Entries</h4>
                            <a target="_blank" href="{{ $thisConstructor->url }}"><h5>View on Wikipedia</h5></a>
                        </div>
                        <div class="circuit_img">
                            <a href="https://www.google.com/search?tbm=isch&q={{ $thisConstructor->name }} Formula 1" target="_blank"><img src="/images/jpg/constructors/{{ $thisConstructor->constructorRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';"></a>
                        </div>
                    </div>
                </div>

                


                
                <div class="row" id="for_info_p">
                    <div class=".col-xl-12 gp_info border rounded">
                        <div class="p_cont">
                            <p>Name: <strong>{{ $thisConstructor->name }}</strong></p>
                            <p>Nationality: <strong>{{ $thisConstructor->nationality }}</strong></p>
                            <p>Constructor status: <strong>{{ $thisConstructorDescriptions[0]->status }}</strong></p>
                            @if (isset($thisConstructorStats->constructorActiveDriver1) && isset($thisConstructorStats->constructorActiveDriver2))
                                <p>First Driver: <strong><a href="/drivers/{{ $thisConstructorStats->constructorActiveDriver1Ref }}">{{ $thisConstructorStats->constructorActiveDriver1 }}</a></strong></p>
                                <p>Second Driver: <strong><a href="/drivers/{{ $thisConstructorStats->constructorActiveDriver2Ref }}">{{ $thisConstructorStats->constructorActiveDriver2 }}</a></strong></p>
                            @endif
                            <p>Season Entries: <strong>{{ $thisConstructorStats->constructorSeasonEntries }}</strong></p>
                            <p>Grand Prix participations: <strong>{{ $thisConstructorStats->constructorTotalRaces }}</strong></p>
                            <p>First Grand Prix: <strong>{{ $thisConstructorStats->constructorDebutDate }}</strong></p>
                            <p>Last Grand Prix: <strong>{{ $thisConstructorStats->constructorLastRaceDate }}</strong></p>
                            <p id="horizontal_separetor">Total Drivers: <strong>{{ $thisConstructorStats->constructorTotalDrivers }}</strong></p>
                            @if ($thisConstructorStats->constructorTotalWins != '0')
                                <p>Constructors' Titles: <strong>{{ $thisConstructorStats->constructorChampionships }}</strong></p>
                            @endif 
                            @if ($thisConstructorStats->constructorTotalWins != '0')
                                <p>Drivers' Titles: <strong>{{ $thisConstructorStats->constructorDriversChampionships }}</strong></p>
                            @endif
                            <p>Grand Prix Wins: <strong>{{ $thisConstructorStats->constructorTotalWins }}</strong></p>
                            <p>Podiums: <strong>{{ $thisConstructorStats->constructorTotalPodiums }}</strong></p>
                            <p>Pole Positions: <strong>{{ $thisConstructorStats->constructorTotalPoles }}</strong></p>
                            @if ($thisConstructorStats->constructorTotalWins != '0')
                                <p>One - Two Finishes: <strong>{{ $thisConstructorStats->constructorTotalOneTwoFinishes }}</strong></p>
                            @endif
                            @if ($thisConstructorStats->constructorTotalPoles != '0')
                                <p>Front Row Lockouts: <strong>{{ $thisConstructorStats->constructorTotalFrontRowLockouts }}</strong></p>
                            @endif 
                            <p>Total Points: <strong>{{ $thisConstructorStats->constructorTotalPoints }}</strong></p>
                            @if ($thisConstructorStats->constructorTotalWins == '0')
                                <p>Best Race Finish: <strong>{{ $thisConstructorStats->constructorBestRaceFinish }}</strong></p>
                            @endif
                            @if ($thisConstructorStats->constructorTotalPoles == '0' || $thisConstructorStats->constructorTotalPoles != '-')
                                <p>Best Qualify Position: <strong>{{ $thisConstructorStats->constructorBestQualifyFinish }}</strong></p>
                            @endif
                            @if ($thisConstructorStats->constructorChampionships == '0' || $thisConstructorStats->constructorChampionships != '-')
                                <p>Best Season Standing: <strong>{{ $thisConstructorStats->constructorBestSeasonFinish }}</strong></p>
                            @endif    
                            @if ($thisConstructorStats->constructorTotalPoints > '0')
                                <p>Point Finishes: <strong>{{ $thisConstructorStats->constructorTotalPointFinishes }}</strong></p>
                            @endif  
                            <p>Retirements: <strong>{{ $thisConstructorStats->constructorTotalRetirements }}</strong></p>
                            
                        </div>
                        <div class="descript_cont">
                            <h3>Description</h3>
                            @isset($thisConstructorDescriptions[0]->description)
                            <p id="theDescript">{{ $thisConstructorDescriptions[0]->description }}</p>
                            @endisset   
                            @isset($thisConstructorDescriptions[0]->source)
                                <p id="source">Description source:&nbsp;&nbsp;<a href="//{{ $thisConstructorDescriptions[0]->sourceURL }}" target="_blank">{{ $thisConstructorDescriptions[0]->source }}</a></p>   
                            @endisset
                        </div>
                    </div>
                
                </div>
                
                
                


                {{-- post section --}}
                @include('layouts.post_section')

            </div>
        </div>


    </div>


@endsection
