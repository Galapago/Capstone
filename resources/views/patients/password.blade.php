@extends('layouts.patients-master')

@section('content')
<div class="container view">
	<section>
		<h1 class="section-title">Edit Password</h1>
		<form method="POST" action="{{ action('PatientsController@updatePassword', $patient->id) }}">
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
			<div class="form-group">
				<label for="password">New Password</label>
				<input 
					type="password" 
					class="form-control"
					name="password" 
					value="{{ old('password') }}">				
			</div>
			@include('partials.error', ['field' => 'password'])
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<br>
		<a href="{{ action('PatientsController@show')}}">Go Back to Patient Account</a>
	</section>
</div>
@stop