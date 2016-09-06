@extends('layouts.master')

@section('content')
<div class="container view">
	<section>
		<h1 class="section-title">Physician Login</h1>
		<form method="post" action="{{ action('CustomAuth@authenticatePhysicians') }}">
		{{ csrf_field() }}
			<div class="form-group">
				<label for="email">Email</label>
				<input
					type="text"
					class="form-control"
					name="email"
					id="email">
			</div>
			@include('partials.error', ['field' => 'email'])
			<div class="form-group">
				<label for="npi">NPI</label>
				<input
					type="text"
					class="form-control"
					name="npi"
					id="npi">
			</div>
			@include('partials.error', ['field' => 'npi'])
			<div class="form-group">
				<label for="password">Password</label>
				<input
					type="password"
					class="form-control"
					name="password"
					id="password">	
			</div>
			@include('partials.error', ['field' => 'password'])
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</section>
</div>


@stop