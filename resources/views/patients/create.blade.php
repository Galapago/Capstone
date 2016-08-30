@extends('layouts.patients-master')

<!-- This is the hard coded form. Right now this is in patients.index, however at any time we decide which
method we actually want to put this in, we can change the name of the blade to the name of that
method so that it correlates properly. -->

@section('content')
<div class="container">
	<section class="container-fluid">
		<h1 class="section-title">Dr. Test Orthodontics</h1>
		<h2 class="section-title">Incoming Patient Form</h2>
		<br>
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
				<label for="sex">Sex </label><br>
				<div class="radio-inline">
					<input 
						type="radio" 
						class="radio-inline"
						name="sex" 
						value="male"> Male
				</div>
				<div class="radio-inline">
					<input 
						type="radio" 
						class="radio-inline"
						name="sex" 
						value="female"> Female
				</div>		
			</div>
			@include('partials.error', ['field' => 'sex'])
			<div class="form-group">
				<label for="newsletter">Sign up for our Newsletter?</label><br>
				<div class="checkbox">
					<label><input 
						type="checkbox" 
						class="checkbox"
						name="newsletter" 
						checked> Yes! </label>
				</div>
			</div>
			@include('partials.error', ['field' => 'newsletter'])
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</section>
</div>
@stop