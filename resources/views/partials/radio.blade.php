<div>
	<label for="{{ $question->question }}">{{ $question->question }} </label><br>
	@foreach($question->questionOptions as $option)
	<div class="radio-inline">					
		<input 
			type="radio" 
			class="radio-inline"
			name="{{ $question->question }}" 
			value="{{ $option->option_text }}"> {{ $option->option_text }} 
	</div>
	@endforeach	
</div>
@include('partials.error', ['field' => '{{ $question->question }}'])