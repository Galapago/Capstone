@extends('layouts.physicians-master')
@section('content')
<div class="content">
<div id="chart_div">
</div>
</div>
<!--
@if(isset($questions))
	@foreach($questions as $question)
		<table class="table table-striped">
		<thead class="thead-default">
			<tr>
				<th scope="row">
			{{$question->question}}
				</th>
				<th>Count</th>
			</tr>
		</thead>
			<tbody>
			@if(empty($question->questionOption[0]))
			<tr>
			<th>No data to display</th>
			<td>
			</td>
			</tr>
			@endif
			@foreach($question->questionOption as $answerText)
			<tr>
			<th scope="row">{{$answerText->option_text}}</th>
				<td>
				@if(empty(App\Answer::where('question_id',$question->id)->where('answer',$answerText->option_text)->count()))
				{{'No info to display'}}
				@else
				{{App\Answer::where('question_id',$question->id)->where('answer',$answerText->option_text)->count()}}
				@endif
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	@endforeach
}
@endif
-->
<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
var chartCol=[];
var chartRow=[];
var string;
var title;
google.charts.load('current', {'packages':['corechart']});
$.get('/physician/stats/AJAX',function($data){
	//console.log($data['data'][20]);
	$.each($data['data'],function(index,value){
		$('.content').append('<div id=chart' + index +'></div>');
		title=value['text'];
		string='';
		chartCol.push("{id: '" + value['text'] + "', label:'" + value['text'] +"',type:'string'}");
		chartCol.push("{id: 'responses', label: 'Responses', type: 'number'}"),
		$.each($data['data'][index]['question_options'],function(index,value){
			console.log(value);
			//string="{c:[{v:'" + value['option_text'] +"'},{v:" +parseInt(value['responses']) + "}]}";
			chartRow.push([value['option_text'],parseInt(value['responses'])]);
			//cols:[{id:'',label:'',type:''}]
			//rows:[{[c:{v:'title'},{v:number}]}]
		});
		google.charts.setOnLoadCallback(drawChart(chartRow,index,title));
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
function drawChart(rows,index,title) {
        // Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string','Repsonse')
			data.addColumn('number','Number of Options');
			data.addRows(rows);
			var options = {'title':title,
                       'width':400,
                       'height':300};
			var chart = new google.visualization.PieChart(document.getElementById('chart' + index));
        chart.draw(data, options);
      }
</script>
@stop