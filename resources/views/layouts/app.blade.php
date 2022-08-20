<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <meta name="description" content="{{ config('app.name') }} provides results and statistical data about formula 1 in a user friendly way">
    <meta name="keywords" content="Formula 1, formula one, results, statistics, data, races, drivers, circuits, constructors, teams">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app_custom.css') }}" rel="stylesheet" type="text/css" />
    
    {{-- favicon icon --}}
    <link rel="shortcut icon" href="{{ asset('/images/png/layout_app/navbar-brand_image.png') }}">

</head>
<body>




    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/home') }}">
                    <div><img src="/images/png/layout_app/navbar-brand_image.png" class="pr-2 pl-3"></div>
                    <div class="pl-3 pt-2">{{ config('app.name') }}</div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>




                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-center">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            <div class="mobile_view_drop">
                                <li><a class="dropdown-item mt-3" href="/2021"><p>Current season</p></a></li>
                                <li><a class="dropdown-item" href="/seasons"><p>All Seasons</p></a></li>
                                <li><a class="dropdown-item" href="/drivers"><p>Drivers</p></a></li>
                                <li><a class="dropdown-item" href="/constructors"><p>Constructors</p></a></li>
                                <li><a class="dropdown-item" href="/circuits"><p>Circuits</p></a></li>
                                <li><a class="dropdown-item" href="#"><p>Statistics</p></a></li>   
                            </div>         
                        @else
                            <li class="nav-item dropdown desktop_view_drop">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">Account</a>
                                    @if (Auth::user()->status == 'admin' || Auth::user()->status == 'moderator')
                                        <a class="dropdown-item" href="/admin">Admin Page</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <div class="mobile_view_drop">
                                <li class="nav-item dropdown">
                                    {{-- <li><a class="dropdown-item" id="my_profile" href="/profile"><p>{{ Auth::user()->name }}</p></a></li>     --}}
                                    <li><a class="dropdown-item" id="my_profile" href="/profile"><p>Account</p></a></li> 
                                    @if (Auth::user()->status == 'admin' || Auth::user()->status == 'moderator')
                                        <li><a class="dropdown-item" id="my_profile" href="/admin"><p>Admin Page</p></a></li> 
                                    @endif
                                    <li><a class="dropdown-item" href="/2021"><p>Current season</p></a></li>
                                    <li><a class="dropdown-item" href="/seasons"><p>All Seasons</p></a></li>
                                    <li><a class="dropdown-item" href="/drivers"><p>Drivers</p></a></li>
                                    <li><a class="dropdown-item" href="/constructors"><p>Constructors</p></a></li>
                                    <li><a class="dropdown-item" href="/circuits"><p>Circuits</p></a></li>
                                    <li><a class="dropdown-item" href="#"><p>Statistics</p></a></li>
                                    <a class="dropdown-item" id="logout_profile" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    
                                </li>
                            </div>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="p-0">
            @yield('content')
        </main>


        
        <footer>
            <div class="row">
                <div class="col-xl-5 footer_links" @if($agent->isDesktop()) style="border-right: 1px solid silver; margin: .5rem 0 .5rem 0;" @endif>
                    <div><img src="/images/png/layout_app/navbar-brand_image.png"></div>
                    <p><a id="theGal" href="/gallery">Gallery</a></p>
                    <p style="margin-top: .5rem;"><a href="/contact">Contact</a></p>
                    <p style="margin-top: .5rem;"><a href="/report">Report</a></p>
                    <p style="margin-top: .5rem;"><a href="/about">About</a></p>
                </div>
                <div class="col-xl-7 footer_info">
                    <p>
                        This is an unofficial Formula 1 related website, created as a university project. </br>
                        The website is not associated with the Formula 1 companies.</br>
                        Data representation is as correct as possible. Be aware that exeptions are possible. Feel free to contact if you find wrong data</br>
                        Big credits to the data provider. 
                        The huge majority of the data represented on the website are prodived by <a href="http://ergast.com/mrd/" target="_blank">ergast</a>. </br>
                        The credits for the drivers', constructors' and circuit's descriptions will be found on the related pages.
                    </p> 
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
