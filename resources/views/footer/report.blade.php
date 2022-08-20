@extends('layouts.blured_background_image')
<link href="{{ asset('/css/footer/report.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />



{{-- style --}}
<style>
.background_image_blured{
    background-image: url('/images/jpg/backgrounds/9.jpg'); 
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
                    <h1>Report Page</h1>
                    <h4>Missing/Incorrect Data, Bugs & Post/User reports</h4>
                    <h5>Your reports are highly valued</h5>
                </div>
            </div>
        </div>

        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <div>
                            {!! \Session::get('success') !!}
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-xl-12">
                        <div id="rep_cont">
                            <p>Describe the issue in the form below</p>
                            <form method="POST" action="/send_report">@csrf
                                <div style="display: flex; justify-content:center;"><textarea id="report_comment" name="report_comment" cols="40" rows="5" placeholder="Write your report here.."></textarea></div>
                                <div style="display: flex; justify-content:center; margin-top:.5rem;"><input type="submit" value="Send Report"></div>
                            </form>
                        </div>  
                    </div>
                </div>


                

            </div>
        </div>



    </div>



@endsection
