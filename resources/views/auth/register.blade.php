<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create a free account</title>
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

            .register-parent {
                height: 100%;
                padding: 0 4%;
                background: #dfdfdf;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 700px;
            }
            
            .register {
                width: 100%;
                max-width: 400px;
                padding: 2.4em;
                background: #ffffff;
            }
            
            .register-title {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .register-title img {
                width: 50px;
                height: 50px;
            }
            
            .register-title h2 {
                font-size: 20px;
            }
            
            .register .form-group label {
                font-size: 14px;
                font-weight: bold;
            }
            
            .register .form-group input {
                font-size: 14px;
                line-height: 2.3em !important;
                height: 2.3em;
                border: 3px solid #3ca1c9;
                padding: 6px;
                border-radius: 0;
            }
            
            .register button {
                margin-top: 20px;
                border: none;
            }
            
            .register button:hover {
                transform: scale(1.20);
                transition: .2s;
                color: #ffffff;
                border: none;
            }
            
    
        </style>
    </head>
<body>
    <div class="register-parent">
        <div class="register">
                <div class="register-title">
                    <a href="{{ BASE_URL }}" class="brand"><img src="{{ BASE_URL }}/images/logo.png" alt=""></a>
                    <h2>Regista-te Já</h2>
                    <a href="{{ BASE_URL }}/login">ou Inicia sessão</a>
                </div>
                <form method="POST" action="{{ BASE_URL }}/user/register">
                    @csrf

                    <div class="form-group row">
                        
                        <div class="col-md-12">
                            <input id="name" placeholder="Nome:" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                O seu nome deve conter apenas letras e espaços
                              </small>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        
                        <div class="col-md-12">
                            <input id="name" placeholder="Usuário. Ex: pedro_dias12" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off">
                            
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ 'O seu usuário deve ter apenas letras, números e underscore(_)'}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                       
                        <div class="col-md-12">
                            <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                  
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Palavra-passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password-confirm" placeholder="Repetir Palavra-passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn form-control btn-primary">
                                {{ __('Registar') }}
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>

