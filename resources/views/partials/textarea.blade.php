<div>
	<label for="{{ $question->id }}">{{ $question->question }}</label>
		<input 
			type="textarea" 
			class="form-control"
			name="{{ $question->id }}"> 
</div>
@include('partials.error', ['field' => '{{ $question->question }}'])
			