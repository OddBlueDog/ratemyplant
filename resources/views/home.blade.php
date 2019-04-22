@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Latest Plants</h1>
    <hr>
    <div class="card-columns">
        @foreach($plants as $plant)
        @include('plant.plantcard', ['plant' => $plant])
        @endforeach
    </div>
</div>
@endsection