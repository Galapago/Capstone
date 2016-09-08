<div>
	<label for="{{ $question->id }}">{{ $question->question }} </label><br>
	@foreach($question->questionOptions as $option)
	<div class="radio-inline">					
		<input 
			type="radio" 
			class="disabled radio-inline"
			name="{{ $question->id }}"
			<?php $answers = $question->getPatientAnswers($answers) ?>
			{{ $option->check($answers) ? 'checked' : '' }}
			value="{{ $option->option_text }}"> {{ $option->option_text }} 
	</div>
	@endforeach	
</div>
@include('partials.error', ['field' => '{{ $question->question }}'])