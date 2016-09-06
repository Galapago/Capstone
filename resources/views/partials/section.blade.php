<div class="form-group">
	@if($question->input_type == 'radio')
		@include('partials.radio')
	@elseif($question->input_type == 'checkbox')
		@include('partials.checkbox')
	@elseif($question->input_type == 'textarea')
		@include('partials.textarea')
	@endif
</div>
