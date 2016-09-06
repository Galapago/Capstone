@extends('layouts.physicians-master')

@section('content')
<div class="container">
	<section class="container-fluid">
		<h1 class="section-title">Submitted Form {{ $submission->form_id }} from {{ $patient->first_name . ' ' . $patient->last_name }}</h1>
	</section>
	<section class="container-fluid">
		<h3 class="section-title">Patient Information</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Question</th>
					<th>Answer</th>
					<th></th>
				</tr>
			<thead>
			<tbody>
				@foreach($submission->	form->questions as $question)
					<tr>
						<td>{{ $question->question }}</td>
						@foreach($question->answer as $answer)
							<td>{{ $answer->answer }}</td>
						@endforeach
					</tr>
				@endforeach
			@foreach($answers as $key=>$answer)
			<tr>
				<td>{{$questions[$key]->question}}</td>
				<td>{{$answer}}</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</section>
</div>

@stop