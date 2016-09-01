<div class="form-group">
	<label for="{{ $question->question }}">{{ $question->question }}</label><br>
	@foreach($question->questionOptions as $option)
	<div class="checkbox">
		<label><input 
			type="checkbox" 
			class="checkbox"
			name="{{ $question->question }}" 
			checked> Yes! </label>
	</div>
	@endforeach
</div>
@include('partials.error', ['field' => 'newsletter'])