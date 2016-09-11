@extends('layouts.physicians-master')

@section('content')


<div class="header">
    <h1 class="section-title">Welcome to GalapaGo!</h1>
    <h2>Account For Dr. {{ $physician->first_name }} {{ $physician->last_name }}</h2><br>
</div>
@include('partials.send_form')
<div class="container">
	<section>
	<table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Form</th>
                <th>Date Submitted</th>
                <th>HL7</th>
            </tr>
        </thead>
        <tbody>
        	@include('partials.physician_account_forms')
        </tbody>
    </table>
	</section>
</div>	


@stop