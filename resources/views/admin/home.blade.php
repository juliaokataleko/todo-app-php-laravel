@extends('layouts.admin')

@section('title', ' Painel de Controle - ' . config('app.name', 'Laravel'))

@section('content')

<style>
    .col-md-4 i, .col-md-12 i {
        font-size: 40px;
        color: #2246e6
    }
</style>

<div class="container bg-white px-4 py-4 border">
    <h2>PAINEL DE CONTROLE</h2>
  
    <div class="row p-3">

        <div class="col-md-4 py-4 text-center border">
            <i class="fa fa-user-friends"></i>
            <hr>
            <a href="{{ BASE_URL }}/admin/users"> Usuários: {{ count($users) }}</a>
        </div>

    </div>

</div>
@endsection
