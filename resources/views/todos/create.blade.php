@extends('layouts.app')

@section('title', Auth::user()->name .' - '.config('app.name', 'Laravel'))

@section('content')
<div class="text-center pt-3">
  <a href="{{ BASE_URL }}/todos" class="btn btn-outline-dark mb-3 
    form-control"> <i class="fa fa-arrow-left"></i> Back</a>
  <h1 class="text-2x1">What next you need todo?</h1>
  <form class="py-2" action="{{ route('todos.store') }}" method="post">
    @csrf

    <div class="input-group mb-3">
      <input placeholder="task title" type="text" class="form-control" name="title">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Create</button>
      </div>
    </div>
    <textarea name="description" id="description" 
    placeholder="Description" class="form-control"></textarea>

    <div class="p-2 border mt-3">
      <h4>Add steps</h4>
      @livewire('todo-step')
    </div>
  </form>
</div>

<script>
  CKEDITOR.replace('description');
</script>

@endsection