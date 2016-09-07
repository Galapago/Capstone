@extends('layouts.patients-master')


@section('content')
<div class"container">
	<section class"container-fluid">
		<h2 class="section-title">New Patient Information</h2>
		<form method="POST" action="{{ action('PatientsController@store') }}">
		{!! csrf_field() !!}
			<div class="form-group">
				<label for="first-name">First Name</label>
				<input
					type="text"
					class="form-control"
					name="first-name"
					value="{{ old('first-name') }}">
			</div>
			@include('partials.error', ['field' => 'first-name'])
			<div class="form-group">
				<label for="last-name">Last Name</label>
				<input
					type="text"
					class="form-control"
					name="last-name"
					value="{{ old('last-name') }}">
			</div>
			@include('partials.error', ['field' => 'last-name'])
			<div class="form-group">
				<label for="date-of-birth">Date of Birth (MM/DD/YYYY)</label>
				<input
					type="text"
					class="form-control"
					name="date-of-birth"
					value="{{ old('date-of-birth') }}">
			</div>
			@include('partials.error', ['field' => 'date-of-birth'])
			<div class="form-group">
				<label for="social-security">Social Security</label>
				<input
					type="text"
					class="form-control"
					name="social-security"
					value="{{ old('social-security') }}">
			</div>
			@include('partials.error', ['field' => 'social-security'])
			<div class="form-group">
				<label for="street-address">Street Address</label>
				<input
					type="text"
					class="form-control"
					name="street-address"
					value="{{ old('street-address') }}">
			</div>
			@include('partials.error', ['field' => 'street-address'])
			<div class="form-group">
				<label for="apt/ste">Apt/Ste</label>
				<input
					type="text"
					class="form-control"
					name="apt/ste">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input
					type="text"
					class="form-control"
					name="city"
					value="{{ old('city') }}">
			</div>
			@include('partials.error', ['field' => 'city'])
			<div class="form-group">
				<label for="state">Pick a State</label>
				<select name="state" class="form-control bfh-states" data-country="US" data-state="TX"></select>
			</div>
			@include('partials.error', ['field' => 'state'])
			<div class="form-group">
				<label for="zip-code">Zip Code</label>
				<input
					type="text"
					class="form-control"
					name="zip-code"
					value="{{ old('zip-code') }}">
			</div>
			@include('partials.error', ['field' => 'zip-code'])
			<div class="form-group">
				<label for="height">Height</label>
				<input
					type="text"
					class="form-control"
					name="height"
					value="{{ old('height') }}">
			</div>
			@include('partials.error', ['field' => 'height'])
			<div class="form-group">
				<label for="weight">Weight</label>
				<input
					type="text"
					class="form-control"
					name="weight"
					value="{{ old('weight') }}">
			</div>
			@include('partials.error', ['field' => 'weight'])
			<div class="form-group">
				<label for="emergency-contact-name">Emergency Contact Name</label>
				<input
					type="text"
					class="form-control"
					name="emergency-contact-name"
					value="{{ old('emergency-contact-name') }}">
			</div>
			@include('partials.error', ['field' => 'emergency-contact-name'])
			<div class="form-group">
				<label for="emergency-contact-number">Emergency Contact Number</label>
				<input
					type="text"
					class="form-control"
					name="emergency-contact-number"
					value="{{ old('emergency-contact-number') }}">
			</div>
			@include('partials.error', ['field' => 'emergency-contact-number'])
			<div class="form-group">
				<label for="emergency-contact-email">Emergency Contact Email</label>
				<input
					type="text"
					class="form-control"
					name="emergency-contact-email"
					value="{{ old('emergency-contact-email') }}">
			</div>
			@include('partials.error', ['field' => 'emergency-contact-email'])
			<div class="form-group">
				<label for="medication">Please List Current Medications</label>
				<input
					type="text"
					class="form-control"
					name="medication"
					value="{{ old('medication') }}">
			</div>
			@include('partials.error', ['field' => 'medication'])
			<div class="form-group">
				<label for="health-insurance">Health Insurance Company</label>
				<input
					type="text"
					class="form-control"
					name="health-insurance"
					value="{{ old('health-insurance') }}">
			</div>
			@include('partials.error', ['field' => 'health-insurance'])
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</section>
</div>


@stop

