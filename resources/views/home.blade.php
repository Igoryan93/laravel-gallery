@extends('layout')

@section('content')

    <div class="container">
        <h1>Page Home</h1>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-3 gallery-item">
                    <img src="/{{$image->image}}" alt="img" class="img-thumbnail">
                    <a href="/show/{{$image->id}}" class="btn btn-info">Show</a>
                    <a href="/edit/{{$image->id}}" class="btn btn-warning">Edit</a>
                    <a href="/delete/{{$image->id}}" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                </div>
            @endforeach
        </div>
    </div>


@endsection

