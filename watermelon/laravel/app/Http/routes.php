<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('wellcome');
// });

Route::any ( '/'            , 'HomeController@index' );

Route::get ( '/login'       , 'LoginController@index' );
Route::get ( '/logout'      , 'LoginController@logout' );
Route::post( '/login_chk'   , 'LoginController@login' );
Route::get ( '/new_mem'     , 'LoginController@new_mem' );
Route::post( '/mem_regist'  , 'LoginController@regist' );
Route::any ( '/chk_inputval', 'LoginController@chk_inputval' );
Route::any ( '/mem_list'    , 'LoginController@mem_list' );
Route::post( '/modi_mem'    , 'LoginController@modify_mem');

Route::get ( '/music_list'  , 'FileController@index');
Route::any ( '/new_music'   , 'FileController@store');


Route::get('/ping', function () {
    return response('pong')->header('Conteny-Type', 'text/plain');
});

Route::get('/cyka', function () {
    return 'cyka1818';
});

Route::get('/myjson', function () {
    return ['foo' => 'bar', 'hoge' => [1,2,3]];
});

Route::get('/photos', 'PhotoController@index');
Route::get('/debug', 'Debug\SessionController@index');
Route::get('/admin', 'Admin\SessionController@index');

Route::group(['prefix' => 'api', 'namespace' => 'Api', 'middleware' => 'api'], function() {
    Route::get('', 'HomeController@index');
});

