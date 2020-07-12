@extends('layouts.app')

@section('title', Auth::user()->name .' - '.config('app.name', 'Laravel'))

@section('content')
<div class=" mt-4 text-center pt-3">
    <a href="{{ BASE_URL }}/todos" class="btn btn-outline-dark mb-3 form-control"> <i class="fa fa-arrow-alt-circle-left"></i> Back</a>
    <h1 class="text-2x1">Update this todo list</h1>
    <h2>{{ $todo->title }} </h2>

    
    <form class="py-2" action="{{ route('todos.update', $todo->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="input-group mb-3">
            <input placeholder="task title" 
            type="text" value="{{ $todo->title }}" class="form-control" 
            name="title">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" 
              type="submit">Update</button>
            </div>
          </div>

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
     
    </form>
</div>

@endsection