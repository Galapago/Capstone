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
<<<<<<< HEAD
});

//Login Routes
=======
});*/
Route::get('/','CustomAuth@authenticate');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//Testing auth routes
Route::get('/test','CustomAuth@index');
Route::post('/test','CustomAuth@authenticate');
Route::get('/test/logout','CustomAuth@logout');
/*Route::get('/test/validate',function(){
	return view('physician_validation');
});*/
Route::post('/test/validate','CustomAuth@physicianValidate');

Route::get('/physician/validate', function(Request $request)
{
	if($request->session()->has('doctor_validated')){
		return 'DOCTOR HOME PAGE WILL GO HERE';
	}
	return view('physician_validation');
});
Route::post('/physician/validate','CustomAuth@physicanValidate');
Route::get('/home','PatientsController@create');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Patients Controller - Basic CRUD
Route::resource('patients', 'PatientsController');
Route::put('patients/password/{id}', 'PatientsController@updatePassword');
Route::get('patients/password/{id}', 'PatientsController@editPassword');

//Physicians Controller - Basic CRUD
Route::resource('physicians', 'PhysiciansController');


//Users Controller - Basic CRUD
Route::resource('users', 'UsersController');
Route::resource('CustomAuth', 'CustomAuth');


//Forms Controller - Basic CRUD
Route::resource('forms', 'FormsController');

//Submissions Controller - Basic CRUD
Route::resource('submissions', 'SubmissionsController');



Route::get('/pdf', function() {
    $pdf = PDF::make();
    $pdf->setOptions(['tmp' => __DIR__ . '/../../storage']);
    $pdf->addPage('http://getbootstrap.com/');
    $pdf->send('example.pdf');
});

