@extends( 'layouts.app' )

@section( 'content' )
    <div class="mt-3 text-center card">
        <div class="card-body col-md-6 col-centered">
            <img src="{{ $map->image_url }}" style="width:100%">
            <h1>{{ $map->name }}</h1>
            <h2>{{ $map->game_mode }}</h2>
        </div>

    </div>
@endsection
