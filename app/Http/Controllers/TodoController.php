<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use App\TodoStep;
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
        $todos = auth()->user()->todos()->paginate(9);
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
        // dd($request->all());
        $todo = auth()->user()->todos()->create($request->all());

        if($request->step) {
            foreach($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        
        return redirect(route('todos.index'))->with('success', 'Todo list created successfully.');
    }
    
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        // dd($request->all());

        if($request->step) {
            foreach($request->step as $key => $value) {
                $id = $request->stepId[$key];
                if(!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = TodoStep::find($id);
                    $step->update(['name' => $value]);
                }                
                // $todo->steps()->create(['name' => $step]);
            }
        }

       $todo->update(['title' => $request->title, 'description' => $request->description]);
       return redirect(route('todos.index'))->with('success', 'Todo list updated successfully.');
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
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
