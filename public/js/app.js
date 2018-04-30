function getData( category, type )
{
    var data = { type: type };
    $('#dataDrop').removeClass( 'show' );

    $.ajax( {
        url: '/ajax/' + category + '/get',
        method: 'POST',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        datatype: 'JSON',
        success: function( response )
        {
            $('#dataResult').empty();

            response = JSON.parse( response );

            var table = dataTable( type, response.data )

            $('#dataResult').append( table );
        },
        error: function( error )
        {
            console.log( error );
        }
    } );
}

function dataTable( type, data )
{
    switch( type )
    {
        case 'heroes':
        case 'champions':
            var result = '<h1>Hjältar</h1><table class="table"><tr><td></td><td>Namn</td><td>Roll</td><td>Svårighetsgrad</td></tr>';

            data.forEach( function( index )
            {
                result += '<tr><td><img style="width:50px" src="' + index.image_url + '"/></td><td>' + index.name + '</td><td>';

                if( index.role != null )
                {
                    result += index.role;
                }
                else
                {
                    result += '0';
                }

                result += '</td><td>';

                if( index.difficulty != null )
                {
                    result += index.difficulty;
                }
                else
                {
                    result += '0';
                }

                result += '</td></tr>';
            } );

            result += '</table>';

            return result;
        break;

        case 'items':

        var result = '<h1>Föremål</h1><table class="table"><tr><td></td><td>Namn</td><td>Köpkostnad</td><td>Säljkostnad</td></tr>';

        data.forEach( function( index )
        {
            result += '<tr><td><img src="' + index.image_url + '"/></td><td>' + index.name + '</td><td>' + index.gold_total + ' g</td><td>' + index.gold_sell + ' g</td></tr>';
        } );

        result += '</table>';

        return result;
        break;

        case 'masteries':

        var result = '<h1>Masteries</h1><table class="table"></td><td>Namn</td></tr>';

        data.forEach( function( index )
        {
            result += '<tr><td>' + index.name + '</td></tr>';
        } );

        result += '</table>';

        return result;
        break;

        case 'spells':

        var result = '<h1>Förtrollningar</h1><table class="table"></td><td>Namn</td></tr>';

        data.forEach( function( index )
        {
            result += '<tr><td>' + index.name + '</td></tr>';
        } );

        result += '</table>';

        return result;
        break;

        case 'abilities':

        var result = '<h1>Förmågor</h1><table class="table"></td><td>Namn</td></tr>';

        data.forEach( function( index )
        {
            result += '<tr><td>' + index.name + '</td></tr>';
        } );

        result += '</table>';

        return result;

        break;

        case 'maps':

        var result = '<h1>Banor</h1><table class="table"></td><td>Namn</td><td>Spelläge</td><td></td></tr>';

        data.forEach( function( index )
        {
            result += '<tr><td>' + index.name + '</td><td>' + index.game_mode + '</td><td><a class="btn btn-primary btm-block" href="/ow/map/' + index.id + '">Se bild</a></td></tr>';
        } );

        result += '</table>';

        return result;

        break;
    }
}
