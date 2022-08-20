@extends('layouts.blured_background_image')
<link href="{{ asset('/css/circuits_show.css') }}" rel="stylesheet" type="text/css" />
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
                    <h1>{{ $thisCircuit->name }}</h1>
                    <h4>{{ $thisCircuit->country }}</h4>
                    <h5>{{ $thisCircuit->location }}</h5>
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
                            <h3><strong>{{ $thisCircuitDescriptions[0]->status }}</strong></h3>
                            <h4>Hosted Grand Prix: {{ $thisCircuitStats->circuitTotalRaces }}</h4>
                            <div class="a_cont">
                                <a style="margin-left: 0%;" target="_blank" href="http://maps.google.com/maps?z=1&t=k&q=loc:{{ $thisCircuit->lat }}+{{ $thisCircuit->lng }}"><h5>View on Google Maps</h5></a>
                                <a target="_blank" href="{{ $thisCircuit->url }}"><h5>View on Wikipedia</h5></a>
                            </div>
                        </div>
                        <div class="circuit_img">
                            <a href="https://www.google.com/search?tbm=isch&q={{ $thisCircuit->name }}" target="_blank"><img src="/images/jpg/circuits/bg/{{ $thisCircuit->circuitRef }}.jpg"></a>
                        </div>
                    </div>
                </div>




                
                <div class="row" id="for_info_p">
                    <div class=".col-xl-12 gp_info border rounded">
                        <div class="p_cont">
                            <p>Name: <strong>{{ $thisCircuit->name }}</strong></p>
                            <p>Country: <strong>{{ $thisCircuit->country }}</strong></p>
                            <p>Location: <strong>{{ $thisCircuit->location }}</strong></p>
                            <p>Circuit status: <strong>{{ $thisCircuitDescriptions[0]->status }}</strong></p>
                            <p>Grand Prix hosted: <strong>{{ $thisCircuitStats->circuitTotalRaces }}</strong></p>
                            @if ($thisCircuitStats->circuitTotalRaces != '0')
                                <p>First Grand Prix: <strong>{{ $thisCircuitStats->circuitDebut}}</strong></p>
                                <p>Last Grand Prix: <strong>{{ $thisCircuitStats->circuitLastRace }}</strong></p>
                            @endif
                            @isset($thisCircuitDescriptions[0]->distance)
                                <p>Lap distance: <strong>{{ $thisCircuitDescriptions[0]->distance }} Km</strong></p>
                            @endisset
                        </div>
                        <div class="descript_cont">
                            <h3>Description</h3>
                            @isset($thisCircuitDescriptions[0]->description)
                                <p>{{ $thisCircuitDescriptions[0]->description }}</p>
                            @endisset
                            @isset($thisCircuitDescriptions[0]->source)
                                <p id="source">Description source:&nbsp;&nbsp;<a href="//{{ $thisCircuitDescriptions[0]->sourceURL }}" target="_blank">{{ $thisCircuitDescriptions[0]->source }}</a></p>   
                            @endisset
                        </div>
                    </div>
                
                </div>
                
                
                

                {{-- Post section --}}
                @include('layouts.post_section')                

            </div>
        </div>


    </div>


@endsection
