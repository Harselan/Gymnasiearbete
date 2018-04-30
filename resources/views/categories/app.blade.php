@extends( 'layouts.app' )

@section( 'content' )
        <div class="col-md-10 mt-5 col-centered row text-center">
            <div class="card p-0 col-md m-3">
                <div class="card-body">
                    <h4 class="card-title"><a>Kommande matcher</a></h4>
                    <div class=" card-body">
                        <?php $counter = 0; ?>
                        @foreach( $matches['upcoming'] as $key => $match )
                            @if( isset( $match->opponents[1] ) && !empty( $match->opponents[1] ) && $key < 10 )
                            <div class="row">
                                <div class="col-md p-0">
                                    <img style="width:20px;" src="{{  $match->opponents[0]->opponent->image_url }}" alt="">
                                    <p>{{ $match->opponents[0]->opponent->acronym }}</p>
                                </div>

                                <div class="col-md p-0">
                                    <img style="width:20px;">
                                    <p style="height:20px;">MOT</p>
                                    <a href="#match{{ $counter }}" data-toggle="collapse">Se mer</a>
                                </div>

                                <div class="col-md p-0">
                                    <img style="width:20px" src="{{  $match->opponents[1]->opponent->image_url }}" alt="">
                                    <p>{{ $match->opponents[1]->opponent->acronym }}</p>
                                </div>

                                <div id="match{{ $counter }}" class="collapse text-left col-md-12">
                                    <small><b>Datum:</b> {{ date( 'Y-m-d', strtotime( $match->begin_at ) ) }}</small><br>
                                    <small><b>Tid:</b> {{ date( 'H:i', strtotime( $match->begin_at ) ) }}</small><br>
                                    <small><b>Serie:</b> {{ $match->serie->slug }}</small>
                                </div>
                            </div>
                            <?php $counter++; ?>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card p-0 col-md m-3">
                <div class="card-body">
                    <h4 class="card-title"><a>Pågående matcher</a></h4>
                    <div class=" card-body">
                        @foreach( $matches['running'] as $key => $match )
                            @if( isset( $match->opponents[1] ) && !empty( $match->opponents[1] ) && $key < 10 )
                            <div class="row">
                                <div class="col-md p-0">
                                    <img style="width:20px;" src="{{  $match->opponents[0]->opponent->image_url }}" alt="">
                                    <p>{{ $match->opponents[0]->opponent->acronym }}</p>
                                </div>

                                <div class="col-md p-0">
                                    <img style="width:20px;">
                                    <p style="height:20px;">MOT</p>
                                    <a href="#match{{ $counter }}" data-toggle="collapse">Se mer</a>
                                </div>

                                <div class="col-md p-0">
                                    <img style="width:20px" src="{{  $match->opponents[1]->opponent->image_url }}" alt="">
                                    <p>{{ $match->opponents[1]->opponent->acronym }}</p>
                                </div>

                                <div id="match{{ $counter }}" class="collapse text-left col-md-12">
                                    <small><b>Datum:</b> {{ date( 'Y-m-d', strtotime( $match->begin_at ) ) }}</small><br>
                                    <small><b>Tid:</b> {{ date( 'H:i', strtotime( $match->begin_at ) ) }}</small><br>
                                    <small><b>Serie:</b> {{ $match->serie->slug }}</small>
                                </div>
                            </div>
                            <?php $counter++; ?>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card p-0 col-md m-3">
                <div class="card-body">
                    <h4 class="card-title"><a>Avslutade matcher</a></h4>
                    <div class=" card-body">
                        @foreach( $matches['past'] as $key => $match )
                            @if( isset( $match->opponents[1] ) && !empty( $match->opponents[1] ) && $key < 10 )
                                <img style="width:20px;" src="{{  $match->winner->image_url }}" alt="">
                                <p>{{ $match->winner->name }} <span class="bg-success">Vann</span></p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    <a href="#dataDrop" class="btn btn-primary btn-block mt-3" data-toggle="collapse">Vad vill du se</a>
    <div id="dataDrop" class="collapse">
        @foreach( $types as $type )
            <button class="btn btn-block btn-light text-capitalize" onclick="getData( '{{ $category }}','{{ $type }}' )">{{ $type }}</button>
        @endforeach
    </div>

    <div class="row mt-5">
        <div class="col-md table-responsive  text-center" id="dataResult"></div>
    </div>
@endsection
