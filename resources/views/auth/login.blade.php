
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Controle</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('/images/logo.png') }}" />
    <script src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/script.js') }}"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, 'Montserrat';
            font-size: 15px;
            box-sizing: border-box;
        }
        
        html, body {
            height: 100%;
            background: #ffffff;
            color: #777;
        }
        
        *::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #eeeeee;
        }
        
        *::-webkit-scrollbar {
            width: 0px;
            background-color: #5c6166;
        }
        
        *::-webkit-scrollbar-thumb {
            border-radius: 8px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #696f79;
        }
        
        a {
            color: rgb(9, 126, 236);
        }
        
        time {
            font-size: 12px;
            font-family: 'Montserrat';
        }
        
        .dropdown-toggle::after {
            display: none;
        }
        
        input[type=text], input[type=search], input[type=file] {
            line-height: 1.4em;
            border-radius: 4px !important;
        }
        
        
        .login {
            height: 100%;
            display: flex;
            flex-direction: row;
        }
        
        .login-form {
            width: 40%;
            height: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            background-color: #e6e6e6;
        }
        
        .banner-login {
            width: 60%;
            height: 100%;
            background: #0d80c2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-image: url('/img/post3.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: #ffffff;
            text-shadow: 0 0 12px rgba(0,0,0,0.2);
        }
        
        .banner-login img {
            position: relative;
            bottom: 40px;
        }
        
        .banner-login p {
            position: relative;
            bottom: 40px;
        }
        
        .login-form-wrapper {
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            padding: 2em;
            margin: 2em;
        }
        
        .login-form-wrapper button {
            width: 100%;
            background: #1d5ca3;
            color: #ffffff;
            margin-top: 10px;
        }
        
        .login-form-wrapper button:hover {
            transform: scale(1.20);
            transition: .2s;
            color: #ffffff;
        }
        
        .login-title {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px 0;
        }
        
        @media screen and (max-width: 1200px) {
            .banner-login {
                padding: 0 2%;
            }
        
            .banner-login img {
                max-width: 400px;
            }
        }
        
        @media screen and (max-width: 991px) {
            .banner-login {
                display: none;
            }
            .login-form {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login">
        
        <div class="login-form">
            <div class="login-form-wrapper text-center">
                <a href="{{ BASE_URL }}" class="brand"><img style="width: 50px" src="{{ BASE_URL }}/images/logo.png" alt=""></a>
                <hr>
                <div class="login-title">
                    <h2>Log in</h2>
                    <a href="{{ route('register') }}">Regista-te</a>
                </div>
                <div class="" >
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="login" type="text" 
                                placeholder="Usuário ou E-mail" 
                                class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                <?php $email = request('email') ?? ''; ?>
                                name="login" value="{{ (old('username') ?: old('email') ?? $email) }}"
                                required autocomplete="off" autofocus>

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" placeholder="Senha" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @if (Route::has('password.request'))
                                    <a class="mt-2 btn-link" href="{{ BASE_URL }}/recover">
                                        Esquecí a minha senha.
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Manter a sessão
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn form-control btn-primary">
                                    Entrar
                                </button>

                                
                            </div>
                        </div>
                    </form>
                    
                </div>
                <hr>
                <a href="{{ asset(route('help')) }}">Centro de ajuda.</a>
            </div>
        </div>

        <div class="banner-login">
            <h2>Connectando pessoas</h2>
        </div>
    </div>
</body>
</html>




