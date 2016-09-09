@extends('layouts.master')

@section('content')
<form id="register-form" action="{{action('Auth\AuthController@postRegister')}}" method="post" role="form" style="display: none;">
{{ csrf_field() }}
	<div class="form-group">
		<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
	</div>
	@include('partials.error', ['field' => 'username'])
	<div class="form-group">
		<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
	</div>
	@include('partials.error', ['field' => 'email'])
	<div class="form-group">
		<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
	</div>
	@include('partials.error', ['field' => 'password'])
	<div class="form-group">
		<input type="password" name="password_confirmation" id="password_confirmation" tabindex="2" class="form-control" placeholder="Confirm Password">
	</div>
	@include('partials.error', ['field' => 'password_confirmation'])
	<div class="form-group">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
			</div>
		</div>
	</div>
</form>

@stop