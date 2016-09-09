<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="{{ asset('css/form_and_submission.style.css') }}" rel="stylesheet">

<div class="container">
	<section class="header container-fluid text-center">
		<h2 class="section-title">From the Office of Dr. {{ $form->physician->first_name }} {{ $form->physician->last_name }} - {{ $form->form_name }}</h2>
	</section>
        
	<form id="msform">
	{!! csrf_field() !!}
		<input type="hidden" name="form_id">
		<fieldset>
			@include ('partials.personal')
		
			@include ('partials.insurance')
		
			@include ('partials.history')
		
			@include ('partials.symptoms')
		
			@include ('partials.doctor_specific')
		</fieldset>
	</form>
</div>

			

			
		

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>





