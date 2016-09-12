<form class="form-inline send-form" method="POST" action="{{ action('PatientFormsController@store') }}">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Form: </label>
        <select class="form-control" name="form-id">
        	@foreach ($forms as $form)
            <option	 
				value="{{ $form->id }}"> {{ $form->form_name }}
			</option>
			@endforeach
        </select>
    </div>
	<div class="form-group">
		<label>Patient: </label>
		<select class="form-control" name="patient-id">
			@foreach ($patients as $patient)
			<option 
				value="{{ $patient->id }}"> {{ $patient->first_name . " " . $patient->last_name }}
			</option>
			@endforeach
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Send Form</button>
</form>


