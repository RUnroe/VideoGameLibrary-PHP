@extends('layouts.app')


@section('content')
<div class="section"> 
    <div class="container">
<h1>Update Video Game </h1>
<div class="container">
<div class="row">
<div class="col-6">
<form action="{{ route('videoGames.update', $videoGame->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Id</label>
    <input class="form-control" type="text" name="id" value="{{ $videoGame->id }}" disabled/>
    <label>Title</label>
    <input class="form-control" type="text" name="title" value="{{ $videoGame->title }}" />
    <label>Image URL</label>
    <input class="form-control" type="text" name="imgUrl" value="{{ $videoGame->imgUrl }}"/>
    <label>Rating</label>
    <input class="form-control" type="text" name="rating" value="{{ $videoGame->rating }}"/>
    <label>Genre</label>
    <input class="form-control" type="text" name="genre" value="{{ $videoGame->genre }}"/>
    <input type="text" name="userId" value="{{Auth::user()->email}}" hidden />

    <button type="submit" class="btn btn-primary">Update </button>
</form>
</div>
</div>
</div>
</div>
</div>

@endsection
