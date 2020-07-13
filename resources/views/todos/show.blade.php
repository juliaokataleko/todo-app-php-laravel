@extends('layouts.app')

@section('title', Auth::user()->name .' - '.config('app.name', 'Laravel'))

@section('content')
<div class=" pt-3">
    <a href="{{ BASE_URL }}/todos" class="btn btn-outline-dark mb-3 
    form-control"> <i class="fa fa-arrow-left"></i> Back</a>

    <div class="card">
        <div class="card-header">
            {{ $todo->title }}
        </div>
        <div class="card-body">
            <p>
                {!! $todo->description !!}
            </p>
            @if(count($todo->steps))
            <h5>Steps:</h5>
            <ul class="list-group">
                @foreach($todo->steps as $key => $step)
                <li class="list-group-item">{{ $step->name }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>


</div>

@endsection