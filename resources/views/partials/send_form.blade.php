
<form method="POST" action="{{ action('PatientFormsController@store') }}">
	<label>Choose a Form:</label><br>
	@foreach ($forms as $form)
<div class="container">
	<div class="form-group">
		<h3>Send Patient Form</h3>
		<form class="form-inline send-form">
			<div class="form-group">
				<label>Which Form:</label>
		        <select>
		        	@foreach ($forms as $form)
		            <option
						name="form-id" 
						value="{{ $form->id }}">{{ $form->form_name }}
					</option>
					@endforeach
		        </select>
		    </div>
			<div class="form-group">
				<label>Which Patient:</label>
				<select>
					@foreach ($patients as $patient)
					<option 
						name="patient-id"
						value="{{ $patient->id }}"> {{ $patient->first_name . " " . $patient->last_name }}
					</option>
					@endforeach
				</select>
			</div>
			<a class="btn btn-primary">Send Form</a>
		</form>
	</div>
</div>
