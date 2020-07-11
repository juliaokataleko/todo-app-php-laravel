@extends('layouts.app')

@section('title', Auth::user()->name .' - '.config('app.name', 'Laravel'))

@section('content')
<div class=" mt-4 text-center pt-3">
    <h1 class="text-2x1">What next you need todo?</h1>
    <x-alert />
    
    <form class="py-2" action="/todos/store" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="text" placeholder="task title" 
        class="p-2 rounded border" name="title" id="">
        <button class="p-2 border rounded">Create</button>
    </form>
</div>

@endsection