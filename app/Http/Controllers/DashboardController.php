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
            return view( 'dashboard.app', [ 'category' => 'home' ] );
        }

        return view( 'categories.app', [ 'category' => $category, 'types' => Pandascore::getTypes( $category ) ] );
    }
}
