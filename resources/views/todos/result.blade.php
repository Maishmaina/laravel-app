@extends('layouts.app')
@section('title')
Todo page
@endsection

@section('content')
<h1 class="text-center my-2">Todo Page</h1> 
@if(isset($details))
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card card-default">
 <div class="card-header">Todo result query for " {{ $query }} " is:</div>
 <div class="card-body"> 
 <ul class="list-group">
@foreach($details as $todos)
<li class="list-group-item">
{{$todos->name}}
@if(!$todos->completed)
<a href="/todos/{{$todos->id}}/complete" class="btn btn-outline-success  btn-sm float-right">Done</a>
@endif
@if($todos->completed)
<a href="#" class="btn btn-outline-success  btn-sm float-right">success</a>
@endif
<a href="/todos/{{$todos->id}}" class="btn btn-outline-info btn-sm float-right mr-2">View</a>
</li>
@endforeach
</ul> 
</div>
</div> 
</div>
</div> 
@endif
@endsection