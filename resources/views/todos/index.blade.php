@extends('layouts.app')

@section('title', Auth::user()->name .' - '.config('app.name', 'Laravel'))

@section('content')
<div class="mt-1 text-center d-block">

    <div 
    style=""
    class="d-flex mb-2 btn btn-primary border justify-content-between 
    align-items-center"  style="width: 100%">
        <span class="">My todos list</span>
        <a href="{{ route('todos.create') }}" class="btn btn-success" 
        style=""> <i class="fa fa-plus-circle"></i> </a>
    </div>

    @if(count($todos) > 0)
    <ul style="" class="list-group text-left mb-2 border-left-0 border-right-0">
        @foreach($todos as $key => $todo)
        <li class="list-group-item" style="display: flex; flex-direction: row; 
            justify-content: space-between; align-items: center; important">

            @include('includes.complete-button')

            <span class="ml-3" style="width: calc(100% - 100px); 
                max-height: 3em; 
                overflow: hidden;">
                @if($todo->completed)
                <p class="line-through" 
                style="text-decoration: line-through">
                <a href="{{ route('todos.show', $todo->id) }}">{{ $todo->title }}</a> </p>
                @else
                <a href="{{ route('todos.show', $todo->id) }}">{{ $todo->title }}</a>   
                @endif
            </span>

            <span style="width: 100px; text-align: right">
                <a class="text-orange" href="{{ route('todos.edit',$todo->id) }}"> <i class="fa fa-edit"></i> </a>


                <a class="text-danger" data-toggle="modal" data-target="#deleteModal-{{ $todo->id }}" href="#"><i
                        class="fa fa-trash"></i></a>

                <div class="modal fade" id="deleteModal-{{ $todo->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm Box</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Do you want to delete this task?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{ route('todo.destroy', $todo->id) }}"><button type="button" class="btn btn-primary">Delete</button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </span>

        </li>
        @endforeach
    </ul>
    {{ $todos->links() }}
    @else
    <p>No tasks available. Create Now!</p>
    @endif
</div>

@endsection