<div class="form-group">
	<label for="{{ $question->question }}">{{ $question->question }}</label>
		<input 
			type="textarea" 
			class="form-control"
			name="{{ $question->question }}"> 
</div>
@include('partials.error', ['field' => '{{ $question->question }}'])
			