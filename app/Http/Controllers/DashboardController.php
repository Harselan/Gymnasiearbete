<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pandascore;

class DashboardController extends Controller
{
    public function index( $category = '0' )
    {
        if( $category == '0' )
        {
            return view( 'layouts.app', [ 'category' => 'home' ] );
        }

        if( $category == 'tournaments' )
        {
            return view( 'tournaments.app', [ 'tournaments' => Pandascore::getTournaments(), 'category' => $category ] );
        }

        return view( 'categories.app', [ 'category' => $category, 'types' => Pandascore::getTypes( $category ), 'matches' => Pandascore::getMatches( '', $category ) ] );
    }

    public function getMatches( $tournament_slug )
    {
        return view( 'tournaments.show', ['category' => 'tournaments', 'tournament' => $tournament_slug,  'matches' => Pandascore::getMatches( 'tournament', $tournament_slug ) ] );
    }
}
