@extends('layouts.blured_background_image')
<script src="{{ asset('js/gallery.js') }}" defer></script>
<link href="{{ asset('/css/footer/gallery.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />



{{-- style --}}
<style>
.background_image_blured{
    background-image: url('/images/jpg/backgrounds/9.jpg'); 
} 


#constructors_div,#circuits_div,#extras_div,#winning_div{
    display: none;
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
                    <h1>Formula 1 Gallery</h1>
                    <h5 style="padding: .5rem 0 .5rem 0;">An illustrated collection of {{ config('app.name') }} media</h5>
                </div>
            </div>
        </div>


        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">

                <div class="row">
                    <div class="col-xl-3" id="dropdown_cont" style="margin-top: 3rem;">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" style="background-color: white; color: black;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Select Gallery
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <p class="dropdown-item" id="drivers" onclick="changeNav(this);">Drivers</p>
                              <p class="dropdown-item" id="constructors" onclick="changeNav(this);">Constructors</p>
                              <p class="dropdown-item" id="circuits" onclick="changeNav(this);">Circuits</p>
                              <p class="dropdown-item" id="winning" onclick="changeNav(this);">WC Winner Cars</p>
                              <p class="dropdown-item" id="extras" onclick="changeNav(this);">Extra</p>
                            </div>
                          </div>
                    </div>


                    
                    <div class="col-xl-9" id="gallery_cont" style="margin-top: 1rem;">

                        <div class="image_div rounded" id="drivers_div">
                            @include('footer.gallery.drivers') 
                        </div>
    
    
                        <div class="image_div rounded" id="constructors_div">
                            @include('footer.gallery.constructors') 
                        </div>
    
    
                        <div class="image_div rounded" id="circuits_div">
                            @include('footer.gallery.circuits') 
                        </div>

                        <div class="image_div rounded" id="winning_div">
                            @include('footer.gallery.winning') 
                        </div>
    

                        <div class="image_div rounded" id="extras_div">
                            @include('footer.gallery.extra') 
                        </div>
                  </div>
                </div>


                

            </div>
        </div>



    </div>



@endsection
