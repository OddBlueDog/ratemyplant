@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ $plant->title }}</h1>
        </div>
        <div class="col-12">
            <h4>Uploaded by: <a href="{{ route('user.show', $user) }}">{{ $user->username}}</a></h4>
        </div>
        <div class="col-md-8 col-12 mb-3">
            <img class="img-fluid" src="{{ asset($plant->filename) }}" />
        </div>
        <div class="col-md-8 col-12">
            {{ $plant->description }}
        </div>

        <div class="col-12">
            @include('plant.ratingDisplay',['plant'=>$plant])
            <hr />
        </div>
        <div class="col-12">
            <h4>Display Comments</h4>

            @include('plant.commentsDisplay', ['comments' => $plant->comments, 'plant_id' => $plant->id])

            @auth
            <hr />
            <h4>Add comment</h4>
            <form method="post" action="{{ route('comment.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body"></textarea>
                    <input type="hidden" name="plant_id" value="{{ $plant->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add Comment" />
                </div>
            </form>
            @endauth
        </div>
    </div>
</div>
@endsection