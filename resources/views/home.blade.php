@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - Página Inicial')

@section('content')

<div class="container mt-3" style="display: none">
    <div class="card">
        <div class="card-body">

            <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="">
                <button class="btn btn-primary" 
                type="submit">Upload</button>
            </form>
        </div>
    </div>
</div>

<div class="items">
    <a href="{{ BASE_URL }}/todos">
    <button class="btn btn-primary p-3"> 
        <i class="fa fa-tasks"></i> <br> Tarefas </button>
    </a>
    <button class="btn btn-danger p-3"> <i class="fa fa-phone"></i> <br> Telefone </button>
    <button class="btn btn-success p-3">  <i class="fa fa-money-check"></i> <br> Finanças </button>
</div>

@endsection