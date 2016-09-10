@extends('layouts.patients-master')

<!-- This is the hard coded form. Right now this is in patients.index, however at any time we decide which
method we actually want to put this in, we can change the name of the blade to the name of that
method so that it correlates properly. -->
@section('content')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="{{ asset('css/form_and_submission.style.css') }}" rel="stylesheet">

<div class="container">
	<section class="header container-fluid text-center">
		<h2 class="section-title">From the Office of Dr. {{ $form->physician->first_name }} {{ $form->physician->last_name }} - <small class="header">{{ $form->form_name }}</small></h2>
	</section
        
    <!-- multistep form -->	
	<form id="msform" method="POST" action="{{ action('SubmissionsController@store') }}">
	{!! csrf_field() !!}
		<input type="hidden" name="form_id" value="{{ $id }}">

 		<!-- progressbar -->
		<ul id="progressbar">
			<li class="active">Personal</li>
			<li>Insurance</li>
			<li>History</li>
			<li>Symptoms</li>
			<li>Specific</li>
		</ul>

		<!-- fieldsets -->
		<fieldset>
			@include ('partials.personal')
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>

		<fieldset>
			@include ('partials.insurance')
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>

		<fieldset>
			@include ('partials.history')
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>

		<fieldset>
			@include ('partials.symptoms')
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>

		<fieldset>
			@include ('partials.doctor_specific')
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<button class="btn action-button" type="submit" name="submit">Submit</button>
		</fieldset>
	</form>
</div>

			

			
		

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<!-- External js sheet -->
<script src="{{ asset('js/form_and_submission.js') }}"></script>



@stop