@extends('layouts.blured_background_image')
<script src="{{ asset('js/admin.js') }}" defer></script>
<link href="{{ asset('/css/user/admin.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/post_section.css') }}" rel="stylesheet" type="text/css" />


{{-- style --}}
<style>
.background_image_blured{
    background-image: url('/images/jpg/backgrounds/9.jpg'); 
} 

#posts{
    background-color: #C0C0C0;
}

#reports_div{
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
                    <h1 style="padding: 0 0 .5rem 0;">Admin Page</h1>
                </div>
            </div>
        </div>


        {{-- inner container --}}
        <div class="container_box_content d-flex justify-content-center">
            <div class="container_box_box">

                <div class="row mt-3">
                    <div class="col-xl-3" id="dropdown_cont" style="margin-top: 3rem;">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" style="background-color: white; color: black;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Select Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <p class="dropdown-item" id="posts" onclick="changeNav(this);">Review Posts</p>
                                <p class="dropdown-item" id="reports" onclick="changeNav(this);">Review Reports</p>
                            </div>
                          </div>
                    </div>


                    
                    <div class="col-xl-9" id="admin_cont" style="margin-top: 1rem;">

                        <div class="admin_div rounded" id="posts_div">
                            @include('user.admin_actions.post_review') 
                        </div>


                        <div class="admin_div rounded" id="reports_div">
                            @include('user.admin_actions.reports_review') 
                        </div>
    
                  </div>
                </div>


                

            </div>
        </div>



    </div>



@endsection
