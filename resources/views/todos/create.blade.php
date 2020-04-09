@extends('layouts.app')
@section('content')
<h1 class="text-center my-2">Create Todo</h1>
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card card-default">
<div class="card header bg-info"></div>
<div class="card-body">
@if($errors->any())
<div class="alert alert-danger">
<ul class="list-group">
@foreach($errors->all() as $error)
<li class="list-group-item">
{{$error}}
</li>
@endforeach
</ul>
</div>
@endif
<form action="/store-todos" method="POST">
@csrf
<div class="form-group">
<input type="text" class="form-control" name="name" placeholder="Name">
</div>
<div class="form-group">
<textarea name="description" class="form-control" id="" rows="5" placeholder="Write your description here"></textarea>
</div>
<div class="form-group text-center">
<button type="submit" class="btn btn-success">Create Now</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
