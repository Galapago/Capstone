@extends('layouts.physicians-master')
<style>
    .container{
        background-:white;
    }
</style>
@section('content')


<div class="form-group header">
    <h1 class="section-title">Welcome to GalapaGo!</h1>
    <h3>Account For Dr. {{ $physician->first_name }} {{ $physician->last_name }}</h3>
</div>
<div class="container">
    <div class="form-group">
        <h3 class="header">Send Patient Form</h3>
        @include ('partials.send_form')
    </div>

</div>

<div class="container">
    <div class="form-group">
        <h3 class="header">Completed Patient Forms</h3>
    </div>
	<section>
   
     <div class="form-group col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3">
        <div class="right-inner-addon">
        <i class="glyphicon glyphicon-search"></i> <input id="search" type="search" class="form-control"
            placeholder="Search Entries">
    </div>
  </div>

	<table class="table table-hover table-striped">
        <thead class="bg-primary">
            <tr>
                <th id="sortByName">Name<span class="caret"></span></th>
                <th id="sortByForm">Form<span class="caret"></span></th>
                <th id="sortByDate">Date Submitted<span class="caret"></span></th>
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
    var rows=$('tbody').children();
    var names=[];
    var namesSensitvie=[];
    var forms=[];
    var dates=[];
    $.each(contents,function(index,value){
        if(index%4==0){
            namesSensitvie.push(value.innerText);
            var name=value.innerText;
            names.push(name.toUpperCase());
        }
        if((index-1)%2==0){
            var form=value.innerText;
            forms.push(form);
        }
        if((index-2)%2==0){
            var date=value.innerText;
            dates.push(date);
        }
    });
    jQuery.uniqueSort(forms);
    forms.sort();
    dates.sort();
    $('#search').keydown(function(){
        this.value=this.value + this.innerText;
        var searchTerm = this.value.toUpperCase();
        rows=$('tbody').children();
        $.each(rows,function(index,value){
            if(value.innerHTML.toUpperCase().search(searchTerm)==-1){
                $('tbody').children().eq(index).hide();
            }
            if(value.innerHTML.toUpperCase().search(searchTerm)!=-1){
                $('tbody').children().eq(index).show();
            }
        });
    });
    $('#sortByName').click(function(){
        var header ='<thead>' + $('thead').html() + '</thead>';
        $('tbody>tr').remove();
        var sortedNames=namesSensitvie.sort();
        var searchTerm;
        $.each(sortedNames,function(index,value){
            searchTerm = value;
            $.each(rows,function(rowIndex,rowValue){
                if(rowValue.innerHTML.search(searchTerm)!=-1){
                    $('table').append(rowValue);
                }
            });
        });
    });
    $('#sortByForm').click(function(){
        $('tbody>tr').remove();
        var searchTerm;
        $.each(forms,function(index,value){
            searchTerm = value;
            $.each(rows,function(rowIndex,rowValue){
                if(rowValue.innerHTML.search(searchTerm)!=-1){
                    $('table').append(rowValue);
                }
            });
        });
    });
    $('#sortByDate').click(function(){
        $('tbody>tr').remove();
        var searchTerm;
        $.each(dates,function(index,value){
            searchTerm = value;
            $.each(rows,function(rowIndex,rowValue){
                if(rowValue.innerHTML.search(searchTerm)!=-1){
                    $('table').append(rowValue);
                }
            });
        });
    });
});
</script>
@stop