@extends('layouts.patients-master')
@section('content')
<form>
	<div class="form-group col-md-8 col-md-offset-2">
		<h2 class="text-center">Personal Information</h2>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Name</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->first_name }} {{$patient->last_name}}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Username</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->user->username }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Email</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->user->email }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Password</div>
		  <div class="col-md-4 col-md-offset-2"><a class="btn btn-primary btn-xs" href="{{ action('PatientsController@editPassword', $patient->id) }}">Change Password</a></div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Social Security Number</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->ssn }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Emergency Contact</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->emergency_contact_name }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Emergency Contact Number</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->emergency_contact_number }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Emergency Contact Email</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->emergency_contact_email }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Medication Currently Taking</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->medication }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Current Health Insurer</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->health_insurance }}</div>
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<a class="btn btn-block btn-primary" href="{{ action('PatientsController@edit', $patient->user_id) }}">Edit Personal</a>
		</div>
		<div class="col-md-4"></div>
	</div>
</form>

<div class="form-group col-md-8 col-md-offset-2">
	<h2 class="text-center">My Forms</h2>
	@include('partials.patient_account_forms')
</div>

@stop