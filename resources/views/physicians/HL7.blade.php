@extends('layouts.physicians-master');
@section('content')
<h1>HL7 AD04 Report</h1>
<p>{{$MSH}}</p>
<p>{{$EVN}}</p>
<p>{{$PID}}</p>
<p>{{$NKI}}</p>
<p>{{$NTE}}</p>
@stop