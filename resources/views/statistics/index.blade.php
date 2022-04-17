@extends('layouts.blured_background_image')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/posts.js') }}" defer></script>
<script src="{{ asset('js/statistics.js') }}" defer></script>
<link href="{{ asset('/css/statistics.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/post_section.css') }}" rel="stylesheet" type="text/css" />

{{-- style --}}
<style>
#constructors_div,#circuits_div,#extras_div{
    display: none;
}

#drivers{
    background-color: rgba(0,0,0,0.3);
    color: white;
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
                    <h1>Formula 1 </h1>
                    <h4>Statistics</h4>
                </div>
            </div>
        </div>


        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">

                <div class="w-100 text-center"><h1>COMING SOON</h1></div>

                {{-- <div class="row">
                    <div class="stats_drop">
                        <div class="stats_options rounded" id="drivers" onclick="changeNav(this);"><p>Drivers</p><i class="fa fa-caret-up"></i></div>
                        <div class="stats_options rounded" id="constructors" onclick="changeNav(this);"><p>Constructors</p><i class="fa fa-caret-down"></i></div>
                        <div class="stats_options rounded" id="circuits" onclick="changeNav(this);"><p>Circuits</p><i class="fa fa-caret-down"></i></div>
                        <div class="stats_options rounded" id="extras" onclick="changeNav(this);"><p>Extra</p><i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                


                <div class="row">

                    <div class="stats_div" id="drivers_div">
                        <div class="stats_div_cont rounded" id="drivers_div_cont">
                            <a href="/statistics/championships" target="_blank"><p>Most Championships</p></a>
                            <p>Most race wins</p>
                            <p>Most pole positions</p>
                            <p>Most Grand Prix participations</p>
                            <p>Most podiums</p>
                            <p>Most wins from pole</p>
                            <p>Most Front-Row starts</p>
                            <p>Most fastest laps</p>
                            <p>Most Grand Slams</p>
                            <p>Most point finishes</p>
                            <p>Most retirements</p>      
                            <p>Most season entries</p>
                            <p>Most races without a win</p>
                            <p>Most races without a podium</p>
                            <p>Most races without a pole</p>
                            <p>Most consecutive race finishes</p>
                        </div>
                    </div>


                    <div class="stats_div" id="constructors_div">
                        <div class="stats_div_cont rounded">
                            <p>Most Constructors' Championships</p>
                            <p>Most Drivers' Championships</p>
                            <p>Most race wins</p>
                            <p>Most pole positions</p>
                            <p>Most Grand Prix participations</p>
                            <p>Most podiums</p>
                            <p>Most Front-Row lockouts</p>
                            <p>Most One-Two finishes</p>
                            <p>Most fastest laps</p>
                            <p>Most point finishes</p>     
                            <p>Most season entries</p>
                            <p>Most points</p>
                        </div>
                    </div>


                    <div class="stats_div" id="circuits_div">
                        <div class="stats_div_cont rounded">
                            <p>Most grand prix hosts</p>
                            <p>Longest circuits</p>
                            <p>Sortest circuits</p>
                        </div>
                    </div>


                    <div class="stats_div" id="extras_div">
                        <div class="stats_div_cont rounded">
                            <p>Race with the most laps</p>
                        </div>
                    </div>


                </div> --}}



            </div>
        </div>



    </div>



@endsection


