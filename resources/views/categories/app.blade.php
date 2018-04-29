@extends( 'layouts.app' )

@section( 'content' )
<a href="#dataDrop" class="btn btn-primary btn-block mt-3" data-toggle="collapse">Vad vill du se</a>
<div id="dataDrop" class="collapse">
    @foreach( $types as $type )
        <button class="btn btn-block btn-light" onclick="getData( '{{ $category }}','{{ $type }}' )">{{ $type }}</button>
    @endforeach
</div>
    <div class="row mt-5">
        <div class="col-md table-responsive" id="dataResult"></div>

        @if( isset( $data['maps'] ) && !empty( $data['maps'] ) )
        <div class="col-md-6 table-responsive">
            <h1>Banor</h1>

            <table class="table">
                <tr>
                    <td>Namn</td>
                    <td>Spelläge</td>
                    <td></td>
                </tr>
                @foreach( $data['maps'] as $map )
                <tr>
                    <td>{{ $map->name }}</td>
                    <td>{{ $map->game_mode }}</td>
                    <td><a class="btn btn-primary btm-block" href="/ow/map/{{ $map->id }}">Läs mer</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif
    </div>
@endsection
