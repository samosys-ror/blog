<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

         {!! NoCaptcha::renderJs() !!}

</head>
<body onload="search()">
    <div id="app">
        <nav class="navbar navbar-expand-md  shadow-sm"style="background-color: #000;color:#ffff;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"style="text-decoration: none;color:#fff">
                    {{ config('app.name', 'Laravel') }}
                </a>

                  <ul class="navbar-nav"style="padding-left:6%;width: 100%;">


                    <li class="nav-item nav-link"><i class="fa fa-home"></i>Home</li>

                    <li class="nav-item nav-link"style="padding-left: 5%"> <i class="fa fa-search"></i>Search Existing Case</li>
                      
                    <li class="nav-item  nav-link"style="padding-left: 5%">
                        <i class="fa fa-comment"></i>Create New Case</li>
                  <li class="nav-item nav-link"style="padding-left: 5%"><i class="fa fa-book"></i>Download Corner</li>


                  
                  <?php //$role=Auth::user()->roles->pluck('name');  ?>


                    <li class="nav-item nav-link"style="padding-left:2%">

                    <i class="fa fa-envelope"></i>Contact Us</li>
                    <li class="nav-item nav-link"style="padding-left:2%"> 

                   @can('create')
                    <a href="{{ url('/knowledge/create')}}"><i class="fa fa-envelope"></i>Create Article</a></li>

                   @endcan

                  </li>
                     

                  </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                           <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> -->
                            @if (Route::has('register'))
                               <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>  
                                </li> -->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
