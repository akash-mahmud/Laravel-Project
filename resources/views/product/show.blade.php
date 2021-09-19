@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">

  <div class="col-md-6">
    <h2>{{$product ->title}}'s details</h2>
    <a href="{{route('products.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
  </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{$product ->title}}</h6>
  </div>
  <div class="card-body">



    <table class="table ">

      <tr>
        <th>Category</th>
        <td>{{$product ->category ->title}}</td>
      </tr>

      <tr>
        <th>Name</th>
        <td>{{$product ->title}}</td>
      </tr>
      <tr>
        <th> Description</th>
        <td>{{$product ->description}}</td>
      </tr>
      <tr>
        <th>Cost Price</th>
        <td>{{$product ->cost_price}}</td>
      </tr>
      <tr>
        <th>Sale Price</th>
        <td>{{$product ->price}}</td>
      </tr>
    </table>
  </div>
</div>

@stop
