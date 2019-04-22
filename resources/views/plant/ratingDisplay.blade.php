@auth
<star-rating :initial="{{ $plant->ratingFor(auth()->user()) ?: 0 }}" action="/plant/{{ $plant->id }}/rate"></star-rating>
@endauth
Average Rating: {{ $plant->rating() }}