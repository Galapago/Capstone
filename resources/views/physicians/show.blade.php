@extends('layouts.physicians-master')

@section('content')
<div class="container">
	<section>
	<h1 class="section-title">Welcome to GalapaGo!</h1>
	<h2>Account For Dr. {{ $physician->first_name }} {{ $physician->last_name }}</h2><br>


	<table class="table table-hover">
        <thead>
            <tr>
                <th>Submitted Forms</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	@include('partials.physician_account_forms')
        </tbody>
    </table>
	</section>
</div>	

@stop