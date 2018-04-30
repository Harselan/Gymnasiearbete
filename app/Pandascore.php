<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pandascore extends Model
{
    public static function getTypes( $category = '0' )
    {
        switch( $category )
        {
            case 'lol':
            $result = [
                'champions',
                'items',
                'masteries',
                'spells'
            ];
            break;

            case 'ow':
            $result = [
                'heroes',
                'maps'
            ];
            break;

            case 'dota2':
            $result = [
                'heroes',
                'abilities'
            ];
            break;
        }

        return $result;
    }

    public static function getTournaments()
    {
        $result = [
            'lol'       => json_decode( file_get_contents( 'https://api.pandascore.co/videogames/1/series?token=' . env('PS_KEY') ) ),
            'dota2'     => json_decode( file_get_contents( 'https://api.pandascore.co/videogames/4/series?token=' . env('PS_KEY') ) ),
            'ow'        => json_decode( file_get_contents( 'https://api.pandascore.co/videogames/14/series?token=' . env('PS_KEY') ) )
        ];

        return $result;
    }

    public static function getMatches( $type, $category = '0' )
    {
        if( $type == 'tournament' )
        {
            $result = [
                'upcoming' => json_decode( file_get_contents( 'https://api.pandascore.co/series/' . $category . '/matches/upcoming?token=' . env('PS_KEY') ) ),
                'running'  => json_decode( file_get_contents( 'https://api.pandascore.co/series/' . $category . '/matches/running?token=' . env('PS_KEY') ) ),
                'past'     => json_decode( file_get_contents( 'https://api.pandascore.co/series/' . $category . '/matches/past?token=' . env('PS_KEY') ) )
            ];

            return $result;
        }

        if( $category == '0' )
        {
            $result = [
                'upcoming' => json_decode( file_get_contents( 'https://api.pandascore.co/matches/upcoming?token=' . env('PS_KEY') ) ),
                'running'  => json_decode( file_get_contents( 'https://api.pandascore.co/matches/running?token=' . env('PS_KEY') ) ),
                'past'     => json_decode( file_get_contents( 'https://api.pandascore.co/matches/past?token=' . env('PS_KEY') ) )
            ];
        }
        else
        {
            $result = [
                'upcoming' => json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/matches/upcoming?token=' . env('PS_KEY') ) ),
                'running'  => json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/matches/running?token=' . env('PS_KEY') ) ),
                'past'     => json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/matches/past?token=' . env('PS_KEY') ) )
            ];
        }

        return $result;
    }

    public static function getData( $category = '0', $type )
    {
        return self::gets( $category, $type );
    }

    public static function get( $category = '0' )
    {
        switch( $category )
        {
            case 'lol':
            $result = [
                'champions' => self::gets( $category, 'heroes' ),
                'items'     => self::gets( $category, 'items' ),
                'masteries' => self::gets( $category, 'masteries' ),
                'spells' => self::gets( $category, 'spells' )
            ];
            break;

            case 'ow':
            $result = [
                'heroes' => self::gets( $category, 'heroes' ),
                'maps'   => self::gets( $category, 'maps' )
            ];
            break;

            case 'dota2':
            $result = [
                'heroes'    => self::gets( $category, 'heroes' ),
                'abilities' => self::gets( $category, 'abilities' )
            ];
            break;
        }

        return $result;
    }

    public static function gets( $category = '0', $type = '0' )
    {
        switch( $type )
        {
            case 'heroes':
            case 'champions':
                $types = [ 'ow' => 'heroes', 'lol' => 'champions', 'dota2' => 'heroes' ];

                if( $category == '0' )
                {
                    return true;
                }

                return json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/' . $types[$category] . '?token=' . env('PS_KEY') ) );
            break;

            case 'abilities':
                return json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/abilities?token=' . env('PS_KEY') ) );
            break;

            case 'items':
                return json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/items?token=' . env('PS_KEY') ) );
            break;

            case 'masteries':
                return json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/masteries?token=' . env('PS_KEY') ) );
            break;

            case 'runes':
                return json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/runes?token=' . env('PS_KEY') ) );
            break;

            case 'spells':
                return json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/spells?token=' . env('PS_KEY') ) );
            break;

            case 'maps':
                if( $category == '0' )
                {
                    return true;
                }

                return json_decode( file_get_contents( 'https://api.pandascore.co/' . $category . '/maps?token=' . env('PS_KEY') ) );
            break;
        }
    }
}
