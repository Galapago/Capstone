@extends('layouts.patients-master')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="/css/form_and_submission.style.css" rel="stylesheet">

<div class="container view">
	<section>
		<h1 class="section-title">Edit Password</h1>
		<br>
		<a href="{{ action('PatientsController@show', $patient->id)}}">Go Back to Patient Account</a>
		<form id="msform" method="POST" action="{{ action('PatientsController@updatePassword', $patient->id) }}">
		{!! csrf_field() !!}
		{{ method_field('PUT') }}
			<fieldset>
				<div class="form-group">
					<label for="password">New Password</label>
					<input 
						type="password" 
						class="form-control"
						name="password" 
						value="{{ old('password') }}">				
				</div>
				@include('partials.error', ['field' => 'password'])
				<button type="submit" class="action-button">Submit</button>
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