@extends('layouts.blured_background_image')
<script src="{{ asset('js/constructors_index.js') }}" defer></script>
<link href="{{ asset('/css/constructors_index.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info_index.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/seasons_show/constructor_participants.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/search_box.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


{{-- style --}}
<style>




</style>
    


@section('main_content')

@include('layouts.menu_bar')

    {{-- page container --}}
    <div class="container" onclick="closeSearch();">

        <div class="row">
            <div class="col-12">
                <div class="page_info d-flex flex-column text-center">
                    <h1>Formula 1 Constructors</h1>
                    <h4>{{ count($allConstructors) }} constructors from {{ $allConstructorsDistinctCountries }} countries</h4>
                    <h5>All F1 constructors since 1950</h5>
                </div>
            </div>
        </div>


        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">

                {{-- 1st row --}}
                <div class="row">
                    <div class="col-xl-5">
                        <div class="season_rounds">
                           <a href="/seasons"><p class="border rounded">Search constructors by season</p></a> 
                           <i>Select season -> Participants -> Constructors</i>
                           <a href="/2021"><p class="border rounded">See active constructors</p></a> 
                           <i>Go to Participants -> Constructors</i>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        {{-- <div class="index_sortying">
                            <p id="sorting_value">Country</p>
                            <div class="sort_div border rounded">
                                <i class="fa fa-sort"></i>
                                <p>Sorted by</p>
                            </div>
                        </div> --}}

                        <div class="search_box_cont">
                            <div class="search_box">
                                <p id="searchP">Search</p>
                                <div class="form-group" id="searchForm">
                                    <input type="text" class="form-controller" id="search" name="search" onkeyup="openSearch();">                              
                                </div>
                            </div>
                            <div id="result_box" class="rounded"></div>
                        </div>
                    </div>
                </div>




                <div class="row" id="index_content">
                    @include('layouts.constructors_index.country_sort')
                </div>
                




                <div class="row">
                    <div class="toLink">
                        <div class="paginator">
                            {{ $allConstructorsByCountry->links() }}
                        </div>
                    </div>
                    
                </div>
              
            
                
                




            </div>
        </div>


    </div>


@endsection
