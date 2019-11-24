@extends('master')
@section('content')
<Button class="btn-success"><a href="/companies/show" target="_self" style="text-decoration:none">Add Companiess</a></Button>
<section class="content-header">
<div class="container-fluid">
<div class="card-body col-sm-12">
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Logo</th>
      <th scope="col">website</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($companies as $comp)
    <tr>
      <th scope="row">{{$comp->id}}</th>
      <td>{{$comp->name}}</td>
      <td>{{$comp->email}}</td>
      <td><img src="{{URL('/uploads/'.$comp->logo_path)}}" alt = "{{$comp->logo_path}}" style="height:50px;width:100px;"/></td>
      <td>{{$comp->website}}</td>
      <td>{{$comp->created_at}}</td>
      <td>{{$comp->updated_at}}</td>
        <td>
    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item  active"><a href="{{URL('companies/'.$comp->id.'/edit')}}"><i class="fas fa-edit" aria-hidden="true">Edit</i></a></li> 
                        <li class="breadcrumb-item  "><a href="{{URL('companies/'.$comp->id.'/destroy')}}"><i class="fa fa-trash" aria-hidden="true">Delete</i></a></li>
                        </ol>
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