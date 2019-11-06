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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('emprende', 'EmprendedorController');
Route::get('/listaemprende', 'EmprendedorController@create')->name('listaemprende');
Route::get('listaemprende/{id}', ['as'=> 'showemprende', 'uses' => 'EmprendedorController@show']);
Route::post('import-list-excel', 'EmprendedorController@importExcel')->name('emprende.import.excel');

Route::resource('eventos', 'ControllerCalendar');
Route::get('Evento/form','ControllerCalendar@form');
Route::post('Evento/create','ControllerCalendar@create');
Route::get('Evento/details/{id}','ControllerCalendar@details');
Route::get('Evento/event','ControllerCalendar@index');
Route::get('Evento/event/{mes}','ControllerCalendar@index_month');

Route::resource('participacion', 'ParticipacionController');
Route::get('participacion/{id}', ['as'=> 'showparticipacion', 'uses' => 'ParticipacionController@show']);
Route::get('participacion-data', ['as' => 'ParticipacionControllerGetData', 'uses' => 'ParticipacionController@getdata']);
Route::get('participacion-estado/{id}','ParticipacionController@estado')->name('estado');


Route::resource('users', 'UsersController');
Route::get('users-data', ['as' => 'UsersControllerGetData', 'uses' => 'UsersController@getdata']);
Route::post('UpdateProfile/{id}', ['as'=> 'UpdateProfile', 'uses' => 'UsersController@UpdateProfile']);
Route::get('profile/{id}', ['as'=> 'profile', 'uses' => 'UsersController@showProfile']);

Route::resource('infomapa', 'MapaController');

Route::resource('denuncias', 'DenunciasController');
Route::get('estado-denuncias/{id}','DenunciasController@estado')->name('estado_denuncia');