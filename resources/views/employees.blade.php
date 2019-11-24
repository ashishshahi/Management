@extends('master')
@section('content')
@if(isset($employees))
{!!  Form::open(array('url' => '/employees/'.$employees->id.'/edit','files'=>'true')); !!}
@else
{!!  Form::open(array('url' => '/employees/create','files'=>'true')); !!}
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
    <label for="exampleInputEmail1 {{ $errors->has('firstname') ? 'has-error' : '' }}">First Name</label>
    <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="{{isset($employees->firstname) ? $employees->firstname : ''}}">
    <span class="text-danger">{{ $errors->first('firstname') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1 {{ $errors->has('lastname') ? 'has-error' : '' }}">Last Name</label>
    <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name"  value="{{isset($employees->lastname) ? $employees->lastname : ''}}">
    <span class="text-danger">{{ $errors->first('lastname') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1 {{ $errors->has('companyname') ? 'has-error' : '' }}">Choose Company Name</label>
    <select class="form-control custom-select custom-select-sm" name="companyname">
        @if(isset($employees))
        <option selected >{{$employees->company->name}}</option>
        @foreach($companies as $comp)
        <option value="{{$comp->id}}">{{$comp->name}}</option>
        @endforeach
        @else
        <option selected>Select Your Company</option>
        @foreach($companies as $comp)
        <option value="{{$comp->id}}">{{$comp->name}}</option>
        @endforeach
        @endif
    </select>
    <span class="text-danger">{{ $errors->first('companyname') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1 {{ $errors->has('email') ? 'has-error' : '' }}">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{isset($employees->email) ? $employees->email : ''}}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <span class="text-danger">{{ $errors->first('email') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1 {{ $errors->has('phone') ? 'has-error' : '' }}">Phone Number</label>
    <input type="text" class="form-control" name="phone" placeholder="Enter Phone  Number" value="{{isset($employees->phone) ? $employees->phone : ''}}">
    <span class="text-danger">{{ $errors->first('phone') }}</span>
  </div>
  <button type="submit" class="btn btn-primary">{{isset($employees) ? 'Update Employees' : 'Add Employees'}}</button>
  {!! Form::close() !!}
@stop