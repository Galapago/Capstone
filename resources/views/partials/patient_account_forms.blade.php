@forelse ($patient->submissions as $submission)
<div class"row">
	<a class="col-md-12 col-md-offset-5 col-xs-3" href="/pdf/{{$submission->id}}" target="_blank">Form No. {{ $submission->form_id }}</a>
</div>
@empty
<div class"row">
	<p class="text-center"><strong>You have no submitted forms.</strong></p>
</div>
@endforelse


