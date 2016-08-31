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
use Illuminate\Http\Request;
/*Route::get('/', function (Request $request) {
    return view('welcome');
});*/
Route::get('/','CustomAuth@authenticate');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('/test','CustomAuth@index');
Route::post('/test','CustomAuth@authenticate');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('patients', 'PatientsController');

Route::resource('physicians', 'PhysiciansController');
<<<<<<< HEAD

Route::resource('users', 'UsersController');
=======
Route::get('/pdf', function() {
    $pdf = PDF::make();
    $pdf->setOptions(['tmp' => __DIR__ . '/../../storage']);
    $pdf->addPage('http://getbootstrap.com/');
    $pdf->send('example.pdf');
});
>>>>>>> 6dac7ff32266c34c2212a7834e12d0deab56b887
