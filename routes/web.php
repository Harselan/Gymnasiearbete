<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',                                 'DashboardController@index');
Route::get('/{category}',                       'DashboardController@index');
Route::get('/ow/map/{map_id}',                  'DashboardController@getMap');
Route::get('/tournaments/{tournament}/matches', 'DashboardController@getMatches');

Route::post('/ajax/{category}/get',             'AjaxController@getData');
