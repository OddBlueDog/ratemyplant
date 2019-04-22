@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ $user->username }}</h1>
        </div>
    </div>
    <hr>

    @if(!$plants->count())
    <h3>No plants uploaded yet</h3>
    @endif

    <div class="card-columns">
        @foreach($plants as $plant)
        @include('plant.plantcard', ['plant' => $plant])
        @endforeach
    </div>
</div>
@endsection