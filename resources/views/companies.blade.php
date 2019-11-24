@extends('master')
@section('content')
@if(isset($companies))
{!!  Form::open(array('url' => '/companies/'.$companies->id.'/edit','files'=>'true')); !!}
@else
{!!  Form::open(array('url' => '/companies/create','files'=>'true')); !!}
@endif
{{ csrf_field() }}
<!-- for csrf disable -->
<!--printing  a error message-->
@if(count($errors))
			<div class="alert alert-danger">
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
<div class="form-group">
    <label for="exampleInputEmail1 {{ $errors->has('name') ? 'has-error' : '' }}">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name Of Companiee" value="{{isset($companies->name) ? $companies->name : ''}}">
    <span class="text-danger">{{ $errors->first('name') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1 {{ $errors->has('email') ? 'has-error' : '' }}">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{isset($companies->email) ? $companies->email : ''}}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <span class="text-danger">{{ $errors->first('email') }}</span>
  </div>
  <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
    <label for="exampleInputEmail1">Logo</label>
    <input type="file" class="form-control" name="logo" placeholder="Upload Logo Minimum Siz 100×100" value="{{isset($companies->logo_path) ? $companies->logo_path : ''}}">
    <span class="text-danger">{{ $errors->first('logo') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1 {{ $errors->has('weburl') ? 'has-error' : '' }}">Web Site</label>
    <input type="url" class="form-control" name="weburl" placeholder="Enter web site address" value="{{isset($companies->website) ? $companies->website : ''}}">
    <span class="text-danger">{{ $errors->first('weburl') }}</span>
  </div>
  <button type="submit" class="btn btn-primary">{{isset($companies) ? 'Update Company' : 'Create Company'}}</button>
  {!! Form::close() !!}
@stop