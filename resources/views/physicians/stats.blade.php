@extends('layouts.physicians-master')
@section('content')
<style>
	body{
		background:url('http://thecodeplayer.com/uploads/media/gs.png');
	}
	.graph{
		border-bottom: 1px solid grey;
		border-top:1px solid grey;
	}
	.content{
		background-color:white;
	}
</style>
<div class="content container">
<h1>Click to View Data</h1>
<div clas="btn-group">
	<button class="btn btn-primary" id="general">General Info</button>
	@foreach($forms as $form)
	<button class="btn btn-primary form-btn" id="{{$form->id}}">{{$form->form_name}}</button>
	@endforeach
</div>
<div id="chart_div">
</div>
</div>
<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
var chartCol=[];
var chartRow=[];
var string;
var title;
var width;
var height;
google.charts.load('current', {'packages':['corechart']});
$(document).ready(function(){
	displayGeneral();
	$('#general').click(
		function(){
			$('.graph').remove();
			displayGeneral();
	});
$('.form-btn').click(
	function(){
		$('.graph').remove()
		var form_id=$(this).attr('id');
		displayChart(form_id);
	});
});
function drawChartGeneral(rows,index,title,width) {
        // Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string','Repsonse');
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
            if(index=="weight" || index=="height"){
            	var chart = new google.visualization.ColumnChart(document.getElementById(index));
            }else{
				var chart = new google.visualization.PieChart(document.getElementById(index));
            }
        chart.draw(data, options);
      }
function displayGeneral(){
	$.get('/physicians/stats/AJAX',{id:"general"}).done(function(data){
		height=$(window).height();
		$.each(data['data'],function(index,value){
			$('.content').append('<div  class="col-md-12 graph" id="' + index +'"></div>');
			google.charts.setOnLoadCallback(drawChartGeneral(value,index,index,width));
		});
	});
}
function displayChart(form_id){
$.get('/physicians/stats/AJAX/',{id:form_id}).done(
	function(data){
		console.log(data);
	$.each(data['data'],function(index,value){
		$('.content').append('<div  class="col-md-12 graph" id=chart' + index +'></div>');
		width=$('col-md-12').width();
		height=$(window).height();
		title=value['text'];
		string='';
		$.each(data['data'][index]['question_options'],function(index,value){
			chartRow.push([value['option_text'],parseInt(value['responses'])]);
		});
		google.charts.setOnLoadCallback(drawChartForm(chartRow,index,title,width,height));
	});
});
function drawChartForm(rows,index,title,width,height) {
        // Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string','Repsonse')
			data.addColumn('number','Number of Options');
			$.each(rows,function(index,value){
				var convertToArray=[""+ value[0],parseInt(value[1])];
				data.addRows([convertToArray]);
			});
			//data.addRows(rows);
			var options = {'title':title,
                       'width':width,
                       'height':height,
                   		'titleTextStyle':{
                   			'fontSize':25
                   		}};
			var chart = new google.visualization.PieChart(document.getElementById('chart' + index));
        chart.draw(data, options);
      }
  }
</script>
@stop