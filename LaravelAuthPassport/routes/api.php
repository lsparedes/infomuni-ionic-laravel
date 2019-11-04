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
//Route::post('/test-post', 'TestController@test');
//Route::post('/api-login', 'Api\AuthController@credentials2');
