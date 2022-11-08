<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;

class todosController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3'
        ]);
        
        $todo = new todo();

        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todo')->with('success', 'Tarea creada');
    }

    public function index(){
        $todo = todo::all();

        return view('todo.index', ['todo' => $todo]);
    }
    
    public function show($id){
        
        $todo = todo::find($id);

        return view('todo.show', ['todo' => $todo]);
    }
    
    public function update(Request $request, $id){
        $todo = todo::find($id);
        $todo->title = $request->title;

        dd($todo);

        return view('todo.index', ['todo' => $todo]);
    }

    public function destroy(){
        $todo = todo::all();

        return view('todo.index', ['todo' => $todo]);
    }
}
