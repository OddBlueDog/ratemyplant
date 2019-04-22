@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Upload New Plant</h1>
        </div>
        <div class="col-md-8 col-12">
            <form method="POST" action="/plant" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="titleHelp" name="title" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" aria-describedby="descriptionHelp" placeholder="Enter description">
                </div>
                <div class="form-group">
                    <label for="image">Example file input</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection