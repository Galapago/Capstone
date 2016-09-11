<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Physician Login</title>
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Theme CSS -->
    <link href="/css/physician-login.style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Physicians Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="{{ action('CustomAuth@authenticatePhysicians') }}" method="post" role="form" style="display: block;">
								{{ csrf_field() }}
									<div class="form-group">
										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="email" value="">
									</div>
									@include('partials.error', ['field' => 'email'])
									<div class="form-group">
										<input type="password" name="npi" id="npi" tabindex="2" class="form-control" placeholder="npi">
									</div>
									@include('partials.error', ['field' => 'npi'])
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="password">
									</div>
									@include('partials.error', ['field' => 'password'])
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label id="remember-me" for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">
								{{ csrf_field() }}
									<div class="form-group">
										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="email" value="">
									</div>
									<div class="form-group">
										<input type="email" name="NPI" id="NPI" tabindex="1" class="form-control" placeholder="npi" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="password">
									</div>
										<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="back">
			<a id="back-btn" href="{{ action('HomeController@index')}}" class="btn btn-sm btn-lg active" role="button">Back to Main Page</a>
		</div>
	</div>


	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Theme JavaScript -->
	<script src="/js/login.js"></script>

</body>

</html>



<!-- <div class="container view">
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
</div> -->


