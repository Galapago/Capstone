<div>
	<label for="{{ $question->id }}">{{ $question->question }} </label><br>
	@foreach($question->questionOptions as $option)
	<div class="radio-inline">					
		<input 
			type="radio" 
			class="radio-inline"
			name="{{ $question->id }}" 
			value="{{ $option->option_text }}"> {{ $option->option_text }} 
	</div>
	@endforeach	
</div>
@include('partials.error', ['field' => '{{ $question->question }}'])