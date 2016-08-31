@extends('layouts.patients-master')

<!-- This is the hard coded form. Right now this is in patients.index, however at any time we decide which
method we actually want to put this in, we can change the name of the blade to the name of that
method so that it correlates properly. -->

@section('content')
<div class="container">
	<section class="container-fluid">
		<h1 class="section-title">From the Office of Dr. {{ $form->physician->user->username }}</h1>
		<h2 class="section-title">{{ $form->form_name }}</h2>
		<br>
		<form method="POST" action="{{ action('SubmissionsController@store') }}">
		{!! csrf_field() !!}
			@foreach($form->questions as $question)
				@if($question->input_type == 'radio')
					@include('partials.radio')
				@elseif($question->input_type == 'checkbox')
					@include('partials.checkbox')
				@elseif($question->input_type == 'textarea')
					@include('partials.textarea')
				@endif
			@endforeach
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</section>
</div>
@stop