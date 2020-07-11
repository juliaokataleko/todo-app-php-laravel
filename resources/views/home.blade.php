@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - Página Inicial')

@section('content')

<div class="container mt-3">
    <div class="card">
        <div class="card-body">

            <x-alert>
                <p>Here is response for image upload</p>
            </x-alert>

            <form action="/upload" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="">
                <button class="btn btn-primary" 
                type="submit">Upload</button>
            </form>
        </div>
    </div>
</div>

@endsection