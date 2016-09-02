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