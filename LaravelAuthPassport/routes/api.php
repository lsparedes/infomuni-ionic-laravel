<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    $user = $request->user();

    return response()->json([
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
    ]);
});


Route::post('register', 'Api\RegisterController@register');

Route::resource('/events', 'EventsAppController');
Route::resource('/services', 'EmprendeAppController');
Route::resource('/participation', 'ParticipacionAppController');

Route::get('preguntas/{id}', ['as'=> 'showpreguntas', 'uses' => 'ParticipacionAppController@show']);
Route::get('respuestas/{id}', ['as'=> 'showrespuestas', 'uses' => 'ParticipacionAppController@show2']);

Route::get('eventos/{id}', ['as'=> 'showeventos', 'uses' => 'EventsAppController@show']);

Route::get('emprende/{id}', ['as'=> 'showemprende', 'uses' => 'EmprendeAppController@show']);

Route::get('denuncia', 'DenunciasAppController@index');
Route::get('tipo', 'DenunciasAppController@tipo');
Route::post('denuncia_create', 'DenunciasAppController@store');
Route::post('participacion_create', 'ParticipacionAppController@store');

Route::get('todo', 'HomeAppController@index');
Route::get('detalle/{id}/{tipo}', ['as'=> 'showdetalle', 'uses' => 'HomeAppController@show']);

Route::get('mapa','MapaAppController@index');
//Route::post('/test-post', 'TestController@test');
//Route::post('/api-login', 'Api\AuthController@credentials2');
