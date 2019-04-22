<div class="col-md-4 col-xs-6 col-12">
    <div class="card">
        <img class="card-img-top" src="{{ asset($plant->filename) }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$plant->title}}</h5>
            <p class="card-text">{{$plant->description}}</p>
            <a href="{{route('plant.show', $plant)}}" class="btn btn-primary">View</a>
        </div>
    </div>
</div>