@forelse($physician->patients as $patient)
	@forelse($patient->submissions as $submission)
	<tr>
		<td> Form No. {{ $submission->form_id }} from {{ $patient->first_name . ' ' . $patient->last_name }}</td>
	  	<td><a class="btn btn-primary" href="{{ action('SubmissionsController@show', $submission->form_id) }}">View Form No. {{ $submission->form_id }}</a></td>
	</tr>
	@empty
	<tr>
		<td colspan="2">Your patient {{ $patient->first_name . ' ' . $patient->last_name }} has not submitted any forms.</td>
	</tr>
	@endforelse
@empty
<div class"row">
	<p class="text-center"><strong>You have no patients</strong></p>
</div>
@endforelse


