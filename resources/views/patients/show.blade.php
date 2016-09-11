@extends('layouts.patients-master')
@section('content')

	<div class="form-group container-fluid col-md-8 col-md-offset-2">
		<h2 class="text-center">Personal Information</h2>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Name</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->first_name }} {{$patient->last_name}}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Username</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->user->username }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Email</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->user->email }}</div>
		</div>
		<div class="row">

		  <div class="col-md-4 col-md-offset-2">Password</div>
		  <div class="col-md-4 col-md-offset-2"><a class="btn btn-primary btn-xs" href="{{ action('PatientsController@editPassword', $patient->id) }}">Change Password</a></div>

		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Social Security Number</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->ssn }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Emergency Contact</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->emergency_contact_name }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Emergency Contact Number</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->emergency_contact_number }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Emergency Contact Email</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->emergency_contact_email }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Medication Currently Taking</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->medication }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3">Current Health Insurer</div>
		  <div class="col-md-4 col-md-offset-2 col-xs-4">{{ $patient->health_insurance }}</div>
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<a class="btn btn-block btn-primary" href="{{ action('PatientsController@edit', $patient->id) }}">Edit Personal</a>
		</div>
		<div class="col-md-4"></div>
	</div>

<div class="form-group container-fluid col-md-8 col-md-offset-2">
	<h2 class="text-center">My Forms</h2>
	@include('partials.incomplete_patient_forms')
</div>
<div class="form-group container-fluid col-md-8 col-md-offset-2">
	<h2 class="text-center">My Submissions</h2>
	@include('partials.patient_account_forms')
</div>
@stop