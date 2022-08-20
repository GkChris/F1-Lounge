@extends('layouts.blured_background_image')
<script src="{{ asset('js/seasons_show.js') }}" defer></script>
<script src="{{ asset('js/posts.js') }}" defer></script>
<link href="{{ asset('/css/seasons_show.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/overview.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/drivers_table.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/constructor_table.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/rounds.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/driver_participants.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/constructor_participants.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/info_card.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/small_option_bar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/post_section.css') }}" rel="stylesheet" type="text/css" />

{{-- style --}}
<style>
/* BACKGROUND IMAGE */
.background_image_blured{
    background-image: url('/images/jpg/season_winner_car/{{ $thisSeason->year }}.jpg'); 
}

.standings{
    display: none;
}


.rounds{
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


.descript_cont h3{
    margin: 2rem 1rem 0 1rem;
    text-align: center;
    border-bottom: 1px solid black;
}

.descript_cont p{
    margin: 2rem 1rem 1rem;
    word-break:normal;
    white-space: normal;
}

#source{
    position: relative;
    float: right;
    margin: 2rem 1rem 1rem 1rem;
}


/* MEDIA */
@media only screen and (max-width: 1199.98px){
    #for_info_p{
        display: flex;
        justify-content: center;
    }
    
    .gp_info{
        margin: 3.5rem 0rem 1rem 0rem;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    
    }
    
    .gp_info .p_cont{
        margin: 1.5rem 1rem 0 1rem;
    }

        
    .p_cont{
        width: 100%;
    }

    .descript_cont{
        width:100%;
    }
}

@media only screen and (min-width: 1200px) {

    #for_info_p{
        display: flex;
        justify-content: center;
    }
    
    .gp_info{
        margin: 3.5rem 0rem 1rem 0rem;
        width: 85%;
        display: flex;
        justify-content: center;
        background-color: rgba(255, 255, 255, 0.7);
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    
    }
    
    .gp_info .p_cont{
        margin: 1.5rem 1rem 0 1rem;
    }

    
    .p_cont{
        width: 30%;
    }

    .descript_cont{
        width:69.98%;
        border-left: 2px solid black;
    }

}






/* previous next */
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
                    <h4 style="padding: 0 0 .5rem 0;">{{ $thisSeason->rounds }} Rounds , {{ $thisSeason->noc }} different countries , {{ $thisSeason->drivers }} Drivers 
                    @if($thisSeason->year > 1957)    , {{ $thisSeason->constructors }} Teams @endif</h4>
                    {{-- is supposed to be $thisSeason->intenseLelel --}}
                    {{-- <h5>Championship instense level: chaos</h5> --}}
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
                    @if ($thisSeason->year > 1950)
                        <div id="prev_desktop"><a href="{{ $thisSeason->year - 1 }}">Previous Season</a></div>
                    @endif
                    @if ($thisSeason->year < 2022)
                        <div id="next_desktop"><a href="{{ $thisSeason->year + 1 }}">Next Season</a></div>
                    @endif
                </div>
                @endif
    
                
                {{-- 1st row --}}
                <div class="row">
                    @if (!$agent->isDesktop())
                    <div class="options_bar" id="prev_next">
                        @if ($thisSeason->year > 1950)
                            <div class="prev_next_mobile_subdiv"><a href="{{ $thisSeason->year - 1 }}">Previous Season</a></div>
                        @endif
                        @if ($thisSeason->year < 2022)
                            <div class="prev_next_mobile_subdiv"><a href="{{ $thisSeason->year + 1 }}">Next Season</a></div>
                        @endif
                    </div>
                    @endif

                    
                    <div class="options_bar">
                        <div class="nav_options" id="overview" onclick="changeNav(this);"><p>Overview</p></div>
                        <div class="nav_options" id="standings" onclick="changeNav(this);"><p>Standings</p></div>
                        <div class="nav_options" id="rounds" onclick="changeNav(this);"><p>Rounds</p></div>
                        <div class="nav_options" id="participants" onclick="changeNav(this);"><p>Participants</p></div>
                    </div>
                </div>


                <div class="row">
                    <div class="overview" id="overview_div">
                        @include('layouts.seasons_show.overview')
                    </div>

                    <div class="standings" id="standings_div">
                        @include('layouts.seasons_show.standings')             
                    </div>

                    <div class="rounds" id="rounds_div">
                        @include('layouts.seasons_show.rounds')                    
                    </div>


                    
                    <div class="participants" id="participants_div">
                        @include('layouts.seasons_show.participants')
                    </div>
                    

                </div>
                



                {{-- post section --}}
                @include('layouts.post_section')

            </div>
        </div>



    </div>



@endsection

