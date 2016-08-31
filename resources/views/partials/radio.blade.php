<div class="form-group">
	<label for="{{ $question->question }}">{{ $question->question }} </label><br>
	@foreach($options as $option)
	<div class="radio-inline">					
		<input 
			type="radio" 
			class="radio-inline"
			name="{{ $option->option_text }}" 
			value="{{ $option->option_text }}"> {{ $option->option_text }} 
	</div>
	@endforeach	
</div>
@include('partials.error', ['field' => '{{ $question->question }}'])