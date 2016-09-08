@extends('layouts.patients-master')

<!-- This is the hard coded form. Right now this is in patients.index, however at any time we decide which
method we actually want to put this in, we can change the name of the blade to the name of that
method so that it correlates properly. -->
@section('content')

<link href="/css/form_and_submission.style.css" rel="stylesheet">

<div class="container">
	<section class="container-fluid">
		<h1 class="section-title">From the Office of Dr. {{ $form->physician->first_name }} {{ $form->physician->last_name }}</h1>
		<h2 class="section-title">{{ $form->form_name }}</h2>
        
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
			<input type="submit" name="submit" class="submit action-button" value="Submit" />
		</fieldset>
	</form>
</div>

			

			
		

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<script src="/js/form_and_submission.js"></script>



@stop