@forelse($physician->patients as $patient)
	@forelse($patient->submissions as $submission)
	<tr>
		<td>{{ $patient->first_name . ' ' . $patient->last_name}}</td>
	  	<td><a href="/submissions/{{$submission->id}}">{{ \App\Form::where('id',$submission->form_id)->first()->form_name }}</a></td>
	  	<td>{{$submission->created_at}}</td>
	  	<td><a class="btn btn-primary" href="{{action('PhysiciansController@HL7',['submission'=>$submission->id])}}">View</a></td>
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


