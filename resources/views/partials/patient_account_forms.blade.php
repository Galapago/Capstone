@foreach ($patient->submission as $submission)
<div class"row">
	<div class="col-md-4 col-md-offset-2"> Form No. {{ $submission->form_id }}</div>
  	<div class="col-md-4 col-md-offset-2"><a class="btn btn-primary" href="#">View Form No. {{ $submission->form_id }}</a></div>
</div>
@endforeach
