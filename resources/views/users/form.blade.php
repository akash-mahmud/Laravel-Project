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

<h2> Update <strong>{{$user -> name }}'s </strong>information</h2>

@else
<h2> Add New User </h2>


@endif

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">New User</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">

        @if($mood == 'edit')
        {!! Form::model($user,['route' => ['users.update', $user -> id],'method'=> 'put']) !!}

        @else

        {!! Form::open(['route' => 'users.store','method'=> 'post']) !!}

        @endif


        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">User Group</label>
          <div class="col-sm-10">

            {!! Form::select('group_id', $groups, Null,['class' => 'form-control','id' => 'group_id','placeholder' => 'Select Group']); !!}
          </div>
        </div>

        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">

            {!! Form::text('name', Null, ['class' => 'form-control','id'=>'name','placeholder' => 'Name']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">

            {!! Form::text('email', Null, ['class' => 'form-control','id'=>'email','placeholder' => 'email']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="phone" class="col-sm-2 col-form-label">Phone</label>
          <div class="col-sm-10">

            {!! Form::text('phone', Null, ['class' => 'form-control','id'=>'phone','placeholder' => 'phone']) !!}
          </div>
        </div>
        <div class="form-group row">
          <label for="address" class="col-sm-2 col-form-label">address</label>
          <div class="col-sm-10">

            {!! Form::text('address', Null, ['class' => 'form-control','id'=>'address','placeholder' => 'address']) !!}
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
