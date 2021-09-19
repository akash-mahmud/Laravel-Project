@extends('layout.main')

@section('main_content')


@if($errors -> any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors -> all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

@if($mood == 'edit')

<h2> Update Page</h2>


@else
<h2>Update Product Information </h2>


@endif

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">New Product</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">

        @if($mood == 'edit')
        {!! Form::model($product,['route' => ['products.update', $product -> id],'method'=> 'put']) !!}

        @else

        {!! Form::open(['route' => 'products.store','method'=> 'post']) !!}

        @endif




        <div class="form-group row">
          <label for="title" class="col-md-2 col-form-label">Title</label>
          <div class="col-md-9">

            {!! Form::text('title', Null, ['class' => 'form-control','id'=>'title','placeholder' => 'title']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-md-2 col-form-label"> Category</label>
          <div class="col-md-9">

            {!! Form::select('category_id', $categories, Null,['class' => 'form-control','id' => 'group_id','placeholder' => 'Select Product Category']); !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-md-2 col-form-label">Description</label>
          <div class="col-md-9">

            {!! Form::textarea('description', Null, ['class' => 'form-control','id'=>'description','placeholder' => 'description']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="cost_price" class="col-md-2 col-form-label">Cost price</label>
          <div class="col-md-9">

            {!! Form::text('cost_price', Null, ['class' => 'form-control','id'=>'cost_price','placeholder' => 'cost price']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="price" class="col-md-2 col-form-label">Sale price</label>
          <div class="col-md-9">

            {!! Form::text('price', Null, ['class' => 'form-control','id'=>'price','placeholder' => 'sale price']) !!}
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary mt-1 btn-md"><i class="fa fa-save"></i> Submit</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
@stop
