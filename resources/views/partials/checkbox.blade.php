<div class="question">
	<label class="question-label" for="{{ $question->id }}">{{ $question->question }}</label><br>
	<div class="row">
		@foreach($question->questionOptions as $option)
		<div class="checkbox-inline col-md-3">
			<label class="checkbox-label">
				<input 
				type="checkbox" 
				class="form-disabled"
				<?php $answers = $question->getPatientAnswers($answers) ?>
				{{ $option->check($answers) ? 'checked' : '' }}
				name="{{ $question->id }}">{{ $option->option_text }}
			</label>
		</div>
		@endforeach
	</div>
</div>
@include('partials.error', ['field' => 'newsletter'])