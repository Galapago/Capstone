@extends('layouts.patients-master')
@section('content')
<<<<<<< HEAD


=======
<form>
	<div class="form-group col-md-8 col-md-offset-2">
		<h2 class="text-center">Personal Information</h2>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Name</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->first_name }} {{$patient->last_name}}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Username</div>
		  <div class="col-md-4 col-md-offset-2">{{ $user->username }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Email</div>
		  <div class="col-md-4 col-md-offset-2">{{ $user->email }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Password</div>
		  <div class="col-md-4 col-md-offset-2"><button class="btn btn-primary btn-xs">Change Password</button></div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Social Security Number</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->ssn }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Emergency Contact</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->emergency_contact_name }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Emergency Contact Number</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->emergency_contact_number }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Emergency Contact Email</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->emergency_contact_email }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Medication Currently Taking</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->medication }}</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">Current Health Insurer</div>
		  <div class="col-md-4 col-md-offset-2">{{ $patient->health_insurance }}</div>
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<button class="btn btn-block btn-primary" type="submit" action="">Edit Personal Info</button>
		</div>
		<div class="col-md-4"></div>
	</div>
</form>
>>>>>>> 9767efd6254347b2320b25863dedb486d732f035
@stop