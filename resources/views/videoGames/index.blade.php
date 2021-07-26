@extends('layouts.app')

{{-- @section('page_title', 'Video Game Index') --}}

@section('content')
<div class="section"> 
    <div class="container">
        <h1>Your Library</h1>
        <a class="btn btn-primary" href="{{ route('videoGames.create') }}">Add to Library</a>
                    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="d-flex flex-wrap">
        @foreach ($data as $key => $value)
            <div class="card">
                <div>
                    <img src={{ $value->imgUrl}} width="200px" style="max-height:240px;" />
                </div>
                <div class="card-footer text-center">
                    <h4 class="text-center">{{ $value->title }}</h4>
                    <a class="btn btn-primary text-center" href="{{ route('videoGames.show', $value->id) }}">View</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>


@endsection
