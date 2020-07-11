@extends('layouts.app')

@section('title', Auth::user()->name .' - '.config('app.name', 'Laravel'))

@section('content')
<div class="container mt-md-3" style="max-width: 700px">
 
            <?php
            if(!null == Auth::user()->avatar && file_exists('uploads/avatar/'.Auth::user()->avatar)):
                $image = BASE_URL."/uploads/avatar/{{ Auth::user()->avatar }}";
            else:
                $image = BASE_URL."/images/person.png";
            endif; ?>
            
                <div class="text-center mt-2">
                    <?php
            if(!null == Auth::user()->avatar && file_exists('storage/images/'.Auth::user()->avatar)): ?>
                    <img style="width: 70px; height: 90px;
                border: 1px solid #ddd;
                object-fit: cover; " src="{{ BASE_URL }}/storage/images/{{ Auth::user()->avatar }}"
                        class="rounded mb-4" alt="...">
                    <?php else: ?>
                    <img style="width: 70px; height: 90px;" src="{{ BASE_URL }}/images/person.png"
                        class="rounded mb-4 border" alt="...">
                    <?php endif; ?> <br>
                    {{ Auth::user()->name  }} &Dot;  {{ '@'.Auth::user()->username }} <br>
                    {{ Auth::user()->email }} &DotDot; 
                    </b>{{ (!empty(Auth::user()->phone)) ? 
                    Auth::user()->phone : 'Sem Telefone' }} <br>
                    <b>Birth Day: </b>             
                    {{ (!empty(Auth::user()->birth_day)) ? 
                        dateFormat(Auth::user()->birth_day) : 
                        'Sem Data de Aniversário' }} | 
                        {{ (!empty(Auth::user()->gender)) ? 
                            gender(Auth::user()->gender) : 'Sem gênero' }}
                        <hr>
                        Breve descrição sobre mim....
                </div>
                {{--  <div class="col-sm-9 text-center mx-4 py-3 mb-4" style="background: rgba(0, 0, 0, 0.5)">
                    <h3 class="text-light">My Profile</h3>
                    <a href="{{ BASE_URL }}/profile/photo" c
                    lass="text-light">Change avatar</a> <br>

                </div>  --}}
           

            @include('includes.flash')

            {{--  <div class="">
                <ul class="list-group my-4">
                    <li class="list-group-item">
                        <b>Nome: </b> {{ Auth::user()->name  }}
                    </li>
                    <li class="list-group-item">
                        <b>Email: </b> {{ Auth::user()->email }}
                    </li>
                    <li class="list-group-item">
                        <b>Usuário: @</b>{{ Auth::user()->username }}
                    </li>
                    <li class="list-group-item">
                        <b>Telefone: 
                    </li>
                    <li class="list-group-item">
                        
                    </li>

                    <li class="list-group-item">
                        
                    </li>

                    <li class="list-group-item">
                        <b>Cidade:
                        </b>{{ (!empty(Auth::user()->birth_place)) ? Auth::user()->birth_place : 'Sem Cidade' }}
                    </li>

                    <li class="list-group-item">
                        <b>Nível: </b>{{ (!empty(Auth::user()->role)) ? userLevel(Auth::user()->role) : 'Sem imagem' }}
                    </li>

                </ul>

            </div>  --}}


            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <a href="{{ BASE_URL }}/profile/edit">Edit profile</a> <br>
                    <a class="btn text-white bg-primary mt-3" data-toggle="modal" data-target="#exampleModalCenter">
                        Chaneg password
                    </a>

                    <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>



        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <form action="{{ BASE_URL }}/profile/change-password" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Alterar senha</h5>

                        </div>
                        <div class="modal-body">

                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="pwHelp" placeholder="Digite a senha actual">
                                <small id="pwHelp" class="form-text text-muted">
                                    Introduza a senha actual da sua conta
                                </small>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="npassword" name="npassword"
                                    aria-describedby="npwHelp" placeholder="Nova senha">
                                <small id="npwHelp" class="form-text text-muted">
                                    Introduza a nova senha
                                </small>
                            </div>

                            <div class="form-group">
                                <input type="password" name="cpassword" class="form-control" id="cpassword"
                                    aria-describedby="cpwHelp" placeholder="Confirmar Nova Senha">
                                <small id="cpwHelp" class="form-text text-muted">
                                    Confirme a nova senha
                                </small>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
       
</div>



@endsection