@extends('layouts.blured_background_image')
<link href="{{ asset('/css/statistics.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/post_section.css') }}" rel="stylesheet" type="text/css" />
{{-- TABLE CSS --}}
<link href="{{ asset('/css/layouts/races_show/race.css') }}" rel="stylesheet" type="text/css" />



{{-- style --}}
<style>
#iddle_row{
    width: 100%;
    justify-content: center;
    margin:auto;
}

.cont_table{
    width: 75%;
}

th,td{
    text-align: center !important;
}


/* MEDIA */
@media only screen and (max-width: 1199.98px){

}

@media only screen and (min-width: 1200px) {

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
                    <h5>Most Championships</h5>
                </div>
            </div>
        </div>


        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">


                <div class="row" id="iddle_row">
                    <div class="cont_table">
                        <table class="table">
                            <thead class="thead-dark align-middle">
                                <th scope="col">Driver</th>
                                <th scope="col">Championships</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($thisStatChampionships as $driver)
                                    <tr>
                                        <td><a style="color:black" href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>  
                                        <td>{{ $driver->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
                


            </div>
        </div>



    </div>



@endsection


