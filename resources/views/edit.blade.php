@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Create Image</h1>
                <img src="/{{$image->image}}" alt="{{$image->image}}" class="img-thumbnail">
                <form action="/update/{{$image->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <input type="file" name="image">
                    </div>
                    <input type="submit" value="Send" class="btn btn-success">

                </form>
            </div>
        </div>
    </div>

@endsection