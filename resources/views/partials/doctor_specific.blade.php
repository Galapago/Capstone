<h2 class="fs-title">Doctor Specific</h2>
@foreach($questions as $question)
	@if ($question->section == 'doctor_specific')
		@if ($question->input_type == 'radio')
			@include ('partials.radio')
		@elseif ($question->input_type == 'checkbox')
			@include ('partials.checkbox')
		@elseif ($question->input_type == 'textarea')
			@include ('partials.textarea')
		@endif
	@endif
@endforeach	

	
