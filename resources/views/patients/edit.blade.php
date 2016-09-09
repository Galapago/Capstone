@extends('layouts.patients-master')

@section('content')
<div class="container view">
	<section>
		<h1 class="section-title">Edit Patient Information</h1>
		<form method="POST" action="{{ action('PatientsController@update', $patient->id) }}">
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
			<div class="form-group">
				<label for="username">Username</label>
				<input 
					type="text" 
					class="form-control"
					name="username" 
					value="{{ old('username')?: $patient->user->username }}">	
			</div>
			@include('partials.error', ['field' => 'username'])
			<div class="form-group">
				<label for="email">Email</label>
				<input 
					type="text" 
					class="form-control"
					name="email" 
					value="{{ old('email')?: $patient->user->email }}">	
			</div>
			@include('partials.error', ['field' => 'email'])
			<div class="form-group">
				<label for="phone">Patient Phone Number</label>
				<input
					type="text"
					class="form-control"
					name="phone"
					value="{{ old('phone')?: $patient->phone }}">
			</div>
			@include('partials.error', ['field' => 'phone'])
			<div class="form-group">
				<label for="street-address">Street Address</label>
				<input
					type="text"
					class="form-control"
					name="street-address"
					value="{{ old('street-address')?: $patient->street_address }}">
			</div>
			@include('partials.error', ['field' => 'street-address'])
			<div class="form-group">
				<label for="apt/ste">Apt/Ste</label>
				<input
					type="text"
					class="form-control"
					name="apt/ste"
					value="{{ old('apt/ste')?: $patient->apt_ste }}">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input
					type="text"
					class="form-control"
					name="city"
					value="{{ old('city')?: $patient->city }}">
			</div>
			@include('partials.error', ['field' => 'city'])
			<div class="form-group">
				<label for="state">State Abbreviation</label>
				<input
					type="text"
					class="form-control"
					name="state"
					value="{{ old('state')?: $patient->state }}">
			</div>
			@include('partials.error', ['field' => 'state'])
			<div class="form-group">
				<label for="zip-code">Zip Code</label>
				<input
					type="text"
					class="form-control"
					name="zip-code"
					value="{{ old('zip-code')?: $patient->zip_code }}">
			</div>
			@include('partials.error', ['field' => 'zip-code'])
			<div class="form-group">
				<label for="emergency_contact_name">Emergency Contact Name</label>
				<input 
					type="text" 
					class="form-control"
					name="emergency_contact_name" 
					value="{{ old('emergency_contact_name')?: $patient->emergency_contact_name }}">	
			</div>
			@include('partials.error', ['field' => 'emergency_contact_name'])
			<div class="form-group">
				<label for="emergency_contact_number">Emergency Contact Number</label>
				<input 
					type="text" 
					class="form-control"
					name="emergency_contact_number" 
					value="{{ old('emergency_contact_number')?: $patient->emergency_contact_number }}">	
			</div>
			@include('partials.error', ['field' => 'emergency_contact_number'])
			<div class="form-group">
				<label for="emergency_contact_email">Emergency Contact Email</label>
				<input 
					type="text" 
					class="form-control"
					name="emergency_contact_email" 
					value="{{ old('emergency_contact_email')?: $patient->emergency_contact_email }}">	
			</div>
			@include('partials.error', ['field' => 'emergency_contact_email'])
			<div class="form-group">
				<label for="medication">Medication</label>
				<input 
					type="text" 
					class="form-control"
					name="medication" 
					value="{{ old('medication')?: $patient->medication }}">	
			</div>
			@include('partials.error', ['field' => 'medication'])
			<div class="form-group">
				<label for="health_insurance">Insurance</label>
				<input 
					type="text" 
					class="form-control"

					name="health_insurance" 

					name="insurance" 

					value="{{ old('health_insurance')?: $patient->health_insurance }}">	
			</div>
			@include('partials.error', ['field' => 'health_insurance'])

			<button type="submit" class="btn btn-primary">Save</button>
		</form>
		<br>
		<a href="{{ action('PatientsController@show', $patient->id) }}">Go Back to Patient Account</a>
	</section>
</div>
@stop