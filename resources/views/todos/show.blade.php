@extends('layouts.app')

@section('title')
Single Todo {{$todo->name}}
@endsection
@section('content')
<h1 class="text-center my-2"> {{$todo->name}}  </h1>
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card card-default">
<div class="card-header bg-info">
Details
</div>
<div class="card-body">
{{$todo->description}}
</div>
<div class="card-footer">
<a href="/todos/{{$todo->id}}/edit" class="btn btn-warning btn-sm float-left">Edit</a>
<a href="/todos/{{$todo->id}}/delete" class="btn btn-danger btn-sm float-right">Delete</a>
</div>
</div>
</div>
</div>
@endsection