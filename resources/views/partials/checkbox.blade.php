<div class="question">
	<label class="question-label" for="{{ $question->id }}">{{ $question->question }}</label><br>
	@foreach($question->questionOptions->chunk(3) as $threeOptions)
	<div class="row">
		@foreach($threeOptions as $option)
		<div class="checkbox-inline col-sm-3 col-xs-3 col-md-3">
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
	@endforeach
</div>
@include('partials.error', ['field' => 'newsletter'])