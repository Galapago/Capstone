@forelse ($patient->submissions as $submission)
<div class"row">
	<div class="col-md-4 col-md-offset-2 col-xs-5 col-xs-offset-3"> Form No. {{ $submission->form_id }}</div>
<<<<<<< HEAD
  	<div class="col-md-4 col-md-offset-2 col-xs-4"><a href="#">View Form No. {{ $submission->form_id }}</a></div>
=======
  	<div class="col-md-4 col-md-offset-2 col-xs-4"><a class="btn btn-primary" href="{{ action('SubmissionsController@show', $submission->id) }}">View Form No. {{ $submission->form_id }}</a></div>
>>>>>>> 844a1c864d7f209ba9e4e5279ce6c4ac6e1bb262
</div>
@empty
<div class"row">
	<p class="text-center"><strong>You have no submitted forms.</strong></p>
</div>
@endforelse


