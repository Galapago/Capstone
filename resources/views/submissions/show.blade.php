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
				<tr>
					<td>This is a question?</td>
					<td>That certainly seems to be the case.</td>
				</tr>
			</tbody>
		</table>
	</section>
</div>

@stop