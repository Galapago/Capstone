<style>
	.question-group{
		border-top:1px solid grey;
		border-bottom:1px solid grey;
		padding-top:10px;
		padding-bottom: 10px;
	}
</style>
@extends('layouts.patients-master')
@section('content')
<div class="container">
{!!csrf_field()!!}
	<div class="input-group" id="form_name_div">
		<label for="#form_name">Form Name</label>
		<input name="form_name" id="form_name" type="text" class="form-control">
	</div>
	<br>
	<button type="button" class="btn btn-success btn-block" id="add_question">Add Question</button>
	<div class="form-group">
		<div class="input-group">
			<label for="name">Question Text</label>
			<input type="text" class="form-control" name="name" id="name">
		</div>
		<br>
		<div class="input-group">
		<select>
		  <option>What Question Type?</option>
		  <option value="textarea">Textarea</option>
		  <option value="radio">Radio</option>
		  <option value="checkbox">Checkbox</option>
	</select>
	</div>
</div>
<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
<script>
	var tempQuestionId=0;
	var typing;
	var divHTML='<div class="question-group col-md-12"><div class="input-group"><labelf for="question' + tempQuestionId + '">What od you want to ask?</label><input type="text" class="form-control name" placeholder="Type text here" name="question' + tempQuestionId + '"id=question' + tempQuestionId + '"></div><button class="btn btn-primary dropdown-toggle">What type of Question</button></div>';
	function isDoneTyping(){
		return true;
		}
	$('#add_question').click(function(){
		$('#form_name_div').after(divHTML);
		tempQuestionId++;
		console.log(tempQuestionId);
	});
	function questionTypeHTML(){
		$('button').after('<div class="form-group">asdfasdf</div>');
	}
	$('.name').keydown(function(){
		return clearTimeout(typing);
	});
	$('.name').keyup(function(){
		return typing=setTimeout(function(){
			$('.name').append('<div class="input-group">asdfasdf</div>');
		},1000);;
	});
</script>
@stop