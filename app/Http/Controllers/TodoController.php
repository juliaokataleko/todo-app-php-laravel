<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->orderBy('completed')->paginate(10);
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {
        Todo::create($request->all());
        return redirect(route('todos.index'))->with('success', 'Todo list created successfully.');
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
       $todo->update(['title' => $request->title]);
       return redirect(route('todos.index'))->with('success', 'Todo list updated successfully.');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('success', 'Todo list removed successfully.');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('success', 'Todo list completed.');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('success', 'Todo list marked as incompleted.');
    }
}
