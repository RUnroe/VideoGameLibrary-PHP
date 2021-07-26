@extends('layouts.app')


@section('content')
<div class="section"> 
    <div class="container">
<h1>Create Video Game </h1>
<div class="container">
<div class="row">
<div class="col-6">
<form action="{{ route('videoGames.store') }}" method="POST">
    @csrf
    @method('POST')
    <label>Title</label>
    <input class="form-control" type="text" name="title" />
    <label>Image URL</label>
    <input class="form-control" type="text" name="imgUrl" />
    <label>Rating</label>
    <input class="form-control" type="text" name="rating" />
    <label>Genre</label>
    <input class="form-control" type="text" name="genre" />
    <input type="text" name="userId" value="{{Auth::user()->email}}" hidden />

    <button type="submit" class="btn btn-primary">Create </button>
</form>
</div>
</div>
</div>
</div>
</div>

@endsection
