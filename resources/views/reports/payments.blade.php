@extends('layout.main')

@section('main_content')

<div class="row clearfix page_header">

  <div class="col-md-4">
    <h2>Payment Reports</h2>
  </div>
  <div class="col-md-8 text-right mb-3">
        {!! Form::open(['route' => 'reports.payments','method'=> 'get']) !!}
  <div class="form-row align-items-center">
    <div class="col-sm-4 my-1">
      <label class="sr-only" for="start_date">Start Date</label>
     
      {!! Form::date('start_date', $start_date, ['class' => 'form-control','id'=>'start_date','placeholder' => 'Start date']) !!}
    </div>
    <div class="col-sm-4 my-1">
      <label class="sr-only" for="end_date">End Date</label>
      <div class="input-group">

              {!! Form::date('end_date', $end_date, ['class' => 'form-control','id'=>'end_date','placeholder' => 'End date']) !!}
      </div>
    </div>

    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
 {!! Form::close() !!}
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Sales Report From <strong> {{$start_date}}</strong> to <strong>{{$end_date}}</strong></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordeless table-striped"  cellspacing="0">
        <thead >
          <tr>
            <th>Date</th>
            <th>User</th>

            <th class=" text-right"> Ammount </th>
          
          </tr>
        </thead>
        <tbody>
          @foreach($payments as $payment)
          <tr>
          
            <td>{{$payment ->date }}</td>
            <td >{{optional($payment ->user)->name }}</td>
            <td  class=" text-right">{{$payment ->amount }}</td>

            
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>

            <th colspan="2" class=" text-right">Total:</th>

            <th class=" text-right"> {{$payments ->sum('amount')}} </th>
          
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

@stop