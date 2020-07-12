<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Sistema de Compras e Vendas Online')
    </title>

    <!-- Scripts -->
    
    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('/images/logo.png') }}" />
    <script src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/script.js') }}"></script>
</head>
<style>
    html, body {
        height: 100% !important;
    }
    body {
        font-family: arial;
    }
</style>
<body>
    
    <nav class="navbar navbar-expand 
    navbar-dark" style="background: #0c8339; height: 3em;"> 
        <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa fa-home"></i> {{ env('APP_NAME') }}
        </a> 
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                
             </ul>

             <ul class="navbar-nav">

                @guest
                <li class="nav-item">
                    <a class="nav-link active btn bg-success mr-md-2" href="{{ BASE_URL }}/login">{{ __('Entrar') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link active btn bg-primary" href="{{ BASE_URL }}/register">{{ __('Regista-te') }}</a>
                    </li>
                @endif
                @else
                <li class="nav-item active"> 
                    <a class="nav-link" href="{{ BASE_URL }}/todos">Todos</a></li>
                <li class="nav-item active"> 
                    <a class="nav-link" href="{{ BASE_URL }}/profile" 
                    data-abc="true" 
                    title="{{ Auth::user()->name }}"> <i class="fa fa-cog"></i> </a> 
                </li>
                @if(Auth::check() && Auth::user()->role == 1) 
                <li class="nav-item active desktop"> 
                    <a class="nav-link" href="{{ BASE_URL }}/admin" 
                    data-abc="true">Dash </span></a> 
                </li>
                @endif
                @endguest

             </ul>

        </div>
        </div>
    </nav>

    <div id="" class="" style="min-height: calc(100% - 3em) !important; 
    display: flex; 
    justify-content: center; flex-direction: column; 
    background: #fff; align-items: center; ">

        <div class="p-3" style="max-width: 570px; height: 100%;
        display: flex; 
    justify-content: center; flex-direction: column; align-items: center
        margin: 0 auto;">
        <x-alert />
            @yield('content')
        </div>

    </div>
    {{--  @include('includes.footer')  --}}
</body>
</html>
