@extends('layouts.blured_background_image')
<script src="{{ asset('js/profile.js') }}" defer></script>
<link href="{{ asset('/css/user/profile.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/container_box.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/layouts/page_info.css') }}" rel="stylesheet" type="text/css" />



{{-- style --}}
<style>
.background_image_blured{
    background-image: url('/images/jpg/backgrounds/8.jpg'); 
} 

.theSpans{
    font-weight: bold;
    visibility: hidden;
    margin: auto;
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
                    <h1 style="padding: 0 0 .5rem 0;">Account</h1>
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


                <div class="row mt-3">
                    <div class="col-xl-6">
                        <div class="rounded" id="p_cont">
                            <p><strong>Username:</strong> {{ $user->name }}</p>
                            <p><strong>email:</strong> {{ $user->email }}</p>
                            <p><strong>Posts:</strong> {{ $user->postCounter }}</p>
                            <p><strong>Account creation date:</strong> {{ $user->created_at }}</p>
                        </div>
                    </div>



                    <div class="col-xl-6">
                        <div id="setUp_cont">
                            <div class="c_name_mail rounded" id="username_box" onclick="openField(this);"><p>Change Username</p></div>

                            <div class="rounded" id="username_field">
                                <p onclick="closeField();" id="p1p" class="theFormP">Close</p>
                                <form id="uname_form" method="POST" action="/change_username">@csrf
                                    <div><label for="pass_old">Current Password</label></div>
                                    <div><input type="password" id="pass_old" name="pass_old" placeholder="Place current password" required></div>
                                    <div><label for="uname_name">New Username</label></div>
                                    <div><input type="text" id="uname_name" name="uname_name" placeholder="Place new username" required onkeyup="searchUsername();"></div>
                                    <div><span class="theSpans" id="uname_span">Free or Not</span></div>
                                    <div style="margin-top: .7rem;"><input id="uname_button" type="submit" value="Submit"></div>
                                </form>
                            </div>




                            <div class="c_name_mail rounded" id="email_box" onclick="openField(this);"><p>Change email</p></div>

                            <div id="mail_field">
                                <p onclick="closeField();" id="p2p" class="theFormP">Close</p>
                                <form id="mail_form" method="POST" action="/change_mail">@csrf
                                    <div><label for="pass_old">Current Password</label></div>
                                    <div><input type="password" id="pass_old" name="pass_old" placeholder="Place current password" required></div>
                                    <div><label for="mail_name">New Email</label></div>
                                    <div><input type="email" class="@error('email') is-invalid @enderror" id="mail_name" name="mail_name" placeholder="Place new email" required onkeyup="searchMail();"></div>
                                    <div><span class="theSpans" id="mail_span">Free or Not</span></div>
                                    <div style="margin-top: .7rem;"><input id="mail_button" type="submit" value="Submit"></div>
                                </form>
                            </div>




                            <div class="c_name_mail rounded" id="password_box" onclick="openField(this);"><p>Change password</p></div>

                            <div id="password_field">
                                <p onclick="closeField();" id="p3p" class="theFormP">Close</p>
                                <form id="pass_form" method="POST" action="/change_password">@csrf
                                    <div><label for="pass_old">Current Password</label></div>
                                    <div><input type="password" id="pass_old" name="pass_old" placeholder="Place current password" required></div>
                                    <div><label for="pass_name">New Password</label></div>
                                    <div><input type="password" id="pass_name" name="pass_name" placeholder="Place new password" required></div>
                                    <div style="margin-top: .7rem;"><input type="submit" value="Submit"></div>
                                </form>
                            </div>




                            <div class="d_acc rounded" id="delete_box" onclick="openField(this);"><p>Delete Account</p></div>

                            <div id="delete_field">
                                <p onclick="closeField();" id="p4p" class="theFormP">Close</p>
                                <form id="del_form" method="POST" action="/delete_acc">@csrf
                                    <div><label for="pass_del">Password</label></div>
                                    <div><input type="password" id="pass_del" name="pass_del" placeholder="Place your password" required></div>
                                    <div style="margin-top: .7rem;"><input type="submit" value="Delete Account"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                

            </div>
        </div>




    </div>



@endsection


