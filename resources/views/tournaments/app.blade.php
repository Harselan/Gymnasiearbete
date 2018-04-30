@extends( 'layouts.app' )

@section( 'content' )
<div class="col-md-10 mt-5 col-centered row text-center">
    <h1 class="col-md-12">Turneringar</h1>
    <div class="card p-0 col-md m-3">
        <div class="card-body">
            <h4 class="card-title"><a>League Of Legends</a></h4>
            <div class=" card-body">
                <?php $counter = 0; ?>
                @foreach( $tournaments['lol'] as $key => $tournament )
                    <div class="row">
                        <div class="col-md p-0">
                            <img style="width:20px;" src="{{ $tournament->league->image_url }}">
                            <p>{{ str_replace( '-', ' ', $tournament->slug) }}</p>
                        </div>

                        <div class="col-md p-0">
                            <img style="width:20px;">
                            <a href="#match{{ $counter }}" data-toggle="collapse">Se mer</a>
                        </div>

                        <div id="match{{ $counter }}" class="collapse text-left col-md-12">
                            <small><b>Start:</b> {{ date( 'Y-m-d', strtotime( $tournament->begin_at ) ) }}</small><br>
                            <small><a href="/tournaments/{{ $tournament->slug }}/matches">Se matcher</a></small>
                        </div>
                    </div>
                    <?php $counter++; ?>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card p-0 col-md m-3">
        <div class="card-body">
            <h4 class="card-title"><a>Dota 2</a></h4>
            <div class=" card-body">
                @foreach( $tournaments['dota2'] as $key => $tournament )
                    <div class="row">
                        <div class="col-md p-0">
                            <img style="width:20px;" src="{{ $tournament->league->image_url }}">
                            <p>{{ str_replace( '-', ' ', $tournament->slug) }}</p>
                        </div>

                        <div class="col-md p-0">
                            <img style="width:20px;">
                            <a href="#match{{ $counter }}" data-toggle="collapse">Se mer</a>
                        </div>

                        <div id="match{{ $counter }}" class="collapse text-left col-md-12">
                            <small><b>Start:</b> {{ date( 'Y-m-d', strtotime( $tournament->begin_at ) ) }}</small><br>
                            <small><a href="/tournaments/{{ $tournament->slug }}/matches">Se matcher</a></small>
                        </div>
                    </div>
                    <?php $counter++; ?>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card p-0 col-md m-3">
        <div class="card-body">
            <h4 class="card-title"><a>Overwatch</a></h4>
            <div class=" card-body">
                @foreach( $tournaments['ow'] as $key => $tournament )
                    <div class="row">
                        <div class="col-md p-0">
                            <img style="width:20px;" src="{{ $tournament->league->image_url }}">
                            <p>{{ str_replace( '-', ' ', $tournament->slug) }}</p>
                        </div>

                        <div class="col-md p-0">
                            <img style="width:20px;">
                            <a href="#match{{ $counter }}" data-toggle="collapse">Se mer</a>
                        </div>

                        <div id="match{{ $counter }}" class="collapse text-left col-md-12">
                            <small><b>Start:</b> {{ date( 'Y-m-d', strtotime( $tournament->begin_at ) ) }}</small><br>
                            <small><a href="/tournaments/{{ $tournament->slug }}/matches">Se matcher</a></small>
                        </div>
                    </div>
                    <?php $counter++; ?>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
