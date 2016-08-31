<!DOCTYPE html>
<html lang="en">
<head>
    <title>Galapago</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">
</head>
<body>
	@yield('content')
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<a class="navbar-brand" href="#">
	        	<img alt="Galapago" src="css/img/turtle-logo.png">
	    	</a>
	    	<ul class="nav navbar-nav">
	    		<li><a href="#about">About Galapago</a></li>
	    	</ul>
	    </div>
		<div class="navbar-header navbar-right">
	    	<ul class="nav navbar-nav">
	        	<li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tools <span class="caret"></span></a>
		        	<ul class="dropdown-menu">
				        <li><a href="#schedule">Schedule</a></li>
				        <li><a href="#statistics">Statistics</a></li>
				        <li><a href="#messages">Messages</a></li>
		        	</ul>
	        	</li>
		        <li>
		        	<li><a href="#">Help</a></li>
		        </li>
		    </ul>
	    	<button action="" type="button" class="btn btn-default navbar-btn">Sign Out</button>
	    </div>
	  </div>
	</nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous"></script>
</body>
</html>