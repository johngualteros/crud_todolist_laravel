<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
class TodosController extends Controller
{
    //
    public function index(){
        $todos = Todo::all();
        $categories=Category::all();
        return view('todos.index',['todos'=>$todos,'categories'=>$categories]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3|max:255',
            'category_id'=>'required',
        ]);
        $todo = new Todo;
        $todo->title = $request->title;
        
        $todo->category_id = $request->category_id;
        $todo->save();
        return redirect('tasks')->with('success','Todo created successfully');
    }
    public function show($id){
        $todo = Todo::find($id);
        $categories = Category::all();
        return view('tasks.show', ['todo' => $todo, 'categories' => $categories]);
    }
    public function update(Request $request,$id){
        $todos = Todo::find($id);
        $todos->title = $request->title;
        $todos->save();
        return redirect()->route('tasks')->with('success','Task updated successfully');
    }
    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('tasks')->with('success','Task deleted successfully');
    }
}
