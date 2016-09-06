<div>
	<label for="{{ $question->id }}">{{ $question->question }}</label><br>
	@foreach($question->questionOptions as $option)
	<div class="checkbox">
		<label><input 
			type="checkbox" 
			class="checkbox"
			name="{{ $question->id }}">{{ $option->option_text }}</label>
	</div>
	@endforeach
</div>
@include('partials.error', ['field' => 'newsletter'])