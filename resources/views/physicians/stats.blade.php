@extends('layouts.physicians-master')
@section('content')
<style>
	.graph{
		border-bottom: 1px solid gray;
		border-top:1px solid gray;
	}
	.content{
		background-color:white;
	}
</style>
<div class="content container">
<div class="panel-info">
	<div class="panel-heading"><h3>Available Data</h3></div>
	<div class="panel-body">
		<div clas="btn-group">
		<div class="dropdown btn-group">
			<button class="btn btn-primary dropdown-toggle" type="button" id="general" data-toggle="dropdown" aria-toggle="dropdown" aria-haspopup="true">Gneral Demographics<span class="caret"></span></button>
			<ul class="dropdown-menu general" aria-labelledby="general">
				<li><a href="#" class="generalItem"data-id="0">Height</a></li>
	    		<li><a href="#" class="generalItem" data-id="5">Weight</a></li>
	    		<li><a href="#" class="generalItem" data-id="4">Sex</a></li>
	    		<li><a href="#" class="generalItem" data-id="3">Race</a></li>
	    		<li><a href="#" class="generalItem" data-id="2">Medication</a></li>
	    		<li><a href="#" class="generalItem" data-id="1">Health Insurance</a></li>
			</ul>
		</div>
			@foreach($forms as $form)
			<div class="dropdown btn-group">
					<button class="btn btn-primary dropdown-toggle" type="button" id="{{$form->form_name}}" aria-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true">{{$form->form_name}}<span class="caret"></span></button>
					<ul class="dropdown-menu" aria-labelledby="{{$form->form_name}}">
					@foreach($form->questions as $question)
						<li><a href="#" class="formItem" data-id="{{$question->id}}">{{$question->question}}</a></li>
					@endforeach
					</ul>
				</div>
			@endforeach
		</div>
		<div id="graph"></div>
	</div>
	<div class="panel-footer"></div>
</div>
</div>
<div id="chart_div">
</div>
</div>
<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
$('.dropdown-toggle').dropdown();
google.charts.load('current', {'packages':['corechart']});
$(document).ready(function(){
	var title;
	var chartCol=[];
	var chartRow=[];
	var string;
	var title;
	var width;
	var height;
	var questionId;
	function drawChartForm(rows,title) {
        // Create the data table.
        	var width=$('.content').width();
			var height=400;
			var data = new google.visualization.DataTable();
			data.addColumn('string','Repsonse')
			data.addColumn('number','Number of Options');
			$.each(rows,function(index,value){
				data.addRows([[index,value]]);
			});
			var options = {'title':title,
                       'width':width,
                       'height':height,
                   		'titleTextStyle':{
                   			'fontSize':25
                   		}};
			var chart = new google.visualization.PieChart(document.getElementById('graph'));
        chart.draw(data, options);
	}
	$('.formItem').click(function(){
		$questionId=$(this).attr('data-id');
		title=this.innerText;
		$.get('/physicians/statistics/AJAX',{id:$questionId}).done(function(data){
			google.charts.setOnLoadCallback(drawChartForm(data,title));
		});
	});
	$('.generalItem').click(function(){
		questionId=parseInt($(this).attr('data-id'));
		title=this.innerText;
		//console.log(questionId);
		$.get('/physicians/statistics/AJAX',{type:'general'}).done(function(data){
			google.charts.setOnLoadCallback(drawChartForm(data['data'][title],title));
		});
	});
});
</script>
@stop