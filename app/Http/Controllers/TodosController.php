<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TodosController extends Controller
{
   public function index(){
       //fetch all todo and dispaly
       
       return view('todos.index')->with('todos',Todo::all());
   } 
   //display single todo.
   public function show(Todo $todo){
     return view('todos.show')->with('todo',$todo);
   }
   //create todo method
   public function create(){
     return view('todos.create');
   }

   //create store todo method:
   public function store(){
    //  dd(request()->all());

    $this->validate(request(),[
      'name'=>'required|min:6|max:15',
      'description'=>'required'
    ]);
     $data=request()->all();

     $todo=new Todo();
     $todo->name=$data['name'];
     $todo->description=$data['description'];
     $todo->completed=false;
     $todo->save();
     session()->flash('success','Todos Created successfully');
     return redirect('/todos');
   }
//edit data
   public function edit(Todo $todo){
     return view('todos.edit')->with('todo',$todo);
   }
   //update query
   public function update(Todo $todo){
    $this->validate(request(),[
      'name'=>'required|min:6|max:15',
      'description'=>'required'
    ]);
    $data=request()->all();
    

    $todo->name= $data['name'];
    $todo->description=$data['description'];
    
    $todo->save();
    session()->flash('success','Todos Updated successfully');
    
    return redirect('/todos');
   }
   //delete method
   public function destory($todoId){
    $todo=Todo::find($todoId);
    $todo->delete();
    session()->flash('success','Todos Deleted successfully');
    return redirect('/todos');
   }
   public function complete(Todo $todo){
    $todo->completed=true;
    $todo->save();
    session()->flash('success','Todo completed successfull');
    return redirect('/todos');
   }
   // search method::
   public function search(){
    $q=Input::get('q');
    $todos = Todo::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'description', 'LIKE', '%' . $q . '%' )->get();
    if (count ( $todos ) > 0){
    return view ( 'todos.result' )->withDetails ( $todos )->withQuery ( $q );
    }else{
    return view ( 'todos.result' )->withMessage ( 'No Details found. Try to search again !' );
   }
  }
}
