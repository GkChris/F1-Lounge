@extends('layouts.blured_background_image')
<script src="{{ asset('js/contact.js') }}" defer></script>
<link href="{{ asset('/css/footer/contact.css') }}" rel="stylesheet" type="text/css" />
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
                    <h1 style="padding: .5rem 0 .5rem 0;">Contact Page</h1>
                </div>
            </div>
        </div>
       

        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">

                <div class="row">
                    <div class="col-xl-6">
                        <h3>Contact via email</h3>
                        <p id="email">theformula1lounge@gmail.com</p>
                    </div>
                    <div class="col-xl-6">
                        <h3>Contact via Social Media</h3>
                        <div class="fb">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" onclick="thealert()">Facebook</a>
                                </div>
                                <div class="col-6">  
                                    <img src="/images/png/contact/fb.png">
                                </div>
                            </div>
                        </div>
                        <div class="ig">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" onclick="thealert()">Instagram</a>
                                </div>
                                <div class="col-6"> 
                                    <img src="/images/png/contact/ig.png">
                                </div>
                            </div>
                        </div>
                        <div class="tw">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" onclick="thealert()">Twitter</a>
                                </div>
                                <div class="col-6">
                                    <img src="/images/png/contact/tw.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

            </div>
        </div>



    </div>



@endsection
