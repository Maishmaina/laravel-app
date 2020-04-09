@extends('layouts.app')
@section('title')
Todo page
@endsection

@section('content')
<h1 class="text-center my-2">Todo Page</h1> 
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card card-default">
 <div class="card-header">Todo</div>
 <div class="card-body"> 
 <ul class="list-group">
@foreach($todos as $todo)
<li class="list-group-item">
{{$todo->name}}
@if(!$todo->completed)
<a href="/todos/{{$todo->id}}/complete" class="btn btn-outline-success  btn-sm float-right">Done</a>
@endif
@if($todo->completed)
<a href="#" class="btn btn-outline-success  btn-sm float-right">success</a>
@endif
<a href="/todos/{{$todo->id}}" class="btn btn-outline-info btn-sm float-right mr-2">View</a>
</li>
@endforeach
</ul> 
</div>
</div> 
</div>
</div> 
@endsection