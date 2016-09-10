@forelse ($patient->submissions as $submission)
<div class="row">
	<div class="col-md-5 col-xs-6 col-sm-4"></div>
	<a id="form" class="btn btn-primary col-md-2 col-xs-6 col-sm-4" href="/pdf/{{$submission->id}}" target="_blank">Form No. {{ $submission->form_id }}</a>
	<div class="col-md-5 col-xs-6 col-sm-4"></div>
</div>
@empty
<div class"row">
	<p class="text-center"><strong>You have no submitted forms.</strong></p>
</div>
@endforelse


