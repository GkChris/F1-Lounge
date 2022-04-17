@extends('layouts.blured_background_image')
<link href="{{ asset('/css/drivers_show.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/post_section.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/previous_next.css') }}" rel="stylesheet" type="text/css" />
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
                    <h1>{{ $thisDriver->forename }} {{ $thisDriver->surname }}</h1>
                    <h4>{{ $thisDriver->nationality }}</h4>
                    <h5>Born: {{ $thisDriver->dob }}</h5>
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
                            <h3><strong>{{ $thisDriverDescriptions[0]->status }}</strong></h3>
                            <h4>{{ $thisDriverStats->driverTotalRaces }} Grand Prix Entries</h4>
                            <a target="_blank" href="{{ $thisDriver->url }}"><h5>View on Wikipedia</h5></a>
                        </div>
                        <div class="circuit_img">
                            <a href="https://www.google.com/search?tbm=isch&q={{ $thisDriver->forename }} {{ $thisDriver->surname }}" target="_blank"><img src="/images/jpg/drivers/{{ $thisDriver->driverRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';"></a>
                        </div>
                    </div>
                </div>

                


                
                <div class="row" id="for_info_p">
                    <div class=".col-xl-12 gp_info border rounded">
                        <div class="p_cont">
                            <p>Name: <strong> {{ $thisDriver->forename }} {{ $thisDriver->surname }}</strong></p>
                            <p>Nationality: <strong> {{ $thisDriver->nationality }}</strong></p>
                            <p>Date of Birth: <strong> {{ $thisDriver->dob }}</strong></p>
                            @if ($thisDriverDescriptions[0]->status == 'Contract - Active Formula 1 Driver')
                                <p>Age: <strong> {{ $thisDriverStats->driverAge }}</strong></p>
                            @endif
                            <p>Driver Status: <strong> {{ $thisDriverDescriptions[0]->status }}</strong></p>
                            @if (isset($thisDriverStats->driverActiveTeam) && isset($thisDriverStats->driverActiveTeamRef))
                                <p>Team: <strong><a href="/constructors/{{ $thisDriverStats->driverActiveTeamRef }}">{{ $thisDriverStats->driverActiveTeam }}</a></strong></p>
                            @endif
                            @if ($thisDriverDescriptions[0]->status == 'Contract - Active Formula 1 Driver')
                                <p>Number: <strong> {{ $thisDriver->number }}</strong></p>
                            @endif 
                            <p>Season Entries: <strong> {{ $thisDriverStats->driverTotalSeasonEntries }}</strong></p>
                            <p>Grand Prix Participations: <strong> {{ $thisDriverStats->driverTotalRaces }}</strong></p>
                            <p>Career Laps: <strong> {{ $thisDriverStats->driverTotalLaps }}</strong></p>
                            <p>First Grand Prix: <strong> {{ $thisDriverStats->driverDebutDate }}</strong></p>
                            <p>Last Grand Prix: <strong> {{ $thisDriverStats->driverLastRaceDate }}</strong></p>
                            <p id="horizontal_separetor">Teams raced for: <strong> {{ $thisDriverStats->driverTotalConstructors }}</strong></p> 
                            @if ($thisDriverStats->driverTotalWins != '0')
                                <p>Drivers' Titles: <strong> {{ $thisDriverStats->driverTotalChampionships }}</strong></p> 
                            @endif 
                            <p>Grand Prix Wins: <strong> {{ $thisDriverStats->driverTotalWins }}</strong></p>
                            <p>Podiums: <strong> {{ $thisDriverStats->driverTotalPodiums }}</strong></p>
                            <p>Pole Positions: <strong> {{ $thisDriverStats->driverTotalPoles }}</strong></p> 
                            @if ($thisDriverStats->driverTotalWins != '0')
                                <p>Wins from Pole: <strong> {{ $thisDriverStats->driverTotalWinsFromPole }}</strong></p>
                            @endif 
                            @if ($thisDriverStats->driverBestQualifyFinish <= '2')
                                <p>Front-Row Starts: <strong> {{ $thisDriverStats->driverTotalFrontRowStarts }}</strong></p>
                            @endif 
                            <p>Fastest Laps: <strong> {{ $thisDriverStats->driverTotalFastestLaps }}</strong></p> 
                            @if ($thisDriverStats->driverTotalWins != '0')
                                <p>Grand Slams: <strong> {{ $thisDriverStats->driverTotalGrandSlams }}</strong></p>
                            @endif  
                            @if ($thisDriverStats->driverTotalWins == '0')
                                <p>Best Race Finish: <strong> {{ $thisDriverStats->driverBestRaceFinish }}</strong></p>
                            @endif   
                            @if ($thisDriverStats->driverTotalPoles == '0')
                                <p>Best Qualify Position: <strong> {{ $thisDriverStats->driverBestQualifyFinish }}</strong></p>
                            @endif  
                            @if ($thisDriverStats->driverTotalChampionships == '0')
                                <p>Best Season Standing: <strong>{{ $thisDriverStats->driverBestSeasonFinish }}</strong></p>
                            @endif     
                            @if ($thisDriverStats->driverTotalPoints > '0')
                                <p>Point Finishes: <strong> {{ $thisDriverStats->driverTotalPointFinishes }}</strong></p>
                            @endif    
                            <p>Career points: <strong> {{ $thisDriverStats->driverTotalPoints }}</strong></p> 
                            <p>Retirements: <strong> {{ $thisDriverStats->driverTotalRetirements }}</strong></p>  
                        </div>
                        <div class="descript_cont">
                            <h3>Description</h3>
                            @isset($thisDriverDescriptions[0]->description)
                            <p id="theDescript">{{ $thisDriverDescriptions[0]->description }}</p>
                            @endisset   
                            @isset($thisDriverDescriptions[0]->source)
                                <p id="source">Description source:&nbsp;&nbsp;<a href="//{{ $thisDriverDescriptions[0]->sourceURL }}" target="_blank">{{ $thisDriverDescriptions[0]->source }}</a></p>   
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
