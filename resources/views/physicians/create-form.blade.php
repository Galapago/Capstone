<style>
	section{
		border-top:1px solid grey;
		padding-top:10px;
		padding-bottom: 10px;
	}
	.btn-group{
		margin-top:10px;
		margin-bottom:10px;
	}
	.title{
		margin-top:0px;
	}
	.hidden{
		display:none;
	}
	.response{
		padding:10px;
	}
	.float-right{
		float:right;
	}
</style>
@extends('layouts.physicians-master')
@section('content')
<div class="container">
<h1>Create New Patient Form</h1>
<br>
<a href="{{ action('PhysiciansController@show', $physician->id) }}" id="back-account" class="btn text-center">Back to Physician Account</a>
<div class="section">
<form method="POST" action="{{action('FormsController@test')}}">
{!!csrf_field()!!}
<div class="form-group">
	<div class="input-group">
		<span class="input-group-addon" id="sizing-addon1">Form Name</span>
		<input
		type="text"
		class="form-control"
		name="form_name"
		id="form_name">
	</div>
</div>
<div class="section panel panel-success">
	<div class="panel-heading">
    	<h3 class="panel-title">Question 1</h3>
  	</div>
	<div class="row panel-body">
	<div class="col-lg-5">
		<div class="input-group" id="question_text">
  		<span class="input-group-addon" id="sizing-addon1">Question  Text</span>
		<input type="text" class="form-control" name="questions[1][question_text][]">
		</div>
	</div>
	<div class="col-lg-12" role="group">
		<div class="btn-group" >
		<button class="checkbox-btn btn btn-primary" type="button" id="checkbox-1">Checkbox</button>
		<button class="btn btn-primary free-response-btn" type="button" id="free-response-1">Free response</button>
		<button class="multiple-choice-btn btn btn-primary" type="button" id="multiple-choice-1">Mulitple choice</button>
		</div>
	</div>
	<div class="response form-group col-lg-12 panel-body" id="question-div-1">
		<input class="question-type" type="hidden" name="questions[1][question_type][]">
		<textarea class="form-control text-response hidden " placeholder="Patient response will go here"></textarea>
		<div class="col-lg-12 form-group radio-response hidden">
			<div class="col-lg-6">
				<div class="input-group">
				<span class="input-group-addon">
	        	<input class="disabled" disabled type="radio" aria-label="...">
	      		</span>
	      		<input type="text" class="form-control" name="questions[1][question_options][]
	      		">
	    		</div>
			</div>
			<div class="col-lg-6">
				<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button>
			</div>
		</div>
		<div class="col-lg-12 form-group radio-response hidden">
			<div class="col-lg-6">
				<div class="input-group">
				<span class="input-group-addon">
	        	<input class="disabled" disabled type="radio" aria-label="...">
	      		</span>
	      		<input type="text" class="form-control" name="questions[1][question_options][]
	      		">
	    		</div>
			</div>
			<div class="col-lg-6">
				<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button>
			</div>
		</div>
		<div class="col-lg-12 form-group radio-response hidden">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon">
	        		<input class="disabled" disabled type="radio" aria-label="...">
	      			</span>
	      			<input type="text" class="form-control" name="questions[1][question_options][]">
	    		</div>
			</div>
			<div class="col-lg-6">
				<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button>
				<button class="btn btn-primary add-option" type="button"><span class="glyphicon glyphicon-plus"></span></button>
			</div>
		</div>
		<div class="col-lg-12 form-group checkbox-response">
		<div class="checkbox-response col-lg-6">
			<div class="input-group">
			<span class="input-group-addon">
        	<input type="checkbox" aria-label="...">
      		</span>
      		<input type="text" class="form-control" name="questions[1][question_options][]]
      		">
    		</div>
    	</div>
		<div class="checkbox-response col-lg-6">
			<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button>
		</div>
		</div>
		<div class="col-lg-12 form-group checkbox-response">
		<div class="checkbox-response col-lg-6">
			<div class="input-group">
			<span class="input-group-addon">
        	<input type="checkbox" aria-label="...">
      		</span>
      		<input type="text" class="form-control" name="questions[1][question_options][]
      		">
    		</div>
    	</div>
		<div class="checkbox-response col-lg-6">
			<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button>
		</div>
		</div>
		<div class="col-lg-12 form-group checkbox-response">
		<div class="checkbox-response col-lg-6">
			<div class="input-group">
			<span class="input-group-addon">
        	<input type="checkbox" aria-label="...">
      		</span>
      		<input type="text" class="form-control" name="questions[1][question_options][]]
      		">
    		</div>
    	</div>
		<div class="checkbox-response col-lg-6">
			<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button>
			<button class="btn btn-primary add-option" type="button"><span class="glyphicon glyphicon-plus"></span></button>
		</div>
		</div>
	</div>
	<div class="col-lg-12">
		<button class="col-lg-6 col-lg-offset-3 btn btn-success add-question"> Add Question</button>
	</div>
</div>
<div class="panel-footer"></div>
</div>
<button type="submit" class="btn btn-danger col-lg-8 col-lg-offset-2">Submit</button>
</form>
<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
<script>
var questionNumber=1;
$('.col-lg-6>button.btn-danger').click(function(){
	deleteOption(this);
});
$('.add-option').click(function(){
	addOption(this);
});
$('.add-question').click(function(){
	addQuestion();
	addClicktoButton();
	});
$('.checkbox-btn').click(
	function(){
		var element=$(this);
		changeToCheckbox(element);
	}
);
$('.free-response-btn').click(
	function(){
		var element=$(this);
		changeToTextarea(element);	});
$('.multiple-choice-btn').click(function(){
	var element = $(this);
	changeToRadio(element);
});
function addClicktoButton(){
$('.add-question').click(function(){
	addQuestion();
	addClicktoButton();
})
$('.free-response-btn').click(function(){
		var element=$(this);
		changeToTextarea(element);
});
$('.section:last').on('click','.checkbox-btn',
	function(){
		var element=$(this);
		changeToCheckbox(element);
	}
);
$('.section:last').on('click','.free-response-btn',function(){
	var element = $(this);
	changeToTextarea(element);
});
$('.section:last').on('click','.multiple-choice-btn',function(){
	var element = $(this);
	changeToRadio(element);
});
$('.section:last').on('click','.btn-danger',function(){
	var $option = this.parentNode.parentNode;
	$option.remove();
});
$('.section:last').on('click','.add-option',function(){
		addOption(this);
});
}
function addQuestion(){
	questionNumber++;
	var questionSectionHTML='<div class="section panel panel-success"><div class="panel-heading"><h3 class="panel-title">Question ' + questionNumber +'</h3></div><div class="row panel-body"><div class="col-lg-5"><div class="input-group" id="question_text"><span class="input-group-addon" id="sizing-addon1">Question  Text</span><input type="text" class="form-control " name="questions[' + questionNumber + '][question_text][]"></div></div><div class="col-lg-12" role="group"><div class="btn-group"><button class="checkbox-btn btn btn-primary" type="button" id="checkbox-' + questionNumber +'">Checkbox</button><button class="btn btn-primary free-response-btn" type="button" id="free-response-' + questionNumber +'"">Free response</button><button class="multiple-choice-btn btn btn-primary" type="button" id="multiple-choice-' + questionNumber +'">Mulitple choice</button></div></div><div class="form-group col-lg-12 response" id="question-div-' + questionNumber +'"><input class="question-type" type="hidden" name="questions[' + questionNumber + '][question_type][]"><textarea class="form-control hidden" placeholder="Patient response will go here"></textarea><div class="col-lg-12 form-group checkbox-response"><div class="checkbox-response col-lg-6"><div class="input-group"><span class="input-group-addon"><input type="checkbox" aria-label="..."></span><input type="text" name="questions[' + questionNumber + '][question_options][]" class="form-control"></div></div><div class="checkbox-response col-lg-6"><button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-lg-12 form-group checkbox-response"><div class="checkbox-response col-lg-6"><div class="input-group"><span class="input-group-addon"><input type="checkbox" aria-label="..."></span><input type="text" class="form-control" name="questions[' + questionNumber + '][question_options][]"></div></div><div class="checkbox-response col-lg-6"><button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-lg-12 form-group checkbox-response"><div class="checkbox-response col-lg-6"><div class="input-group"><span class="input-group-addon"><input type="checkbox" aria-label="..."></span><input type="text" class="form-control" name="questions[' + questionNumber + '][question_options][]"></div></div><div class="checkbox-response col-lg-6"><button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button><button class="btn btn-primary add-option" type="button"><span class="glyphicon glyphicon-plus"></span></button></div></div><div class="col-lg-12 form-group radio-response hidden"><div class="col-lg-6"><div class="input-group"><span class="input-group-addon"><input class="disabled" disabled type="radio" aria-label="..."></span><input type="text" name="questions[' + questionNumber + '][question_options][]" class="form-control"></div></div><div class="col-lg-6"><button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-lg-12 form-group radio-response hidden"><div class="col-lg-6"><div class="input-group"><span class="input-group-addon"><input class="disabled" disabled type="radio" aria-label="..."></span><input type="text" name="questions[' + questionNumber+ '][question_options][]" class="form-control"></div></div><div class="col-lg-6"><button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-lg-12 form-group radio-response hidden"><div class="col-lg-6"><div class="input-group"><span class="input-group-addon"><input class="disabled" disabled type="radio" aria-label="..."></span><input type="text" name="questions[' + questionNumber + '][question_options][]" class="form-control"></div></div><div class="col-lg-6"><button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span></button><button class="btn btn-primary add-option" type="button"><span class="glyphicon glyphicon-plus"></span></button></div></div></div><div class="col-lg-12"><button class="col-lg-8 col-lg-offset-2 btn btn-success add-question"> Add Question</button></div></div><div class="panel-footer"></div></div></form>';
	$('.section').last().after(questionSectionHTML);
	$('.add-question').first().remove();
}
function changeToCheckbox(element){
	//Hide all other options
	var id=element.attr('id');
	var thisQuestionNumber=id.substring((id.length-1));
	var questionDiv='#question-div-' + thisQuestionNumber;
	if($(questionDiv).children('.checkbox-response').hasClass('hidden')){
		$(questionDiv).children('.question-type').prop('value','checkbox');
		clearValue(questionDiv,'.radio-response');
		clearValue(questionDiv,'textarea');
		$(questionDiv).children('.checkbox-response').removeClass('hidden');
	}

}
function changeToTextarea(element){
	//Hide all other options
	var id=element.attr('id');
	var thisQuestionNumber=id.substring((id.length-1));
	var questionDiv='#question-div-' + thisQuestionNumber;
	if($(questionDiv).children('textarea').hasClass('hidden')){
		$(questionDiv).children('.question-type').prop('value','textarea');
		clearValue(questionDiv,'.radio-response');
		clearValue(questionDiv,'.checkbox-response');
		$(questionDiv).children('textarea').removeClass('hidden');
	}
}
function changeToRadio(element){
	//Hide all other options
	var id=element.attr('id');
	var thisQuestionNumber=id.substring((id.length-1));
	var questionDiv='#question-div-' + thisQuestionNumber;
	if($(questionDiv).children('.radio-response').hasClass('hidden')){
		$(questionDiv).children('.question-type').prop('value','radio');
		clearValue(questionDiv,'.checkbox-response');
		clearValue(questionDiv,'textarea');
		$(questionDiv).children('.radio-response').removeClass('hidden');
	}
}
function clearValue(element,targetClass){
		$.each($(element).children(targetClass).children().children().children(),function(index,value){
			value.value="";
		});
		$(element).children(targetClass).addClass('hidden');
}
function countOptions(button){
	var $element = button.parentNode.parentNode.parentNode;
	var relaventElements=[];
	$.each($($element).children(),function(index,value){
		if(!$(value).hasClass('hidden')){
			relaventElements.push(value);
		}
	});
	return relaventElements.length;
}
function addOption(button){
	var text=$(button.parentNode.parentNode).html();
	$(button.parentNode.parentNode).after('<div class="col-lg-12 form-group checkbox-response">' + text + '</div>');
	$(button).remove();
	$('.add-option').click(function(){
		addOption(this);	
	});
}
function deleteOption(button){
	var $option = button.parentNode.parentNode;
	if(countOptions(button)>2){
		$option.remove();
	}	
}
</script>
@stop