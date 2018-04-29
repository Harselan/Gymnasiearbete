<?php

namespace App\Http\Controllers;
use App\Pandascore;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getData( $category )
    {
        if( !isset( $_POST['type'] ) || empty( $_POST['type'] ) )
        {
            echo json_encode( [ 'error' => 1, 'message' => 'Datan som krävdes för att slutföra förfrågan skickades inte med!' ] ); die();
        }

        echo json_encode( [ 'success' => 1, 'data' => Pandascore::getData( $category, $_POST['type'] ) ] );die();
    }
}
