@extends('layouts.blured_background_image')
<link href="{{ asset('/css/seasons_index.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/info_card.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />



@section('main_content')

@include('layouts.menu_bar')

    {{-- page container --}}
    <div class="container">


        <div class="row">
            <div class="seasons_info col-12 d-flex flex-column text-center">
                <h1>All seasons</h1>
                <h4>Driver & constractor standings. Season calendar & race results</h4>
                <h5>Since 1950</h5>
            </div>
        </div>



        {{-- 1st row --}}
        <div class="row">
            <div class="seasons_bar">
                <ul class="row grid-row text-center justify-content-around">
                    @foreach ($allSeasons->sortBy('year')->reverse() as $season)
                        <a class="col-xl-1" href="/{{ $season->year }}"><p>{{ $season->year }}</p></a>
                    @endforeach
                </ul>    
            </div>
        

        </div>


    </div>

    

@endsection
