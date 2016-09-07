@extends('layouts.master')

@section('content')
<div class"container">
	<section>
		<h2 class="section-title">Create a New User</h2>
		<form method="POST" action="{{ action('UsersController@store') }}">
		{!! csrf_field() !!}
		<div class="form-group">
				<label for="email">Email</label>
				<input
					type="text"
					class="form-control"
					name="email"
					value="{{ old('email') }}">
			</div>
			@include('partials.error', ['field' => 'email'])
			<div class="form-group">
				<label for="username">Username</label>
				<input
					type="text"
					class="form-control"
					name="username"
					value="{{ old('username') }}">
			</div>
			@include('partials.error', ['field' => 'username'])
			<div class="form-group">
				<label for="password">Password</label>
				<input
					type="text"
					class="form-control"
					name="password"
					value="{{ old('password') }}">
			</div>
			@include('partials.error', ['field' => 'password'])
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</section>
</div>

@stop