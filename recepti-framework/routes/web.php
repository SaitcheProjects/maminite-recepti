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

Route::get('/', 'ReceptionController@index')->name('homepage');

Route::get('/статии', 'ArticleController@index')->name('articles');

Route::get('/{showparam}','ReceptionController@show');



//Route::get('/reception/add', 'ReceptionController@create')->name('create-reception');

//Route::post('/reception/add','ReceptionController@store')->name('create-reception');


//*****************************************************
//      CLEAR DATA
//*****************************************************

//Clear Data (cache:clear, view:clear, route:clear, clear-compiled, config:cache)
//Route::get('/route-clear', function() {
//    $exitCode = Artisan::call('clear:data');
//    return '<h1>Data cleared</h1>';
//});



