@extends('layouts.patients-master')

<!-- This is the hard coded form. Right now this is in patients.index, however at any time we decide which
method we actually want to put this in, we can change the name of the blade to the name of that
method so that it correlates properly. -->
@section('content')
<div class="container">
	<section class="container-fluid">
		<h1 class="section-title">From the Office of Dr. {{ $form->physician->first_name }} {{ $form->physician->last_name }}</h1>
		<h2 class="section-title">{{ $form->form_name }}</h2>
		<br>
		<form method="POST" action="{{ action('SubmissionsController@store') }}">
		{!! csrf_field() !!}

		@foreach($questions as $question)
			@if ($question->section == 'personal')
				@include('partials.section')
			@elseif ($question->section == 'insurance')
				@include('partials.section')
			@elseif ($question->section == 'history')
				@include('partials.section')
			@elseif ($question->section == 'review_of_symptoms')
				@include('partials.section')
			@elseif ($question->section == 'doctor_specific')
				@include('partials.section')
			@endif
		@endforeach



		
			



			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</section>
</div>
@stop