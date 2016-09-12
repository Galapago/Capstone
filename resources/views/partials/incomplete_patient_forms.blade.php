<?php $incompleteCount = 0 ?>
@foreach($patient->patientForms as $form)
@if(!$form->hasSubmissionFor($patient))
	<?php $incompleteCount++ ?>
	<div class"row">
	<div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3"> Form No. {{ $form->id }}</div>

  	<div class="col-md-4 col-md-offset-2 col-xs-4"><a class="btn btn-primary" href="{{ action('FormsController@show', $form->id) }}">View Form No. {{ $form->id }}</a></div>
</div>
@endif
@endforeach
@if ($incompleteCount == 0)
<div class"row">
	<p class="text-center"><strong>You have no incomplete forms.</strong></p>
</div>
@endif