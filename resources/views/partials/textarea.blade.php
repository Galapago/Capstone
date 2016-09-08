<div class="question">	
	<label class="question-label" for="{{ $question->id }}">{{ $question->question }}</label>
		<input 
			type="textarea" 
			class="form-disabled form-control"
			name="{{ $question->id }}"
			<?php $answer = $question->getPatientAnswers($answers) ?>

			value="{{ $answer->count() > 0 ? $answer->first()->answer : '' }}">
</div>


@include('partials.error', ['field' => '{{ $question->question }}'])
			