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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home'
]);


//https://laravel.com/docs/5.1/authentication#included-routing
// Authentication routes...
//url del login cambiar la de post si se cambia esta
Route::get('login', [
	//Nombre del controlador
	'uses' => 'Auth\AuthController@getLogin',
	//Nombre de la ruta
	'as' => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'logout'
]);

// Registration routes...
Route::get('register', [
	'uses' => 'Auth\AuthController@getRegister',
	'as' => 'register'
]);
Route::post('register', 'Auth\AuthController@postRegister');

//https://laravel.com/docs/5.1/authentication#resetting-routing
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


//Midelware Por grupo de rutas (Tambien se pasan por controllers)
Route::group(['middleware'=> 'auth'], function(){
	Route::get('users', function(){
		return view('admin.users');
	});
});