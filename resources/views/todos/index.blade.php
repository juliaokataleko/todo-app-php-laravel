@extends('layouts.app')

@section('title', Auth::user()->name .' - '.config('app.name', 'Laravel'))

@section('content')
<div class=" mt-4 text-center pt-3">
    <a href="{{ BASE_URL }}/todos/create" 
    class="btn btn-primary">New Todo</a>
    @if(count($todos) > 0)
    <ul class="list-group text-left my-4">
        <li class="list-group-item"><h1>Lista de tarefas</h1></li>
        @foreach($todos as $key => $todo)
            <li class="list-group-item">{{ $todo->title }}</li>
        @endforeach
    </ul>
    {{ $todos->links() }}
    @endif
</div>

@endsection