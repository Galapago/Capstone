<!DOCTYPE html>
<html lang="en">
<head>
    <title>Galapago</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/patients.style.css') }}" type="text/css">
     
</head>
<body>
	<nav class="navbar navbar-default">
	  	<div class="container-fluid">
		    <div class="navbar-header">
		    	<a class="navbar-brand" href="{{ action('PatientsController@show', Auth::user()->patients->id) }}">
		        	<img alt="Galapago" src="/css/img/turtle-logo.png">
		    	</a>
		    	<ul class="nav navbar-nav">
		    		<li><a href="{{ action('PatientsController@show', Auth::user()->patients->id) }}">GalapaGo</a></li>
		    	</ul>
		    </div>
		    <div class="navbar-header navbar-right">
		    	<ul class="nav navbar-nav">
		    		<li><a href="{{ action('PatientsController@show', Auth::user()->patients->id) }}">My Account</a></li>
		    	</ul>
		    	<a href="{{action('CustomAuth@logout')}}"><button type="button" class="btn-pad btn navbar-btn">Sign Out</button></a>
		    </div>
	  	</div>
	</nav>
	@if (session()->has('message'))
    	<div class="alert alert-success">{{ session('message') }}</div>
	@endif
	<div id="main">
		@yield('content')
	</div>
	@include('partials.patient_footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous"></script>
</body>
</html>