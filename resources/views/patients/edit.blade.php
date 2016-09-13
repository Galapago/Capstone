@extends('layouts.patients-master')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="/css/form_and_submission.style.css" rel="stylesheet">

<div class="container view">
	<section>
		<div class="edit-header">
			<h1 class="section-title">Edit Your Information</h1>
			<br>
			<a href="{{ action('PatientsController@show', $patient->id) }}" id="back-account" class="btn action-button">Back to Patient Account</a>
		</div>
		<form id="msform" method="POST" action="{{ action('PatientsController@update', $patient->id) }}">
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
			<fieldset>
				<div class="form-group first-group">
					<label class="question-label" for="username">Username</label>
					<input 
						type="text" 
						class="form-control"
						name="username" 
						value="{{ old('username')?: $patient->user->username }}">	
				</div>
				@include('partials.error', ['field' => 'username'])
				<div class="form-group">
					<label class="question-label" for="email">Email</label>
					<input 
						type="text" 
						class="form-control"
						name="email" 
						value="{{ old('email')?: $patient->user->email }}">	
				</div>
				@include('partials.error', ['field' => 'email'])
				<div class="form-group">
					<label class="question-label" for="phone">Patient Phone Number</label>
					<input
						type="text"
						class="form-control"
						name="phone"
						value="{{ old('phone')?: $patient->phone }}">
				</div>
				@include('partials.error', ['field' => 'phone'])
				<div class="form-group">
					<label class="question-label" for="street-address">Street Address</label>
					<input
						type="text"
						class="form-control"
						name="street-address"
						value="{{ old('street-address')?: $patient->street_address }}">
				</div>
				@include('partials.error', ['field' => 'street-address'])
				<div class="form-group">
					<label class="question-label" for="apt/ste">Apt/Ste</label>
					<input
						type="text"
						class="form-control"
						name="apt/ste"
						value="{{ old('apt/ste')?: $patient->apt_ste }}">
				</div>
				<div class="form-group">
					<label class="question-label" for="city">City</label>
					<input
						type="text"
						class="form-control"
						name="city"
						value="{{ old('city')?: $patient->city }}">
				</div>
				@include('partials.error', ['field' => 'city'])
				<div class="form-group">
					<label class="question-label" for="state">State Abbreviation</label>
					<input
						type="text"
						class="form-control"
						name="state"
						value="{{ old('state')?: $patient->state }}">
				</div>
				@include('partials.error', ['field' => 'state'])
				<div class="form-group">
					<label class="question-label" for="zip-code">Zip Code</label>
					<input
						type="text"
						class="form-control"
						name="zip-code"
						value="{{ old('zip-code')?: $patient->zip_code }}">
				</div>
				@include('partials.error', ['field' => 'zip-code'])
				<div class="form-group">
					<label class="question-label" for="emergency_contact_name">Emergency Contact Name</label>
					<input 
						type="text" 
						class="form-control"
						name="emergency_contact_name" 
						value="{{ old('emergency_contact_name')?: $patient->emergency_contact_name }}">	
				</div>
				@include('partials.error', ['field' => 'emergency_contact_name'])
				<div class="form-group">
					<label class="question-label" for="emergency_contact_number">Emergency Contact Number</label>
					<input 
						type="text" 
						class="form-control"
						name="emergency_contact_number" 
						value="{{ old('emergency_contact_number')?: $patient->emergency_contact_number }}">	
				</div>
				@include('partials.error', ['field' => 'emergency_contact_number'])
				<div class="form-group">
					<label class="question-label" for="emergency_contact_email">Emergency Contact Email</label>
					<input 
						type="text" 
						class="form-control"
						name="emergency_contact_email" 
						value="{{ old('emergency_contact_email')?: $patient->emergency_contact_email }}">	
				</div>
				@include('partials.error', ['field' => 'emergency_contact_email'])
				<div class="form-group">
					<label class="question-label" for="medication">Medication</label>
					<input 
						type="text" 
						class="form-control"
						name="medication" 
						value="{{ old('medication')?: $patient->medication }}">	
				</div>
				@include('partials.error', ['field' => 'medication'])
				<div class="form-group">
					<label class="question-label" for="health_insurance">Insurance</label>
					<input 
						type="text" 
						class="form-control"

						name="health_insurance" 

						name="insurance" 

						value="{{ old('health_insurance')?: $patient->health_insurance }}">	
				</div>
				@include('partials.error', ['field' => 'health_insurance'])

				<button type="submit" class="btn action-button">SAVE</button>
			</fieldset>
		</form>
	</section>
</div>

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<!-- External js sheet -->
<script src="/js/form_and_submission.js"></script>
@stop