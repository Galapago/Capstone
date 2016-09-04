@extends('layouts.physicians-master')
@section('content')
<div class="content container">
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
$.get('/physician/stats/AJAX',function($data){
	$.each($data['data'],function(index,value){
		$('.content').append('<div  class="col-md-12" id=chart' + index +'></div>');
		width=$('col-md-12').width();
		height=$(window).height();
		title=value['text'];
		string='';
		$.each($data['data'][index]['question_options'],function(index,value){
			chartRow.push([value['option_text'],parseInt(value['responses'])]);
		});
		google.charts.setOnLoadCallback(drawChart(chartRow,index,title,width,height));
		chartCol=[];
		chartRow=[];
		string='';

		/*
		//Build table in pieces
		var convertToHtml='';
		convertToHtml+='<table class="table table-striped"><thead class="thead-default"><tr><th scope="row">' +
			value['text'] +
			'</th><th></th></tr></thead><tbody>';
		$.each($data['data'][index]['question_options'],function(index,value){
			convertToHtml+='<tr><th scope="row">' + value['option_text'] + '</th><td>' + value['responses'] +'</td></tr>';
		});
		convertToHtml+='<tbody></table>';
		$('.content').append(convertToHtml);
		*/
	});

});

//google.charts.setOnLoadCallback(drawChart);
function drawChart(rows,index,title,width,height) {
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
</script>
@stop