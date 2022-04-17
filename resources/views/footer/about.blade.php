@extends('layouts.blured_background_image')
<link href="{{ asset('/css/footer/about.css') }}" rel="stylesheet" type="text/css" />
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
                    <h1 style="padding: 0 0 .5rem 0;">About me</h1>
                </div>
            </div>
        </div>


        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">

                <div class="row" id="cont_row">
                    <div class="col-xl-6" id="me_social">
                        <img class="rounded" id="me" src="/images/png/about/me.png">
                    </div>
                    <div class="col-xl-6 mt-3">
                        <h1>Christos Gkagkas</h1>
                        <h3>Software Science undergraduate student. </br> University of Thessaly, Greece</h3>
                        <p>
                            I'm an undergraduate studend, interested in programming related projects. 
                            This project is my thesis and is solo developed by me</br>
                            I'm passioned with learning new things, be creative, drink coffee and watch motorsport. </br>
                            This website is my best work so far, as I've being able to combine all the aspects that 
                            i learned through small projects in a bigger scale. </br>
                            I'm currenly trying to expand my knowledge in the Web Development field, be open minded 
                            for potential opportunities and work my way through to earn an MSc after my first degree.</br>
                            Last but not least, it's in my intentions to keep updating {{ config('app.name') }} on a regular basis.
                        </p>
                    </div>
                </div>


                

            </div>
        </div>



    </div>



@endsection
