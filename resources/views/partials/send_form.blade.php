<div class="container">
	<div class="form-group">
		<h3 class="header">Send Patient Form</h3>
		<form class="form-inline send-form" method="POST" >
			<div class="form-group">
				<label>Which Form: </label>
		        <select class="form-control">
		        	@foreach ($forms as $form)
		            <option
						name="form-id" 
						value="{{ $form->id }}"> {{ $form->form_name }}
					</option>
					@endforeach
		        </select>
		    </div>
			<div class="form-group">
				<label>Which Patient: </label>
				<select class="form-control">
					@foreach ($patients as $patient)
					<option 
						name="patient-id"
						value="{{ $patient->id }}"> {{ $patient->first_name . " " . $patient->last_name }}
					</option>
					@endforeach
				</select>
			</div>
			<a class="btn btn-primary">Send Form</a>
		@endforeach
		</form>
	</div>
</div>

