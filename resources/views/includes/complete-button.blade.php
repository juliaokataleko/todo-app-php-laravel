@if($todo->completed)
<a class="text-success" onclick="event.preventDefault();
                document.getElementById('form-incomplete-{{$todo->id}}')
                .submit()" href="{{ BASE_URL }}/todos/delete/{{ $todo->id }}">
    <i class="fa fa-check"></i></a>

<form method="POST" id="{{ 'form-incomplete-'.$todo->id }}" action="{{ route('todo.incomplete', $todo->id) }}">
    @csrf
    @method('delete')
</form>

@else
<a class="" style="color: #ddd" onclick="event.preventDefault();
                document.getElementById('form-complete-{{$todo->id}}')
                .submit()" href="{{ BASE_URL }}/todos/delete/{{ $todo->id }}">
    <i class="fa fa-check"></i></a>

<form method="POST" id="{{ 'form-complete-'.$todo->id }}" action="{{ route('todo.complete', $todo->id) }}">
    @csrf
    @method('put')
</form>
@endif