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
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

    @livewireStyles

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
    
    <nav class="navbar navbar-expand fixed-top 
    navbar-light bg-white border-bottom " style="height: 3em;"> 
        <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa fa-bars"></i> {{ env('APP_NAME') }}
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
                    <a class="nav-link" href="{{ BASE_URL }}"><i class="fa fa-home"></i></a></li>
                <li class="nav-item active"> 
                    <a class="nav-link" href="{{ BASE_URL }}/profile" 
                    data-abc="true" 
                    title="{{ Auth::user()->name }}"> <i class="fa fa-cog"></i> </a> 
                </li>
                <li class="nav-item active"> 
                    <a class="nav-link" href="{{ BASE_URL }}"><i class="fa fa-search"></i></a></li>
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
    display: flex; justify-content: center; align-items: center;
     flex-direction: column; overflow: auto;
    background: #fff; ">

        <div class="p-3 pt-4 container" style="height: 100%; display: flex; 
        flex-direction: column; 
        margin: 0 auto; margin-top: 2em;">
            <x-alert />
            @yield('content')
        </div>

    </div>
    {{--  @include('includes.footer')  --}}
    @livewireScripts
</body>
</html>
