<form>
	<label>Choose a Form:</label><br>
	@foreach ($forms as $form)
	<div>
		<input
			type="radio"
			name="{{ $form->id }}" 
			value="{{ $form->id }}"> {{ $form->form_name }}
		
	</div>
	@endforeach

	<label>Which Patient:</label><br>
	@foreach ($patients as $patient)
	<div>
		<input
			type="radio"
			name="{{ $patient->name }}" 
			value="{{ $patient->id }}"> {{ $patient->first_name . " " . $patient->last_name }}
	</div>
	@endforeach
	<button type="submit">Send</button>
</form>
