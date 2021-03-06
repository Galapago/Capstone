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




Route::get('/', function(){
	return view('index');
});
//Login Routes
Route::get('/','HomeController@index');
Route::get('/physicians/login','CustomAuth@physiciansLogin');
Route::post('/physicians/login','CustomAuth@authenticatePhysicians');
Route::get('/patient/login','CustomAuth@patientsLogin');
Route::post('/patient/login','CustomAuth@authenticatePatients');
Route::get('auth/logout', 'CustomAuth@logout');
Route::post('auth/logout', 'CustomAuth@logout');
Route::get('/physician/validate',function(){
	return view('physician_validation');
	})->middleware('provider');
Route::post('/physician/validate','CustomAuth@physicianValidate');
Route::get('/physicians/HL7/{submission}/','PhysiciansController@HL7');
Route::get('/home/{id}','PatientsController@show');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::post('/physicians/statistics/AJAX','PhysiciansController@statistics');
Route::get('/physicians/statistics/AJAX','PhysiciansController@statistics');
//Patients Controller - Basic CRUD
Route::resource('patients', 'PatientsController');
Route::get('/physicians/stats','PhysiciansController@displayStats');
Route::put('patients/password/{id}', 'PatientsController@updatePassword');
Route::get('patients/password/{id}', 'PatientsController@editPassword');
//Physicians Controller - Basic CRUD
Route::resource('physicians', 'PhysiciansController');


//Users Controller - Basic CRUD
Route::resource('users', 'UsersController');
Route::resource('CustomAuth', 'CustomAuth');
Route::get('/physicians/create/form','FormsController@create');
Route::post('/physicians/create/form',
'FormsController@test');

//Forms Controller - Basic CRUD
Route::resource('forms', 'FormsController');

//Users Controller - Basic CRUD
Route::resource('users', 'UsersController');
Route::resource('patientFormsController','PatientFormsController');
//Submissions Controller - Basic CRUD
Route::resource('submissions', 'SubmissionsController');
Route::get('/submissions/{id}','SubmissionsController@show')->middleware('provider');
//PatientForms Controller - Basic CRUD
Route::resource('patientforms', 'PatientFormsController');




Route::get('/pdf/{id}', function($form_id) {
    $pdf = PDF::make();
    $pdf->setOptions(['tmp' => __DIR__ . '/../../storage/temppdf']);
    $pdf->addPage( action('SubmissionsController@show', $form_id) );
    
    if (!$pdf->send()) {
	    throw new Exception('Could not create PDF: '.$pdf->getError());
	}
	$content = $pdf->toString();
	if ($content === false) {
	    throw new Exception('Could not create PDF: '.$pdf->getError());
	}
});
