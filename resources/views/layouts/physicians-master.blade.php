<!DOCTYPE html>
<html lang="en">
<head>
    <title>Galapago</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="/css/physicians.style.css" type="text/css">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<a class="navbar-brand" href="{{ action('PhysicianController@show', $physician->id)}}">
	        	<img alt="Galapago" src="/css/img/turtle-logo.png">
	    	</a>
	    	<ul class="nav navbar-nav">
	    		<li><a href="">My Account</a></li>
	    	</ul>
	    </div>
		<div class="navbar-header navbar-right">
	    	<ul class="nav navbar-nav">
	        	<li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tools <span class="caret"></span></a>
		        	<ul class="dropdown-menu">
				        <li><a href="{{action('PhysiciansController@displayStats')}}">Statistics</a></li>
				        <li><a href="{{ action('FormsController@create') }}">Create a Form</a></li>
		        	</ul>
	        	</li>
		    </ul>
	    	<a href="{{action('CustomAuth@logout')}}"><button type="button" class="btn btn-primary navbar-btn">Sign Out</button></a>
	    </div>
	  </div>
	</nav>
	@if (session()->has('message'))
    	<div class="alert alert-success">{{ session('message') }}</div>
	@endif
	@yield('content')
	<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous"></script>
</body>
</html>