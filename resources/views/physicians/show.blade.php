@extends('layouts.physicians-master')

@section('content')
<div class="container">
	<section>
	<h1 class="section-title">Welcome to GalapaGo!</h1>
	<h2>Account For Dr. {{ $physician->first_name }} {{ $physician->last_name }}</h2><br>

    <div class="form-group">
        <label for="search">Search Entries</label>
        <input class="form-control" id="search">
    </div>
	<table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Form</th>
                <th>Date Submitted</th>
                <th>HL7</th>
            </tr>
        </thead>
        <tbody>
        	@include('partials.physician_account_forms')
        </tbody>
    </table>
	</section>
</div>	
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    var contents= $('tbody').children().children();
    var names=[];
    $.each(contents,function(index,value){
        if(index%4==0){
            var name=value.innerText;
            names.push(name.toUpperCase());
        }
    });
    console.log(names);
    $('#search').keydown(function(){
        var searchTerm = this.value.toUpperCase();
        $.each(names,function(index,value){
            if(value.search(searchTerm)==-1){
                $('tbody').children().eq(index).hide();
            }
            if(value.search(searchTerm)!=-1){
                $('tbody').children().eq(index).show();
            }
        });
    });
});
</script>
@stop