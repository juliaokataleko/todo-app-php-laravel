@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - Página Inicial')

@section('content')

<div class="row">
    <div class="col-4 text-center">
        <a href="{{ BASE_URL }}/todos" style="text-decoration: none">
            <button class="btn btn-primary p-2"> 
                <i class="fa fa-tasks"></i> <br> <span class="desktop">Tasks</span>  </button>
            </a>
    </div>

    <div class="col-4 text-center">
        <a href="{{ BASE_URL }}/todos" style="text-decoration: none">
            <button class="btn btn-primary p-2"> 
                <i class="fa fa-money-bill-wave-alt"></i> <br> <span class="desktop">Finances</span>  </button>
            </a>
    </div>

    <div class="col-4 text-center">
        <a href="{{ BASE_URL }}/todos" style="text-decoration: none">
            <button class="btn btn-primary p-2"> 
                <i class="fa fa-edit"></i> <br> <span class="desktop">Posts</span>  </button>
            </a>
    </div>
    
 
</div>

@endsection