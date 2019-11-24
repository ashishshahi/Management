@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
@stop
@section('content_header')
<Button class="btn-info"><a href="/companies" target="_self" style="text-decoration:none">Companiess</a></Button>
<Button class="btn-info"><a href="/employees" target="_self" style="text-decoration:none">Employees</a></Button>
<Button class="btn-danger"><a href="/logout" target="_self" style="text-decoration:none">Logout</a></Button>
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop