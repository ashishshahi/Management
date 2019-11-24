@extends('master')
@section('content')
<Button class="btn-success"><a href="/employees/show" target="_self" style="text-decoration:none">Add Employees</a></Button>

<section class="content-header">
<div class="container-fluid">
<div class="card-body col-sm-12">
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Companies Id</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($employees as $emp)
    <tr>
      <th scope="row">{{$emp->id}}</th>
      <td>{{$emp->firstname.' '.$emp->lastname}}</td>
      <td>{{$emp->email}}</td>
      <td>{{$emp->phone}}</td>
      <td>{{$emp->companies_id}}</td>
      <td>{{$emp->created_at}}</td>
      <td>{{$emp->updated_at}}</td>
        <td>
    <div class="col-sm-6">
                        <ul class="breadcrumb">
                        <li class="breadcrumb-item  active" ><a href="{{URL('employees/'.$emp->id.'/edit')}}"><i class="fas fa-edit" aria-hidden="true">Edit</i></a></li>
                        <li class="breadcrumb-item  "><a href="{{URL('employees/'.$emp->id.'/destroy')}}"><i class="fa fa-trash" aria-hidden="true">Delete</i></a></li>
                        </ul>
                    </div>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
</div>
</section>
@stop