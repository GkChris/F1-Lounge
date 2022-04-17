@extends('layouts.app')
<link href="{{ asset('/css/layouts/blured_background_image.css') }}" rel="stylesheet" type="text/css" />


@section('content')


    <!-- -----Full screen leght container----- -->
    <div class="cont" id="background_image_blured_blade_cont">
        <div class="background_image_blured">

        </div>

        <!-- -----Inner container----- -->
        <div class="content border">
            @yield('main_content')
        </div>

    </div>

  


@endsection