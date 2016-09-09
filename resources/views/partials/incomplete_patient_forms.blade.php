@forelse($patient->patient_forms as $form)
	<div class"row">
	<div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3"> Form No. {{ $form->form_id }}</div>

  	<div class="col-md-4 col-md-offset-2 col-xs-4"><a class="btn btn-primary" href="{{ action('FormsController@show', $form->id) }}">View Form No. {{ $form->form_id }}</a></div>
</div>
@empty
<div class"row">
	<p class="text-center"><strong>You have no incomplete forms.</strong></p>
</div>
@endforelse