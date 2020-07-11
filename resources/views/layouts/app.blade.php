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
    body {
        font-family: arial;
    }
</style>
<body id="" style="margin-top:3em; background: #fff; ">
    
    <nav class="navbar fixed-top navbar-expand 
    navbar-light border-bottom" style="background: #fff"> 
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
                    title="{{ Auth::user()->name }}"> 

                        <?php
                    if(!null == Auth::user()->avatar && file_exists('storage/images/'.Auth::user()->avatar)): ?>
                        <img style="width: 20px; height: 25px;
                    border: 1px solid #048ae4; padding: 0; margin: 0; margin-top: -4.5px;
                    object-fit: cover; " 
                    src="{{ asset(BASE_URL.'/storage/images/'.Auth::user()->avatar) }}"
                            class="rounded" alt="...">
                        <?php else: ?>
                        <img style="width: 20px; height: 25px;" 
                        src="{{ BASE_URL }}/images/person.png"
                            class="rounded border" alt="...">
                        <?php endif; ?>
                   
                    {{ fullNameToFirstName(Auth::user()->name) }} </span></a> 
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

    <div id="">

        <div class="py-1" style="min-height: 80vh; width: 95%; 
        max-width: 700px; margin: 0 auto;">
            @yield('content')
        </div>

    </div>
    @include('includes.footer')
</body>
</html>
