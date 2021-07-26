@extends('layouts.app')

@section('content')

<div class="section"> 
    <div class="container">
        <a class="btn btn-primary" href="{{ route('videoGames.index') }}">Back</a>
        <div class="row">
            <div class="col-sm-6">
                <h1>{{$videoGame->title}}</h1>
                <p>Genre: {{$videoGame->genre}}</p>
                <p>Rating: {{$videoGame->rating}}</p>
            </div>
            <div class="col-sm-6">
                <img src={{$videoGame->imgUrl}} />
            </div>
        </div>
        <div class="row">
            <a class="btn btn-secondary" href="{{ route('videoGames.edit', $videoGame->id) }}">Edit</button></a>
            <form action="{{ route('videoGames.destroy', $videoGame->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
