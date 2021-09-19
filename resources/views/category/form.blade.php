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

@if($mode == 'edit')

<h2> Update <strong>{{$category -> title }}'s </strong>information</h2>

@else
<h2> {{$headline}} </h2>


@endif

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">New category</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">

        @if($mode == 'edit')
        {!! Form::model($category,['route' => ['categories.update', $category -> id],'method'=> 'put']) !!}

        @else

        {!! Form::open(['route' => 'categories.store','method'=> 'post']) !!}

        @endif




        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">

            {!! Form::text('title', Null, ['class' => 'form-control','id'=>'title','placeholder' => 'title']) !!}
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary mt-1 btn-md">Submit</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
@stop
